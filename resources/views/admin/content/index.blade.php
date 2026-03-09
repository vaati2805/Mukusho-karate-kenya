<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Content Manager — Mukusho Karate Kenya Admin</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                    <span class="text-amber-400 text-sm font-semibold">Content Manager</span>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Dashboard</a>
                    <a href="/" class="text-slate-400 hover:text-white text-sm transition-colors">View Site</a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-slate-400 hover:text-red-400 text-sm transition-colors">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Success Message --}}
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl px-6 py-4 mb-6 flex items-center gap-3">
            <svg class="w-5 h-5 text-green-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
        @endif

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="font-display text-3xl font-bold text-slate-900 uppercase">Website Content</h1>
                <p class="text-slate-500 text-sm mt-1">Edit, add, or archive content that appears on the public website.</p>
            </div>
            <a href="{{ route('admin.content.create', ['section' => $currentSection]) }}" class="inline-flex items-center gap-2 bg-green-700 hover:bg-green-600 text-white font-bold py-2.5 px-5 rounded-lg transition-all uppercase text-sm tracking-wide">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add {{ $sections[$currentSection] ?? 'Item' }}
            </a>
        </div>

        {{-- Section Tabs --}}
        <div class="flex flex-wrap gap-2 mb-6 bg-white rounded-xl p-2 border border-slate-200 shadow-sm">
            @foreach($sections as $sectionKey => $sectionLabel)
            <a href="{{ route('admin.content.index', ['section' => $sectionKey, 'archived' => $showArchived ? '1' : '0']) }}"
               class="px-4 py-2 rounded-lg font-display font-bold uppercase text-xs tracking-wide transition-all {{ $currentSection === $sectionKey ? 'bg-green-700 text-white shadow' : 'text-slate-500 hover:bg-slate-100 hover:text-slate-700' }}">
                {{ $sectionLabel }}
            </a>
            @endforeach
        </div>

        {{-- Archive Toggle --}}
        <div class="flex items-center gap-3 mb-4">
            <a href="{{ route('admin.content.index', ['section' => $currentSection, 'archived' => '0']) }}"
               class="text-sm font-semibold {{ !$showArchived ? 'text-green-700 underline underline-offset-4' : 'text-slate-400 hover:text-slate-600' }}">
                Active ({{ $items->where('is_archived', false)->count() }})
            </a>
            <span class="text-slate-300">|</span>
            <a href="{{ route('admin.content.index', ['section' => $currentSection, 'archived' => '1']) }}"
               class="text-sm font-semibold {{ $showArchived ? 'text-amber-700 underline underline-offset-4' : 'text-slate-400 hover:text-slate-600' }}">
                All Including Archived
            </a>
        </div>

        {{-- Content Items --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-slate-600">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider w-12">#</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Media</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Title</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Subtitle</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider max-w-xs">Content Preview</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Order</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Status</th>
                            <th class="px-4 py-3 text-right font-semibold uppercase text-xs tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($items as $item)
                        <tr class="hover:bg-slate-50 transition-colors {{ $item->is_archived ? 'opacity-50' : '' }}">
                            <td class="px-4 py-3 text-slate-400">{{ $item->id }}</td>
                            <td class="px-4 py-3">
                                @php
                                    $imgCount = $item->media->where('type', 'image')->count();
                                    $vidCount = $item->media->where('type', 'video')->count();
                                @endphp
                                @if($item->image)
                                    @if(str_starts_with($item->image, 'content/'))
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="" class="w-12 h-12 rounded-lg object-cover">
                                    @else
                                        <img src="{{ asset($item->image) }}" alt="" class="w-12 h-12 rounded-lg object-cover">
                                    @endif
                                @elseif($item->icon)
                                    <span class="text-2xl">{{ $item->icon }}</span>
                                @else
                                    <span class="text-slate-300 text-xs">—</span>
                                @endif
                                <div class="flex items-center gap-1 mt-1">
                                    @if($imgCount > 0)
                                    <span class="inline-flex items-center gap-0.5 bg-green-50 text-green-600 text-[10px] font-bold px-1.5 py-0.5 rounded-full">
                                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        {{ $imgCount }}
                                    </span>
                                    @endif
                                    @if($vidCount > 0)
                                    <span class="inline-flex items-center gap-0.5 bg-indigo-50 text-indigo-600 text-[10px] font-bold px-1.5 py-0.5 rounded-full">
                                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                        {{ $vidCount }}
                                    </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-3 font-medium text-slate-900">{{ Str::limit($item->title, 40) }}</td>
                            <td class="px-4 py-3 text-slate-500">{{ Str::limit($item->subtitle, 30) ?: '—' }}</td>
                            <td class="px-4 py-3 text-slate-500 max-w-xs truncate">{{ Str::limit($item->content, 60) ?: '—' }}</td>
                            <td class="px-4 py-3 text-slate-500">{{ $item->sort_order }}</td>
                            <td class="px-4 py-3">
                                @if($item->is_archived)
                                    <span class="inline-block bg-amber-50 text-amber-700 text-xs font-bold px-2.5 py-1 rounded-full uppercase">Archived</span>
                                @else
                                    <span class="inline-block bg-green-50 text-green-700 text-xs font-bold px-2.5 py-1 rounded-full uppercase">Active</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.content.edit', $item) }}" class="inline-flex items-center gap-1 bg-blue-50 hover:bg-blue-100 text-blue-700 text-xs font-bold py-1.5 px-3 rounded-lg transition-all" title="Edit">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        Edit
                                    </a>
                                    @if($item->is_archived)
                                    <form action="{{ route('admin.content.restore', $item) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center gap-1 bg-green-50 hover:bg-green-100 text-green-700 text-xs font-bold py-1.5 px-3 rounded-lg transition-all" title="Restore">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                            Restore
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.content.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Permanently delete this item? This cannot be undone.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1 bg-red-50 hover:bg-red-100 text-red-700 text-xs font-bold py-1.5 px-3 rounded-lg transition-all" title="Delete Permanently">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            Delete
                                        </button>
                                    </form>
                                    @else
                                    <form action="{{ route('admin.content.archive', $item) }}" method="POST" class="inline" onsubmit="return confirm('Archive this item? It will be hidden from the website.')">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center gap-1 bg-amber-50 hover:bg-amber-100 text-amber-700 text-xs font-bold py-1.5 px-3 rounded-lg transition-all" title="Archive">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
                                            Archive
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="px-4 py-12 text-center text-slate-400">
                                <div class="text-4xl mb-2">📝</div>
                                No content items in this section yet.
                                <a href="{{ route('admin.content.create', ['section' => $currentSection]) }}" class="text-green-600 hover:underline font-semibold ml-1">Add one now →</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
