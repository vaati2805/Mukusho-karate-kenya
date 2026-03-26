<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events & Competitions — Mukusho Karate Kenya</title>
    <meta name="description" content="Stay updated with upcoming tournaments, gradings, and special events at Mukusho Karate Kenya.">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; margin: 0; color: #1e293b; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Oswald', sans-serif; }
        .section-fade { opacity: 0; transform: translateY(30px); transition: all 0.8s ease; }
        .section-fade.visible { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body>

    @include('partials.navbar')

    {{-- Hero --}}
    @php
        $pageHeroItems = $sections['hero_events'] ?? collect();
        $pageHero = $pageHeroItems->first();
        $heroMedia = $pageHero && $pageHero->media ? $pageHero->media->first() : null;
    @endphp
    <section style="position: relative; min-height: 45vh; display: flex; align-items: center; justify-content: center; overflow: hidden; background: #000; padding: 140px 0 60px;">
        @if($heroMedia)
            @if($heroMedia->isImage())
                <img src="{{ $heroMedia->url }}" alt="Events Hero" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.5;">
            @else
                <video src="{{ $heroMedia->url }}" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.5;" muted loop autoplay playsinline></video>
            @endif
        @else
            <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.2; filter: blur(3px);">
        @endif
        <div style="position: absolute; inset: 0; background: linear-gradient(135deg, rgba(15,23,42,0.85), rgba(0,0,0,0.75));"></div>
        <div style="position: relative; z-index: 10; text-align: center; color: white; padding: 0 20px; max-width: 900px;">
            <div style="display: inline-block; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 8px 24px; border-radius: 50px; margin-bottom: 24px; border: 1px solid rgba(255,255,255,0.2);">
                <span style="font-size: 14px; letter-spacing: 0.2em; text-transform: uppercase; font-weight: 500;">📅 Events & Calendar</span>
            </div>
            <h1 class="font-display" style="font-size: clamp(2.5rem, 6vw, 4.5rem); font-weight: 700; margin: 0 0 16px; line-height: 1.1;">Events & <span style="color: #ef4444;">Competitions</span></h1>
            <p style="font-size: 1.25rem; opacity: 0.9; max-width: 600px; margin: 0 auto; line-height: 1.6;">Upcoming tournaments, gradings, and special events from Mukusho Karate Kenya.</p>
        </div>
    </section>

    @php
        $eventItems = $sections['events'] ?? collect();

        $upcomingEvents = $eventItems->filter(function($e) {
            $monthYear = explode(' ', $e->extra('date', ''));
            $day = $e->extra('day', '01');
            $dateString = count($monthYear) == 2 ? $monthYear[0] . ' ' . $day . ' ' . $monthYear[1] : $e->extra('date', '') . ' ' . $day;
            return \Carbon\Carbon::parse($dateString)->isFuture();
        })->sortBy(function($e) {
            $monthYear = explode(' ', $e->extra('date', ''));
            $day = $e->extra('day', '01');
            $dateString = count($monthYear) == 2 ? $monthYear[0] . ' ' . $day . ' ' . $monthYear[1] : $e->extra('date', '') . ' ' . $day;
            return \Carbon\Carbon::parse($dateString);
        });

        $pastEvents = $eventItems->filter(function($e) {
            $monthYear = explode(' ', $e->extra('date', ''));
            $day = $e->extra('day', '01');
            $dateString = count($monthYear) == 2 ? $monthYear[0] . ' ' . $day . ' ' . $monthYear[1] : $e->extra('date', '') . ' ' . $day;
            $eventDate = \Carbon\Carbon::parse($dateString);
            return $eventDate->isPast() || $eventDate->isToday();
        })->sortByDesc(function($e) {
            $monthYear = explode(' ', $e->extra('date', ''));
            $day = $e->extra('day', '01');
            $dateString = count($monthYear) == 2 ? $monthYear[0] . ' ' . $day . ' ' . $monthYear[1] : $e->extra('date', '') . ' ' . $day;
            return \Carbon\Carbon::parse($dateString);
        });
    @endphp

    {{-- UPCOMING EVENTS --}}
    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 section-fade">
                <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 uppercase">Upcoming <span class="text-red-700">Events</span></h2>
                <p class="text-slate-600 max-w-2xl mx-auto text-lg mt-4">Mark your calendar for these upcoming competitions, gradings, and special events.</p>
            </div>

            @if($upcomingEvents->isEmpty())
                <div class="text-center py-16 bg-white rounded-2xl border border-dashed border-slate-200 section-fade">
                    <div class="text-4xl mb-3">📅</div>
                    <p class="text-slate-400 text-lg font-medium">No upcoming events yet</p>
                    <p class="text-slate-300 text-sm mt-1">Check back soon for new competitions & gradings</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($upcomingEvents as $event)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-slate-100 section-fade group">
                        <div class="relative h-56 overflow-hidden">
                            @if($event->media && $event->media->count() > 0)
                                @php $singleMedia = $event->media->first(); @endphp
                                @if($singleMedia->isImage())
                                    <img src="{{ $singleMedia->url }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <video class="w-full h-full object-cover bg-black" muted playsinline>
                                        <source src="{{ $singleMedia->url }}" type="video/mp4">
                                    </video>
                                @endif
                            @elseif($event->image)
                                <img src="{{ str_starts_with($event->image, 'content/') ? asset('storage/' . $event->image) : asset($event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-red-700 to-slate-900 flex items-center justify-center">
                                    <div class="text-center">
                                        <div class="text-4xl mb-2">🥋</div>
                                        <p class="text-white/60 text-sm font-medium">{{ $event->extra('type', 'Event') }}</p>
                                    </div>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4 bg-red-700 text-white rounded-lg px-3 py-2 text-center shadow-lg">
                                <div class="text-xl font-display font-bold leading-none">{{ $event->extra('day', '') }}</div>
                                <div class="text-[10px] uppercase tracking-wider font-semibold opacity-90">{{ $event->extra('date', '') }}</div>
                            </div>
                            <div class="absolute bottom-4 left-4">
                                <span class="bg-{{ $event->extra('color', 'amber') === 'red' ? 'red-600' : 'amber-500' }} text-white text-[11px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-md shadow">{{ $event->extra('type', '') }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="font-display font-bold text-slate-900 text-lg uppercase leading-tight mb-3">{{ $event->title }}</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-4">{{ $event->content }}</p>
                            <div class="flex items-center gap-2 text-slate-400 text-sm">
                                <svg class="w-4 h-4 text-red-600 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/></svg>
                                <span>{{ $event->extra('location', '') }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- PAST EVENTS --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 section-fade">
                <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 uppercase">Recent <span class="text-slate-400">Events</span></h2>
                <p class="text-slate-600 max-w-2xl mx-auto text-lg mt-4">A look back at our recent competitions, tournaments and achievements.</p>
            </div>

            @if($pastEvents->isEmpty())
                <div class="text-center py-12 section-fade">
                    <p class="text-slate-400 text-lg">No past events to display.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($pastEvents as $event)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-slate-100 section-fade group">
                        <div class="relative h-56 overflow-hidden">
                            @if($event->media && $event->media->count() > 0)
                                @php $singleMedia = $event->media->first(); @endphp
                                @if($singleMedia->isImage())
                                    <img src="{{ $singleMedia->url }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <video class="w-full h-full object-cover bg-black" muted playsinline>
                                        <source src="{{ $singleMedia->url }}" type="video/mp4">
                                    </video>
                                @endif
                            @elseif($event->image)
                                <img src="{{ str_starts_with($event->image, 'content/') ? asset('storage/' . $event->image) : asset($event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-slate-700 via-slate-600 to-slate-800 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4 bg-slate-800/90 text-white rounded-lg px-3 py-2 text-center shadow-lg">
                                <div class="text-xl font-display font-bold leading-none">{{ $event->extra('day', '') }}</div>
                                <div class="text-[10px] uppercase tracking-wider font-semibold opacity-90">{{ $event->extra('date', '') }}</div>
                            </div>
                            <div class="absolute bottom-4 left-4">
                                <span class="bg-slate-700 text-white text-[11px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-md shadow">{{ $event->extra('type', '') }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="font-display font-bold text-slate-900 text-lg uppercase leading-tight mb-3">{{ $event->title }}</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-4">{{ $event->content }}</p>
                            <div class="flex items-center gap-2 text-slate-400 text-sm">
                                <svg class="w-4 h-4 text-red-600 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/></svg>
                                <span>{{ $event->extra('location', '') }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section style="padding: 80px 20px; background: linear-gradient(135deg, #0f172a, #334155); text-align: center;">
        <div style="max-width: 700px; margin: 0 auto;">
            <h2 class="font-display" style="font-size: 2.5rem; font-weight: 700; color: white; margin-bottom: 16px;">Don't Miss Out</h2>
            <p style="color: #94a3b8; font-size: 1.1rem; margin-bottom: 32px;">Join Mukusho Karate Kenya and participate in these exciting events.</p>
            <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('register.create') }}" style="background: #B91C1C; color: white; padding: 16px 40px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 15px; text-transform: uppercase; letter-spacing: 0.05em; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.2)'" onmouseout="this.style.transform=''; this.style.boxShadow=''">Register Now</a>
                <a href="{{ route('contact') }}" style="background: transparent; color: white; padding: 16px 40px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 15px; text-transform: uppercase; letter-spacing: 0.05em; transition: all 0.3s; border: 2px solid rgba(255,255,255,0.3);" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform=''">Contact Us</a>
            </div>
        </div>
    </section>

    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => { if (entry.isIntersecting) { entry.target.classList.add('visible'); } });
        }, { threshold: 0.1 });
        document.querySelectorAll('.section-fade').forEach(el => observer.observe(el));
    </script>
    @include('partials.footer')
</body>
</html>
