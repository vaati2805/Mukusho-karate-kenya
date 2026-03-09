<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $item ? 'Edit' : 'Add' }} Content — Mukusho Karate Kenya Admin</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, .font-display { font-family: 'Oswald', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 min-h-screen">

    {{-- Admin Top Nav --}}
    <nav class="bg-slate-900 text-white sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="Mukusho Logo" class="h-9 w-auto rounded-full">
                        <span class="font-display font-bold tracking-wider uppercase text-sm text-white">ADMIN</span>
                    </a>
                    <span class="text-slate-600">|</span>
                    <span class="text-amber-400 text-sm font-semibold">{{ $item ? 'Edit' : 'Add' }} Content</span>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.content.index', ['section' => $section]) }}" class="text-slate-400 hover:text-white text-sm transition-colors">← Back to Content</a>
                    <a href="{{ route('admin.dashboard') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Dashboard</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Validation Errors --}}
        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-800 rounded-xl px-6 py-4 mb-6">
            <div class="font-bold mb-2">Please fix the following errors:</div>
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="font-display text-3xl font-bold text-slate-900 uppercase">
                {{ $item ? 'Edit' : 'Add New' }} {{ $sections[$section] ?? 'Content' }}
            </h1>
            <p class="text-slate-500 text-sm mt-1">
                {{ $item ? 'Update this content item. Changes will reflect on the website immediately.' : 'Create a new content item for the website.' }}
            </p>
        </div>

        <form
            action="{{ $item ? route('admin.content.update', $item) : route('admin.content.store') }}"
            method="POST"
            enctype="multipart/form-data"
            x-data="contentForm()"
            class="space-y-6"
        >
            @csrf
            @if($item) @method('PUT') @endif

            {{-- Section --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <h2 class="font-display font-bold text-lg text-slate-900 uppercase mb-4">Basic Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Section *</label>
                        <select name="section" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm bg-white">
                            @foreach($sections as $sKey => $sLabel)
                            <option value="{{ $sKey }}" {{ old('section', $section) === $sKey ? 'selected' : '' }}>{{ $sLabel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $item?->sort_order ?? '') }}" min="0" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm" placeholder="Auto">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Title *</label>
                        <input type="text" name="title" value="{{ old('title', $item?->title ?? '') }}" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm" placeholder="Enter title">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Subtitle</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle', $item?->subtitle ?? '') }}" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm" placeholder="Optional subtitle or tagline">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Content / Description</label>
                        <textarea name="content" rows="5" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm resize-y" placeholder="Main content text">{{ old('content', $item?->content ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Icon (Emoji)</label>
                        <input type="text" name="icon" value="{{ old('icon', $item?->icon ?? '') }}" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm" placeholder="e.g. 🥋 or ⚡">
                    </div>
                </div>
            </div>

            {{-- Media Gallery (Images & Videos) --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6" x-data="mediaManager()">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="font-display font-bold text-lg text-slate-900 uppercase flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Media Gallery
                        </h2>
                        <p class="text-xs text-slate-500 mt-0.5">Upload multiple images and videos. They will display as a slideshow on the website.</p>
                    </div>
                </div>

                {{-- Existing Media Grid --}}
                @if($item && $item->media && $item->media->count() > 0)
                <div class="mb-6">
                    <h3 class="text-sm font-semibold text-slate-700 mb-3">Current Media <span class="text-slate-400 font-normal">({{ $item->media->count() }} items)</span></h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach($item->media as $media)
                        <div class="rounded-xl border-2 border-slate-200 bg-white">
                            {{-- Thumbnail --}}
                            <div class="relative">
                                @if($media->isImage())
                                    <img src="{{ $media->url }}" alt="{{ $media->original_name }}" class="w-full h-32 object-cover rounded-t-xl" loading="lazy">
                                @else
                                    <video class="w-full h-32 object-cover rounded-t-xl bg-black">
                                        <source src="{{ $media->url }}" type="video/mp4">
                                    </video>
                                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                        <div class="w-10 h-10 bg-white/80 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-indigo-700 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            {{-- Info + Delete checkbox BELOW the thumbnail --}}
                            <div class="p-3 space-y-2">
                                <div class="flex items-center gap-2">
                                    <span class="{{ $media->isImage() ? 'bg-green-600' : 'bg-indigo-600' }} text-white text-[10px] font-bold px-1.5 py-0.5 rounded uppercase">{{ $media->isImage() ? 'Image' : 'Video' }}</span>
                                    <span class="text-[10px] text-slate-500 truncate">{{ $media->original_name ?? basename($media->path) }}</span>
                                </div>
                                <label class="flex items-center gap-2 cursor-pointer bg-red-50 hover:bg-red-100 border border-red-200 rounded-lg px-3 py-2 transition-colors">
                                    <input type="checkbox" name="remove_media[]" value="{{ $media->id }}" class="h-4 w-4 rounded border-red-300 text-red-600 focus:ring-red-500 accent-red-600">
                                    <span class="text-red-700 text-xs font-bold select-none">🗑 Delete this {{ $media->isImage() ? 'image' : 'video' }}</span>
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <p class="text-slate-500 text-xs mt-3">✓ Tick the box under any media you want to remove, then click <strong>Update Content</strong> to save.</p>
                </div>
                @endif

                {{-- Upload New Images --}}
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-slate-700 mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Add Images
                    </label>
                    <div class="relative border-2 border-dashed border-slate-300 hover:border-green-400 rounded-xl p-6 text-center transition-colors cursor-pointer bg-slate-50/50 hover:bg-green-50/30"
                         @click="$refs.imageInput.click()"
                         @dragover.prevent="$el.classList.add('border-green-500','bg-green-50')"
                         @dragleave.prevent="$el.classList.remove('border-green-500','bg-green-50')"
                         @drop.prevent="handleImageDrop($event)">
                        <svg class="w-8 h-8 text-slate-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                        <p class="text-sm text-slate-500">Click or drag & drop images here</p>
                        <p class="text-xs text-slate-400 mt-1">JPG, PNG, GIF, WEBP — Max 5MB each — Multiple allowed</p>
                        <input type="file" name="images[]" multiple accept="image/*" class="hidden" x-ref="imageInput"
                               @change="previewImages($event)">
                    </div>
                    {{-- Image previews --}}
                    <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-2 mt-3" x-show="imagePreviews.length > 0">
                        <template x-for="(img, i) in imagePreviews" :key="i">
                            <div class="relative rounded-lg overflow-hidden border border-green-200">
                                <img :src="img.url" class="w-full h-20 object-cover" alt="Preview">
                                <button type="button" @click="removeImagePreview(i)" class="absolute top-1 right-1 w-5 h-5 bg-red-500 hover:bg-red-600 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                                <p class="absolute bottom-0 left-0 right-0 bg-black/50 text-white text-[9px] px-1 py-0.5 truncate" x-text="img.name"></p>
                            </div>
                        </template>
                    </div>
                </div>

                {{-- Upload New Videos --}}
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                        Add Videos
                    </label>
                    <div class="relative border-2 border-dashed border-slate-300 hover:border-indigo-400 rounded-xl p-6 text-center transition-colors cursor-pointer bg-slate-50/50 hover:bg-indigo-50/30"
                         @click="$refs.videoInput.click()"
                         @dragover.prevent="$el.classList.add('border-indigo-500','bg-indigo-50')"
                         @dragleave.prevent="$el.classList.remove('border-indigo-500','bg-indigo-50')"
                         @drop.prevent="handleVideoDrop($event)">
                        <svg class="w-8 h-8 text-slate-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                        <p class="text-sm text-slate-500">Click or drag & drop videos here</p>
                        <p class="text-xs text-slate-400 mt-1">MP4, WebM, OGG, MOV — Max 50MB each — Multiple allowed</p>
                        <input type="file" name="videos[]" multiple accept="video/mp4,video/webm,video/ogg,video/quicktime" class="hidden" x-ref="videoInput"
                               @change="previewVideos($event)">
                    </div>
                    {{-- Video previews --}}
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 mt-3" x-show="videoPreviews.length > 0">
                        <template x-for="(vid, i) in videoPreviews" :key="i">
                            <div class="relative rounded-lg overflow-hidden border border-indigo-200 bg-black">
                                <video class="w-full h-24 object-cover">
                                    <source :src="vid.url" type="video/mp4">
                                </video>
                                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                    <div class="w-8 h-8 bg-white/70 rounded-full flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 text-indigo-700 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>
                                <button type="button" @click="removeVideoPreview(i)" class="absolute top-1 right-1 w-5 h-5 bg-red-500 hover:bg-red-600 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                                <p class="absolute bottom-0 left-0 right-0 bg-black/60 text-white text-[9px] px-1 py-0.5 truncate" x-text="vid.name"></p>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            {{-- Extra Fields (Dynamic Key-Value) --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="font-display font-bold text-lg text-slate-900 uppercase">Extra Data</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Additional fields specific to this content type (JSON key-value pairs).</p>
                    </div>
                    <button type="button" @click="addExtra()" class="inline-flex items-center gap-1 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold py-2 px-3 rounded-lg transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Add Field
                    </button>
                </div>

                <template x-for="(pair, index) in extras" :key="index">
                    <div class="flex items-start gap-3 mb-3">
                        <div class="flex-1">
                            <input type="text" :name="'extra_keys[' + index + ']'" x-model="pair.key" placeholder="Key (e.g. age_range, color)" class="w-full px-3 py-2.5 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm">
                        </div>
                        <div class="flex-[2]">
                            <input type="text" :name="'extra_values[' + index + ']'" x-model="pair.value" placeholder='Value (e.g. Ages 5-7, or JSON: ["item1","item2"])' class="w-full px-3 py-2.5 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm">
                        </div>
                        <button type="button" @click="removeExtra(index)" class="mt-1 text-red-400 hover:text-red-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                </template>

                <div x-show="extras.length === 0" class="text-center py-6 text-slate-400 text-sm">
                    No extra fields. Click "Add Field" to add custom data.
                </div>
            </div>

            {{-- Submit --}}
            <div class="flex items-center justify-between">
                <a href="{{ route('admin.content.index', ['section' => $section]) }}" class="text-slate-500 hover:text-slate-700 font-semibold text-sm transition-colors">← Cancel</a>
                <button type="submit" class="inline-flex items-center gap-2 bg-green-700 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-lg transition-all uppercase text-sm tracking-wide shadow-lg shadow-green-700/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ $item ? 'Update Content' : 'Create Content' }}
                </button>
            </div>
        </form>
    </div>

    <script>
    function contentForm() {
        // Parse existing extra data into key-value pairs
        const existingExtra = @json($item?->extra ?? []);
        const pairs = [];
        for (const [key, value] of Object.entries(existingExtra)) {
            const displayValue = (typeof value === 'object') ? JSON.stringify(value) : String(value);
            pairs.push({ key, value: displayValue });
        }

        return {
            extras: pairs.length > 0 ? pairs : [],
            addExtra() {
                this.extras.push({ key: '', value: '' });
            },
            removeExtra(index) {
                this.extras.splice(index, 1);
            }
        };
    }

    function mediaManager() {
        return {
            removedMedia: [],
            imagePreviews: [],
            videoPreviews: [],
            imageFiles: [],
            videoFiles: [],

            toggleRemove(id) {
                const idx = this.removedMedia.indexOf(id);
                if (idx > -1) {
                    this.removedMedia.splice(idx, 1);
                } else {
                    this.removedMedia.push(id);
                }
            },

            previewImages(event) {
                const files = Array.from(event.target.files);
                files.forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const url = URL.createObjectURL(file);
                        this.imagePreviews.push({ url, name: file.name });
                    }
                });
            },

            previewVideos(event) {
                const files = Array.from(event.target.files);
                files.forEach(file => {
                    if (file.type.startsWith('video/')) {
                        const url = URL.createObjectURL(file);
                        this.videoPreviews.push({ url, name: file.name });
                    }
                });
            },

            handleImageDrop(event) {
                event.currentTarget.classList.remove('border-green-500', 'bg-green-50');
                const dt = new DataTransfer();
                // Preserve existing files
                if (this.$refs.imageInput.files) {
                    Array.from(this.$refs.imageInput.files).forEach(f => dt.items.add(f));
                }
                Array.from(event.dataTransfer.files).forEach(file => {
                    if (file.type.startsWith('image/')) {
                        dt.items.add(file);
                        this.imagePreviews.push({ url: URL.createObjectURL(file), name: file.name });
                    }
                });
                this.$refs.imageInput.files = dt.files;
            },

            handleVideoDrop(event) {
                event.currentTarget.classList.remove('border-indigo-500', 'bg-indigo-50');
                const dt = new DataTransfer();
                if (this.$refs.videoInput.files) {
                    Array.from(this.$refs.videoInput.files).forEach(f => dt.items.add(f));
                }
                Array.from(event.dataTransfer.files).forEach(file => {
                    if (file.type.startsWith('video/')) {
                        dt.items.add(file);
                        this.videoPreviews.push({ url: URL.createObjectURL(file), name: file.name });
                    }
                });
                this.$refs.videoInput.files = dt.files;
            },

            removeImagePreview(index) {
                URL.revokeObjectURL(this.imagePreviews[index].url);
                this.imagePreviews.splice(index, 1);
                // Rebuild file input
                const dt = new DataTransfer();
                const files = Array.from(this.$refs.imageInput.files);
                files.splice(index, 1);
                files.forEach(f => dt.items.add(f));
                this.$refs.imageInput.files = dt.files;
            },

            removeVideoPreview(index) {
                URL.revokeObjectURL(this.videoPreviews[index].url);
                this.videoPreviews.splice(index, 1);
                const dt = new DataTransfer();
                const files = Array.from(this.$refs.videoInput.files);
                files.splice(index, 1);
                files.forEach(f => dt.items.add(f));
                this.$refs.videoInput.files = dt.files;
            }
        };
    }
    </script>

</body>
</html>
