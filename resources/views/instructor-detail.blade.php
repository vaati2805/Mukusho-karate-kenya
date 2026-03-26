<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $instructor->title }} — Mukusho Karate Kenya</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Oswald', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex flex-col">

    {{-- Top Bar --}}
    <div class="bg-slate-900 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="/" class="flex items-center space-x-3">
                    <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="Mukusho Karate Kenya Logo" class="h-10 w-auto rounded-full shadow border-2 border-white/10">
                    <div class="font-display font-bold tracking-wider uppercase text-sm">
                        <span class="text-white">MUKUSHO</span>
                        <span class="text-red-400 text-xs ml-1">KARATE KENYA</span>
                    </div>
                </a>
                <a href="/#instructor" class="text-slate-400 hover:text-white text-sm transition-colors font-semibold tracking-wide">&larr; Back to Instructors</a>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <main class="flex-grow max-w-5xl mx-auto px-4 py-12 w-full">
        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                {{-- Media Column --}}
                <div class="bg-slate-900 relative">
                    @php
                        $fallback = asset('images/mukusho-logo.jpeg');
                        if ($instructor->image && $instructor->media->isEmpty()) {
                            $fallback = str_starts_with($instructor->image, 'content/') ? asset('storage/' . $instructor->image) : asset($instructor->image);
                        }
                    @endphp
                    <div class="h-full min-h-[400px]">
                        <x-media-slideshow :media="$instructor->media" :fallbackImage="$fallback" roundedClass="" aspectClass="h-full w-full object-cover" />
                    </div>
                </div>

                {{-- Info Column --}}
                <div class="p-8 md:p-12 flex flex-col justify-center">
                    <div class="inline-block bg-blue-50 text-blue-700 rounded-full px-4 py-1.5 text-xs font-bold uppercase tracking-wider mb-4 w-fit border border-blue-100">{{ $instructor->subtitle ?? 'Instructor' }}</div>
                    
                    <h1 class="font-display text-4xl md:text-5xl font-bold text-slate-900 uppercase leading-tight mb-6">
                        {!! nl2br(e($instructor->title)) !!}
                    </h1>

                    <div class="prose prose-slate prose-lg max-w-none text-slate-600 mb-8">
                        @if($instructor->content)
                            {!! $instructor->content !!}
                        @else
                            <p>No additional details provided.</p>
                        @endif
                    </div>

                    @php
                        $tags = $instructor->extra('tags', []);
                        if (!is_array($tags) && !empty($tags)) $tags = [$tags];
                    @endphp
                    @if(!empty($tags))
                        <div class="flex flex-wrap gap-2 mb-8">
                            @foreach($tags as $tag)
                                <span class="bg-slate-100 text-slate-600 px-3 py-1.5 rounded-md text-xs font-semibold border border-slate-200 shadow-sm">{{ $tag }}</span>
                            @endforeach
                        </div>
                    @endif

                    <div class="flex flex-wrap gap-3 mt-auto">
                        @if($instructor->extra('whatsapp'))
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $instructor->extra('whatsapp')) }}" target="_blank" class="inline-flex items-center gap-2 bg-[#25D366] hover:bg-[#128C7E] text-white font-bold py-3.5 px-6 rounded-xl transition-all hover:-translate-y-0.5 uppercase text-sm tracking-wide shadow-lg shadow-green-500/20">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.489-1.761-1.662-2.06-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M2.004 22l1.352-4.968A9.892 9.892 0 011.95 11.95a9.96 9.96 0 1120.015 0 9.96 9.96 0 01-14.71 8.647L2.004 22zm5.446-2.583a8.172 8.172 0 109.916-12.8 8.17 8.17 0 00-11.416 1.492 8.118 8.118 0 00-1.085 4.39A8.106 8.106 0 005.12 17.1l-1.01 3.71 3.784-1.011z"/></svg>
                            WhatsApp
                        </a>
                        @endif
                        
                        @if($instructor->extra('phone'))
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $instructor->extra('phone')) }}" class="inline-flex items-center gap-3 bg-slate-900 hover:bg-slate-800 text-white font-bold py-3.5 px-6 rounded-xl transition-all hover:-translate-y-0.5 uppercase text-sm tracking-wide shadow-lg shadow-slate-900/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            Call
                        </a>
                        @endif

                        @if($instructor->extra('facebook'))
                        <a href="{{ $instructor->extra('facebook') }}" target="_blank" class="inline-flex items-center gap-2 bg-[#1877F2] hover:bg-[#166fe5] text-white font-bold py-3.5 px-6 rounded-xl transition-all hover:-translate-y-0.5 uppercase text-sm tracking-wide shadow-lg shadow-blue-500/20">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            Facebook
                        </a>
                        @endif

                        @if($instructor->extra('instagram'))
                        <a href="{{ $instructor->extra('instagram') }}" target="_blank" class="inline-flex items-center gap-2 bg-gradient-to-tr from-[#f09433] via-[#e6683c] to-[#bc1888] hover:opacity-90 text-white font-bold py-3.5 px-6 rounded-xl transition-all hover:-translate-y-0.5 uppercase text-sm tracking-wide shadow-lg shadow-pink-500/20">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            Instagram
                        </a>
                        @endif
                        
                        @if($instructor->extra('tiktok'))
                        <a href="{{ $instructor->extra('tiktok') }}" target="_blank" class="inline-flex items-center gap-2 bg-black hover:bg-slate-900 text-white font-bold py-3.5 px-6 rounded-xl transition-all hover:-translate-y-0.5 uppercase text-sm tracking-wide shadow-lg shadow-black/20">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 448 512"><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"/></svg>
                            TikTok
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-slate-900 mt-auto border-t border-slate-800/50 pt-8 pb-8 text-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-slate-500 text-sm">
                &copy; {{ date('Y') }} Mukusho Karate Kenya. All rights reserved.
            </p>
        </div>
    </footer>

</body>
</html>
