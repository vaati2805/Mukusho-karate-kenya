<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Resources — Mukusho Karate Kenya</title>
    <meta name="description" content="Explore Mukusho Karate Kenya's training locations, meet our expert instructors, and view our events schedule across Nyeri, Nanyuki, and Murang'a.">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; margin: 0; color: #1e293b; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Oswald', sans-serif; }
        .hero-overlay { background: linear-gradient(135deg, rgba(185,28,28,0.9), rgba(0,0,0,0.7)); }
        .section-fade { opacity: 0; transform: translateY(30px); transition: all 0.8s ease; }
        .section-fade.visible { opacity: 1; transform: translateY(0); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-8px); box-shadow: 0 25px 50px rgba(0,0,0,0.15); }
    </style>
</head>
<body>

    @include('partials.navbar')

    {{-- Hero Section --}}
    @php
        $pageHeroItems = $sections['hero_resources'] ?? collect();
        $pageHero = $pageHeroItems->first();
        $heroMedia = $pageHero && $pageHero->media ? $pageHero->media->first() : null;
    @endphp
    <section style="position: relative; min-height: 45vh; display: flex; align-items: center; justify-content: center; overflow: hidden; background: #000; padding: 140px 0 60px;">
        @if($heroMedia)
            @if($heroMedia->isImage())
                <img src="{{ $heroMedia->url }}" alt="Learning Resources Hero" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.5;">
            @else
                <video src="{{ $heroMedia->url }}" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.5;" muted loop autoplay playsinline></video>
            @endif
        @else
            <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.25; filter: blur(3px);">
        @endif
        <div class="hero-overlay" style="position: absolute; inset: 0;"></div>
        <div style="position: relative; z-index: 10; text-align: center; color: white; padding: 0 20px; max-width: 900px;">
            <div style="display: inline-block; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 8px 24px; border-radius: 50px; margin-bottom: 24px; border: 1px solid rgba(255,255,255,0.2);">
                <span style="font-size: 14px; letter-spacing: 0.2em; text-transform: uppercase; font-weight: 500;">📚 Resources & Training</span>
            </div>
            <h1 class="font-display" style="font-size: clamp(2.5rem, 6vw, 4.5rem); font-weight: 700; margin: 0 0 16px; line-height: 1.1; text-shadow: 2px 4px 8px rgba(0,0,0,0.3);">Learning <br><span style="color: #fbbf24;">Resources</span></h1>
            <p style="font-size: 1.25rem; opacity: 0.9; max-width: 600px; margin: 0 auto; line-height: 1.6;">Find a dojo near you, meet our expert instructors, and discover upcoming events & training schedules.</p>
        </div>
    </section>

    {{-- CLUBS / DOJOS --}}
    <section id="clubs" class="py-24 bg-[#0a0a0a] relative border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 section-fade">
                <div class="inline-flex items-center bg-red-500/20 text-red-100 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">
                    <span class="w-2 h-2 bg-amber-400 rounded-full mr-2 animate-pulse"></span> Our Locations
                </div>
                <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-6 uppercase tracking-tight">
                    Affiliated <span class="text-amber-400">Clubs</span>
                </h2>
                <p class="text-slate-300 max-w-2xl mx-auto text-lg">
                    Join any of our registered Mukusho Karate Kenya clubs spreading across Nyeri, Murang'a, Nanyuki, and surrounding regions.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($sections['clubs'] as $club)
                <div class="bg-slate-800/50 rounded-2xl p-6 shadow-lg border border-slate-700/50 hover:bg-slate-800 hover:border-amber-400/50 hover:-translate-y-1 transition-all duration-300 section-fade group">
                    <div class="w-12 h-12 bg-slate-700 rounded-xl flex items-center justify-center mb-5 group-hover:bg-amber-400 transition-colors duration-300">
                        <svg class="w-6 h-6 text-red-400 group-hover:text-slate-900 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-display font-bold text-white mb-2 uppercase">{{ $club->title }}</h3>
                    <p class="text-slate-300 text-sm font-medium mb-1 line-clamp-1 truncate">{{ $club->content }}</p>
                    <p class="text-amber-400 text-[11px] font-bold uppercase tracking-wider">{{ $club->extra('county', '') }}</p>
                </div>
                @endforeach
            </div>

            <div class="mt-14 text-center section-fade">
                <a href="https://wa.me/254743909457?text=Hi%20Mukusho%20Karate%20Kenya%2C%20I%20would%20like%20to%20know%20more%20about%20your%20clubs%20and%20training%20locations." target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 bg-amber-500 hover:bg-amber-400 text-slate-900 font-bold py-3.5 px-8 rounded-full uppercase tracking-widest text-sm transition-all shadow-xl hover:-translate-y-1 hover:shadow-amber-500/30">
                    <svg class="w-5 h-5 mb-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.489-1.761-1.662-2.06-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M2.004 22l1.352-4.968A9.892 9.892 0 011.95 11.95a9.96 9.96 0 1120.015 0 9.96 9.96 0 01-14.71 8.647L2.004 22zm5.446-2.583a8.172 8.172 0 109.916-12.8 8.17 8.17 0 00-11.416 1.492 8.118 8.118 0 00-1.085 4.39A8.106 8.106 0 005.12 17.1l-1.01 3.71 3.784-1.011z"/></svg>
                    Chat on WhatsApp for Clarity
                </a>
            </div>
        </div>
    </section>

    {{-- INSTRUCTORS --}}
    <section id="instructor" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 section-fade">
                <div class="inline-flex items-center bg-red-50 text-red-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">
                    <span class="w-1.5 h-1.5 bg-red-600 rounded-full mr-2"></span> Meet Our Coaching Team
                </div>
                <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 mb-4 uppercase leading-tight">
                    Learn From The <span class="text-red-700">Best</span>
                </h2>
                <p class="text-slate-600 max-w-2xl mx-auto text-lg">Our instructors bring decades of combined experience in traditional karate, competition coaching, and youth development.</p>
            </div>

            @php
                $allInstructors = $sections['instructors'] ?? collect();
            @endphp
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach($allInstructors as $coach)
                @php
                    $coachFallback = asset('images/mukusho-logo.jpeg');
                    if ($coach->image && $coach->media->isEmpty()) {
                        $coachFallback = str_starts_with($coach->image, 'content/') ? asset('storage/' . $coach->image) : asset($coach->image);
                    }
                    $tags = $coach->extra('tags', []);
                    if (!is_array($tags) && !empty($tags)) $tags = [$tags];
                @endphp
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 overflow-hidden hover:shadow-xl transition-all duration-300 section-fade flex flex-col text-center">
                    <div class="h-64 w-full overflow-hidden relative bg-slate-100 flex items-center justify-center">
                        <x-media-slideshow :media="$coach->media" :fallbackImage="$coachFallback" roundedClass="" aspectClass="h-full w-full object-cover object-top" />
                    </div>
                    <div class="p-8 flex-grow flex flex-col items-center">
                        <div class="inline-block bg-blue-50 text-blue-700 rounded-full px-4 py-1.5 text-xs font-bold uppercase tracking-wider mb-4 border border-blue-100">{{ $coach->subtitle ?? 'Instructor' }}</div>
                        <h3 class="text-3xl font-display font-bold text-slate-900 uppercase mb-4 leading-tight">
                            {!! nl2br(e($coach->title)) !!}
                        </h3>
                        <div class="text-slate-600 text-[15px] leading-relaxed mb-6 line-clamp-3">
                            @if($coach->content)
                                {{ strip_tags($coach->content) }}
                            @else
                                Instructor details will be updated shortly via the CMS.
                            @endif
                        </div>
                        @if(!empty($tags))
                        <div class="flex flex-wrap justify-center gap-2 mb-8 mt-auto">
                            @foreach(array_slice($tags, 0, 3) as $tag)
                            <span class="bg-slate-50 text-slate-500 px-3 py-1 rounded-md text-[11px] font-semibold uppercase tracking-wider border border-slate-200">{{ $tag }}</span>
                            @endforeach
                        </div>
                        @endif
                        <div class="flex flex-col gap-2 mt-auto w-full pt-4 border-t border-slate-100">
                            @if($coach->extra('whatsapp'))
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $coach->extra('whatsapp')) }}" target="_blank" class="inline-flex items-center justify-center gap-2 text-[#25D366] font-bold hover:text-[#128C7E] transition-colors uppercase text-sm tracking-widest group">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.489-1.761-1.662-2.06-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M2.004 22l1.352-4.968A9.892 9.892 0 011.95 11.95a9.96 9.96 0 1120.015 0 9.96 9.96 0 01-14.71 8.647L2.004 22zm5.446-2.583a8.172 8.172 0 109.916-12.8 8.17 8.17 0 00-11.416 1.492 8.118 8.118 0 00-1.085 4.39A8.106 8.106 0 005.12 17.1l-1.01 3.71 3.784-1.011z"/></svg>
                                WhatsApp
                            </a>
                            @endif
                            <a href="{{ route('instructor.show', $coach->id) }}" class="inline-flex items-center justify-center gap-2 text-slate-700 font-bold hover:text-red-600 transition-colors uppercase text-sm tracking-widest group">
                                Read Full Profile
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- EVENTS & SCHEDULE --}}
    @php $events = $sections['events'] ?? collect(); @endphp
    <section id="schedule" class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-80 h-80 bg-red-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-red-500/10 rounded-full blur-3xl"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 section-fade">
                <div class="inline-flex items-center bg-white/10 text-red-300 rounded-full px-4 py-1.5 text-sm font-semibold mb-6 backdrop-blur-sm border border-white/10">
                    <span class="w-1.5 h-1.5 bg-red-400 rounded-full mr-2 animate-pulse"></span> Stay Updated
                </div>
                <h2 class="text-4xl md:text-5xl font-display font-bold uppercase mb-4">Events & <span class="text-amber-300">Schedule</span></h2>
                <p class="text-white/60 max-w-2xl mx-auto text-lg">Upcoming tournaments, gradings, and special events for Mukusho Karate Kenya members.</p>
            </div>

            @if($events->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($events as $event)
                <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10 hover:border-red-400/30 transition-all section-fade">
                    <h3 class="font-display font-bold text-white text-lg uppercase mb-2">{{ $event->title }}</h3>
                    @if($event->subtitle)
                    <p class="text-amber-300 text-sm font-semibold mb-3">{{ $event->subtitle }}</p>
                    @endif
                    <p class="text-white/60 text-sm leading-relaxed">{{ strip_tags($event->content) }}</p>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center section-fade">
                <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-12 border border-white/10 max-w-2xl mx-auto">
                    <div class="text-5xl mb-4">📅</div>
                    <h3 class="font-display font-bold text-white text-2xl uppercase mb-4">Training Schedule</h3>
                    <div class="space-y-3 text-white/70">
                        <p><strong class="text-white">Monday – Thursday:</strong> 5:30 PM – 7:30 PM</p>
                        <p><strong class="text-white">Locations:</strong> Othaya Catholic Parish Hall (Nyeri), ACK St. James Cathedral (Murang'a), Nanyuki</p>
                        <p class="text-sm text-white/50 mt-4">Upcoming events and tournament dates will be announced here. Follow us on social media for the latest updates.</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    {{-- LIFE AT THE DOJO / GALLERY --}}
    @php
        $allMedia = collect();
        foreach ($sections as $sKey => $sItems) {
            foreach ($sItems as $item) {
                if ($item->media && $item->media->count() > 0) {
                    foreach ($item->media as $m) {
                        $allMedia->push($m);
                    }
                }
            }
        }
        $staticGallery = [
            ['type' => 'image', 'url' => asset('images/Dojo.jpeg'), 'alt' => 'Mukusho Karate Kenya Dojo', 'span' => 'col-span-2 row-span-2'],
            ['type' => 'image', 'url' => asset('images/david.jpeg'), 'alt' => 'Karate training session', 'span' => ''],
            ['type' => 'image', 'url' => asset('images/Julius.jpeg'), 'alt' => 'Kata practice session', 'span' => ''],
            ['type' => 'video', 'url' => asset('videos/gemes.mp4'), 'alt' => 'Competition highlights', 'span' => ''],
            ['type' => 'video', 'url' => asset('videos/mercy.mp4'), 'alt' => 'Kumite practice', 'span' => ''],
            ['type' => 'image', 'url' => asset('images/champinship.jpeg'), 'alt' => 'Championship day', 'span' => 'col-span-2'],
            ['type' => 'image', 'url' => asset('images/family.jpeg'), 'alt' => 'Mukusho club members', 'span' => ''],
            ['type' => 'image', 'url' => asset('images/life.jpeg'), 'alt' => 'Life at Mukusho', 'span' => ''],
            ['type' => 'image', 'url' => asset('images/event.jpeg'), 'alt' => 'Karate event', 'span' => 'col-span-2'],
            ['type' => 'image', 'url' => asset('images/jamesinstructor.jpeg'), 'alt' => 'Instructor leading session', 'span' => 'col-span-2'],
        ];
        $galleryMediaJson = $allMedia->map(function($m) {
            return [
                'type' => $m->type,
                'url'  => $m->url,
                'name' => $m->original_name ?? basename($m->path),
            ];
        })->values()->toArray();
    @endphp
    <section id="gallery" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 section-fade">
                <div class="inline-flex items-center bg-red-50 text-red-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">
                    <span class="w-1.5 h-1.5 bg-red-600 rounded-full mr-2"></span> Inside The Dojo
                </div>
                <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 mb-4 uppercase leading-tight">
                    Life At <span class="text-red-700">Mukusho Karate Kenya</span>
                </h2>
                <p class="text-slate-600 max-w-2xl mx-auto text-lg">From training sessions to championship podiums — our club in action.</p>
            </div>

            @if($allMedia->count() > 0)
            {{-- FULL-WIDTH MEDIA SLIDESHOW --}}
            <div class="section-fade" x-data="gallerySlideshow()" x-init="startAutoPlay()">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl bg-black aspect-video max-h-[520px]">
                    <template x-for="(media, index) in mediaItems" :key="index">
                        <div x-show="currentSlide === index"
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0 scale-105"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-300"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute inset-0">
                            <template x-if="media.type === 'image'">
                                <img :src="media.url" :alt="media.name" class="w-full h-full object-cover">
                            </template>
                            <template x-if="media.type === 'video'">
                                <video class="w-full h-full object-cover" :id="'gallery-vid-' + index"
                                       @ended="next()" muted playsinline>
                                    <source :src="media.url" type="video/mp4">
                                </video>
                            </template>
                        </div>
                    </template>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent pointer-events-none"></div>
                    <template x-if="mediaItems[currentSlide] && mediaItems[currentSlide].type === 'video'">
                        <button @click="toggleVideo()" class="absolute inset-0 flex items-center justify-center z-10 group">
                            <div x-show="!isVideoPlaying" class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:bg-white/30 transition-all">
                                <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </button>
                    </template>
                    <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white/10 backdrop-blur-sm hover:bg-white/20 rounded-full flex items-center justify-center text-white transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white/10 backdrop-blur-sm hover:bg-white/20 rounded-full flex items-center justify-center text-white transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                    <div class="absolute bottom-0 left-0 right-0 z-20 p-4 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span x-show="mediaItems[currentSlide] && mediaItems[currentSlide].type === 'video'" class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">Video</span>
                            <span x-show="mediaItems[currentSlide] && mediaItems[currentSlide].type === 'image'" class="bg-red-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">Photo</span>
                            <span class="text-white/80 text-xs" x-text="mediaItems[currentSlide]?.name || ''"></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-white/60 text-xs font-mono" x-text="(currentSlide + 1) + ' / ' + mediaItems.length"></span>
                            <button @click="toggleAutoPlay()" class="w-7 h-7 rounded-full flex items-center justify-center transition-all"
                                    :class="autoPlaying ? 'bg-red-600 hover:bg-red-500' : 'bg-white/10 hover:bg-white/20'">
                                <template x-if="autoPlaying"><svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6"/></svg></template>
                                <template x-if="!autoPlaying"><svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></template>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 mt-4 overflow-x-auto pb-2 scrollbar-thin" x-ref="thumbStrip">
                    <template x-for="(media, index) in mediaItems" :key="'thumb-' + index">
                        <button @click="goTo(index)" class="shrink-0 w-20 h-14 rounded-lg overflow-hidden border-2 transition-all duration-200"
                                :class="currentSlide === index ? 'border-red-500 shadow-lg shadow-red-500/20 scale-105' : 'border-transparent opacity-60 hover:opacity-100'">
                            <template x-if="media.type === 'image'"><img :src="media.url" :alt="media.name" class="w-full h-full object-cover"></template>
                            <template x-if="media.type === 'video'">
                                <div class="w-full h-full bg-slate-800 flex items-center justify-center relative">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    <span class="absolute bottom-0.5 right-0.5 bg-indigo-600 text-white text-[7px] font-bold px-1 rounded">VID</span>
                                </div>
                            </template>
                        </button>
                    </template>
                </div>
            </div>
            @endif

            {{-- Static Grid --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 {{ $allMedia->count() > 0 ? 'mt-12' : '' }} section-fade">
                @foreach($staticGallery as $galleryItem)
                <div class="overflow-hidden rounded-xl {{ $galleryItem['span'] }} group">
                    @if($galleryItem['type'] === 'video')
                        <div class="relative">
                            <video class="w-full h-full object-cover aspect-square" muted loop playsinline onmouseenter="this.play()" onmouseleave="this.pause()">
                                <source src="{{ $galleryItem['url'] }}" type="video/mp4">
                            </video>
                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                <div class="w-12 h-12 bg-white/80 rounded-full flex items-center justify-center group-hover:opacity-0 transition-opacity duration-300">
                                    <svg class="w-5 h-5 text-red-700 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </div>
                    @else
                        <img src="{{ $galleryItem['url'] }}" alt="{{ $galleryItem['alt'] }}" class="w-full h-full object-cover {{ str_contains($galleryItem['span'], 'row-span-2') ? 'aspect-square' : (str_contains($galleryItem['span'], 'col-span-2') ? 'aspect-[2/1]' : 'aspect-square') }} group-hover:scale-110 transition-transform duration-500" loading="lazy">
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section style="padding: 80px 20px; background: linear-gradient(135deg, #fbbf24, #f59e0b); text-align: center;">
        <div style="max-width: 700px; margin: 0 auto;">
            <h2 class="font-display" style="font-size: 2.5rem; font-weight: 700; color: #0f172a; margin-bottom: 16px;">Ready to Start Training?</h2>
            <p style="color: #1e293b; font-size: 1.1rem; margin-bottom: 32px;">Join Mukusho Karate Kenya today. All ages and skill levels welcome.</p>
            <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('register.create') }}" style="background: #B91C1C; color: white; padding: 16px 40px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 15px; text-transform: uppercase; letter-spacing: 0.05em; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.2)'" onmouseout="this.style.transform=''; this.style.boxShadow=''">Register Now</a>
                <a href="/" style="background: white; color: #B91C1C; padding: 16px 40px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 15px; text-transform: uppercase; letter-spacing: 0.05em; transition: all 0.3s; border: 2px solid #B91C1C;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform=''">Back to Home</a>
            </div>
        </div>
    </section>

    <script>
        // Gallery slideshow Alpine.js component
        function gallerySlideshow() {
            return {
                mediaItems: @json($galleryMediaJson),
                currentSlide: 0,
                autoPlaying: false,
                isVideoPlaying: false,
                autoPlayInterval: null,
                startAutoPlay() { this.autoPlaying = true; this.scheduleNext(); },
                scheduleNext() {
                    clearInterval(this.autoPlayInterval);
                    if (!this.autoPlaying) return;
                    const current = this.mediaItems[this.currentSlide];
                    if (current && current.type === 'video') return;
                    this.autoPlayInterval = setInterval(() => { this.next(); }, 5000);
                },
                toggleAutoPlay() { this.autoPlaying = !this.autoPlaying; if (this.autoPlaying) { this.scheduleNext(); } else { clearInterval(this.autoPlayInterval); } },
                next() { this.stopCurrentVideo(); this.currentSlide = (this.currentSlide + 1) % this.mediaItems.length; this.isVideoPlaying = false; this.scrollThumb(); this.scheduleNext(); },
                prev() { this.stopCurrentVideo(); this.currentSlide = (this.currentSlide - 1 + this.mediaItems.length) % this.mediaItems.length; this.isVideoPlaying = false; this.scrollThumb(); this.scheduleNext(); },
                goTo(index) { if (index === this.currentSlide) return; this.stopCurrentVideo(); this.currentSlide = index; this.isVideoPlaying = false; this.scrollThumb(); this.scheduleNext(); },
                toggleVideo() { const vid = document.getElementById('gallery-vid-' + this.currentSlide); if (!vid) return; if (vid.paused) { vid.play(); this.isVideoPlaying = true; clearInterval(this.autoPlayInterval); } else { vid.pause(); this.isVideoPlaying = false; this.scheduleNext(); } },
                stopCurrentVideo() { const vid = document.getElementById('gallery-vid-' + this.currentSlide); if (vid) { vid.pause(); vid.currentTime = 0; } },
                scrollThumb() { this.$nextTick(() => { const strip = this.$refs.thumbStrip; if (!strip) return; const active = strip.children[this.currentSlide]; if (active) { const left = active.offsetLeft - strip.offsetWidth / 2 + active.offsetWidth / 2; strip.scrollTo({ left, behavior: 'smooth' }); } }); }
            };
        }

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => { if (entry.isIntersecting) { entry.target.classList.add('visible'); } });
        }, { threshold: 0.1 });
        document.querySelectorAll('.section-fade').forEach(el => observer.observe(el));
    </script>
    @include('partials.footer')
</body>
</html>
