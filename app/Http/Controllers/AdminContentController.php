<?php

namespace App\Http\Controllers;

use App\Models\ContentMedia;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminContentController extends Controller
{
    /**
     * Display the CMS content manager (tabbed by section).
     */
    public function index(Request $request)
    {
        if (!Auth::user()->canView('content')) {
            abort(403, 'You do not have permission to view content.');
        }
        $currentSection = $request->get('section', 'programs');
        $sections = SiteContent::sections();

        $items = SiteContent::with('media')
            ->section($currentSection)
            ->ordered()
            ->get();

        $showArchived = $request->boolean('archived');

        if (!$showArchived) {
            $items = $items->where('is_archived', false);
        }

        return view('admin.content.index', compact('items', 'sections', 'currentSection', 'showArchived'));
    }

    /**
     * Show form to create a new content item.
     */
    public function create(Request $request)
    {
        if (!Auth::user()->canEdit('content')) {
            abort(403, 'You do not have permission to create content.');
        }

        $section = $request->get('section', 'programs');
        $sections = SiteContent::sections();

        return view('admin.content.form', [
            'item' => null,
            'section' => $section,
            'sections' => $sections,
        ]);
    }

    /**
     * Store a new content item.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->canEdit('content')) {
            abort(403, 'You do not have permission to create content.');
        }

        $data = $request->validate([
            'section'    => 'required|string',
            'title'      => 'required|string|max:255',
            'subtitle'   => 'nullable|string|max:255',
            'content'    => 'nullable|string',
            'icon'       => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer|min:0',
            'images'     => 'nullable|array',
            'images.*'   => 'image|max:5120',
            'videos'     => 'nullable|array',
            'videos.*'   => 'file|mimetypes:video/mp4,video/webm,video/ogg,video/quicktime|max:51200',
        ]);

        unset($data['images'], $data['videos']);

        $data['key'] = Str::slug($data['title']);
        $data['sort_order'] = $data['sort_order'] ?? SiteContent::section($data['section'])->max('sort_order') + 1;

        // Handle extra fields submitted as individual inputs
        $data['extra'] = $this->buildExtra($request);

        $content = SiteContent::create($data);

        // Save uploaded images & videos to content_media
        $this->saveMedia($request, $content, 'images', 'image');
        $this->saveMedia($request, $content, 'videos', 'video');

        // Set legacy primary image/video from first media
        $this->syncPrimaryMedia($content);

        return redirect()
            ->route('admin.content.index', ['section' => $data['section']])
            ->with('success', 'Content item created successfully.');
    }

    /**
     * Show form to edit an existing content item.
     */
    public function edit(SiteContent $content)
    {
        if (!Auth::user()->canEdit('content')) {
            abort(403, 'You do not have permission to edit content.');
        }

        $content->load('media');
        $sections = SiteContent::sections();

        return view('admin.content.form', [
            'item' => $content,
            'section' => $content->section,
            'sections' => $sections,
        ]);
    }

    /**
     * Update an existing content item.
     */
    public function update(Request $request, SiteContent $content)
    {
        if (!Auth::user()->canEdit('content')) {
            abort(403, 'You do not have permission to edit content.');
        }

        $data = $request->validate([
            'section'    => 'required|string',
            'title'      => 'required|string|max:255',
            'subtitle'   => 'nullable|string|max:255',
            'content'    => 'nullable|string',
            'icon'       => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer|min:0',
            'images'     => 'nullable|array',
            'images.*'   => 'image|max:5120',
            'videos'     => 'nullable|array',
            'videos.*'   => 'file|mimetypes:video/mp4,video/webm,video/ogg,video/quicktime|max:51200',
        ]);

        unset($data['images'], $data['videos']);

        $data['key'] = Str::slug($data['title']);
        $data['extra'] = $this->buildExtra($request);

        $content->update($data);

        // Delete individually marked media items
        $removeIds = $request->input('remove_media', []);
        if (!empty($removeIds)) {
            $mediaToDelete = ContentMedia::whereIn('id', $removeIds)
                ->where('site_content_id', $content->id)
                ->get();

            foreach ($mediaToDelete as $m) {
                if (Storage::disk('public')->exists($m->path)) {
                    Storage::disk('public')->delete($m->path);
                }
                $m->delete();
            }
        }

        // Save newly uploaded images & videos
        $this->saveMedia($request, $content, 'images', 'image');
        $this->saveMedia($request, $content, 'videos', 'video');

        // Sync backward-compat primary image/video
        $this->syncPrimaryMedia($content->fresh());

        return redirect()
            ->route('admin.content.index', ['section' => $content->section])
            ->with('success', 'Content item updated successfully.');
    }

    /**
     * Archive a content item (soft-hide from frontend).
     */
    public function archive(SiteContent $content)
    {
        if (!Auth::user()->canEdit('content')) {
            abort(403);
        }

        $content->update(['is_archived' => true]);

        return back()->with('success', "\"{$content->title}\" has been archived.");
    }

    /**
     * Restore an archived content item.
     */
    public function restore(SiteContent $content)
    {
        if (!Auth::user()->canEdit('content')) {
            abort(403);
        }

        $content->update(['is_archived' => false]);

        return back()->with('success', "\"{$content->title}\" has been restored.");
    }

    /**
     * Permanently delete a content item.
     */
    public function destroy(SiteContent $content)
    {
        if (!Auth::user()->canEdit('content')) {
            abort(403);
        }

        if ($content->image && Storage::disk('public')->exists($content->image)) {
            Storage::disk('public')->delete($content->image);
        }

        if ($content->video && Storage::disk('public')->exists($content->video)) {
            Storage::disk('public')->delete($content->video);
        }

        // Delete all media files from storage
        foreach ($content->media as $m) {
            if (Storage::disk('public')->exists($m->path)) {
                Storage::disk('public')->delete($m->path);
            }
        }

        $section = $content->section;
        $content->delete();

        return redirect()
            ->route('admin.content.index', ['section' => $section])
            ->with('success', 'Content item deleted permanently.');
    }

    /**
     * AJAX: Delete a single media item.
     */
    public function deleteMedia(ContentMedia $media)
    {
        if (!Auth::user()->canEdit('content')) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        if (Storage::disk('public')->exists($media->path)) {
            Storage::disk('public')->delete($media->path);
        }

        $contentId = $media->site_content_id;
        $media->delete();

        // Sync primary
        $content = SiteContent::find($contentId);
        if ($content) {
            $this->syncPrimaryMedia($content);
        }

        return response()->json(['success' => true]);
    }

    /* ── Private helpers ─────────────────────────────────── */

    /**
     * Save uploaded media files for a content item.
     */
    private function saveMedia(Request $request, SiteContent $content, string $inputName, string $type): void
    {
        if (!$request->hasFile($inputName)) {
            return;
        }

        $folder = $type === 'video' ? 'content/videos' : 'content/images';
        $maxOrder = $content->media()->max('sort_order') ?? 0;

        foreach ($request->file($inputName) as $file) {
            $path = $file->store($folder, 'public');
            $content->media()->create([
                'type'          => $type,
                'path'          => $path,
                'original_name' => $file->getClientOriginalName(),
                'sort_order'    => ++$maxOrder,
            ]);
        }
    }

    /**
     * Sync the legacy single image/video columns with the first media items.
     */
    private function syncPrimaryMedia(SiteContent $content): void
    {
        $content->load('media');

        $firstImage = $content->media->where('type', 'image')->first();
        $firstVideo = $content->media->where('type', 'video')->first();

        $content->updateQuietly([
            'image' => $firstImage?->path,
            'video' => $firstVideo?->path,
        ]);
    }

    /**
     * Build the extra JSON from the request.
     */
    private function buildExtra(Request $request): array
    {
        $extra = $request->input('extra', []);

        // Handle dynamic key-value pairs
        $extraKeys = $request->input('extra_keys', []);
        $extraValues = $request->input('extra_values', []);

        foreach ($extraKeys as $i => $key) {
            if (!empty($key) && isset($extraValues[$i])) {
                $value = $extraValues[$i];
                // Try to decode JSON values (arrays, booleans, etc.)
                $decoded = json_decode($value, true);
                $extra[$key] = (json_last_error() === JSON_ERROR_NONE && $decoded !== null) ? $decoded : $value;
            }
        }

        return $extra;
    }
}
