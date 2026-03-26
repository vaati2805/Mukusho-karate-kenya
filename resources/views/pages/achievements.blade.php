<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements & Champions — Mukusho Karate Kenya</title>
    <meta name="description" content="Discover the achievements of Mukusho Karate Kenya athletes at national and international competitions. Our champions represent Kenya with distinction.">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; margin: 0; color: #1e293b; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Oswald', sans-serif; }
        .hero-overlay { background: linear-gradient(135deg, rgba(180,83,9,0.85), rgba(0,0,0,0.75)); }
        .section-fade { opacity: 0; transform: translateY(30px); transition: all 0.8s ease; }
        .section-fade.visible { opacity: 1; transform: translateY(0); }
        .achievement-card { transition: all 0.3s ease; }
        .achievement-card:hover { transform: translateY(-8px); box-shadow: 0 25px 50px rgba(0,0,0,0.15); }
        .timeline-item { transition: all 0.3s ease; }
        .timeline-item:hover { transform: translateX(8px); }
    </style>
</head>
<body>

    @include('partials.navbar')

    {{-- Hero Section --}}
    @php
        $pageHeroItems = $sections['hero_achievements'] ?? collect();
        $pageHero = $pageHeroItems->first();
        $heroMedia = $pageHero && $pageHero->media ? $pageHero->media->first() : null;
    @endphp
    <section style="position: relative; min-height: 45vh; display: flex; align-items: center; justify-content: center; overflow: hidden; background: #000; padding: 140px 0 60px;">
        @if($heroMedia)
            @if($heroMedia->isImage())
                <img src="{{ $heroMedia->url }}" alt="Achievements Hero" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.5;">
            @else
                <video src="{{ $heroMedia->url }}" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.5;" muted loop autoplay playsinline></video>
            @endif
        @else
            <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.2; filter: blur(3px);">
        @endif
        <div class="hero-overlay" style="position: absolute; inset: 0;"></div>
        <div style="position: relative; z-index: 10; text-align: center; color: white; padding: 0 20px; max-width: 900px;">
            <div style="display: inline-block; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 8px 24px; border-radius: 50px; margin-bottom: 24px; border: 1px solid rgba(255,255,255,0.2);">
                <span style="font-size: 14px; letter-spacing: 0.2em; text-transform: uppercase; font-weight: 500;">🏆 Hall of Champions</span>
            </div>
            <h1 class="font-display" style="font-size: clamp(2.5rem, 6vw, 4.5rem); font-weight: 700; margin: 0 0 16px; line-height: 1.1; text-shadow: 2px 4px 8px rgba(0,0,0,0.3);">Our <span style="color: #fbbf24;">Champions</span> &<br>Achievements</h1>
            <p style="font-size: 1.25rem; opacity: 0.9; max-width: 600px; margin: 0 auto; line-height: 1.6;">Mukusho Karate Kenya athletes have represented the club with distinction at national and international competitions.</p>
        </div>
    </section>

    {{-- Stats Banner --}}
    <section class="py-12 bg-slate-900">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 section-fade">
                <div class="bg-gradient-to-br from-red-800 to-red-700 rounded-2xl p-6 text-center text-white">
                    <div class="font-display text-3xl md:text-4xl font-bold">50+</div>
                    <div class="text-red-100 text-sm font-medium mt-1">Active Athletes</div>
                </div>
                <div class="bg-gradient-to-br from-amber-600 to-amber-500 rounded-2xl p-6 text-center text-white">
                    <div class="font-display text-3xl md:text-4xl font-bold">3</div>
                    <div class="text-amber-100 text-sm font-medium mt-1">Training Locations</div>
                </div>
                <div class="bg-gradient-to-br from-red-700 to-red-600 rounded-2xl p-6 text-center text-white">
                    <div class="font-display text-3xl md:text-4xl font-bold">10+</div>
                    <div class="text-red-100 text-sm font-medium mt-1">National Events</div>
                </div>
                <div class="bg-gradient-to-br from-slate-700 to-slate-600 rounded-2xl p-6 text-center text-white">
                    <div class="font-display text-3xl md:text-4xl font-bold">🥉</div>
                    <div class="text-slate-200 text-sm font-medium mt-1">Commonwealth Medal</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Achievement Cards --}}
    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 section-fade">
                <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 uppercase">Featured <span class="text-red-700">Achievements</span></h2>
                <p class="text-slate-600 max-w-2xl mx-auto text-lg mt-4">Individual and team accomplishments that define our legacy.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php $achievements = $sections['achievements'] ?? collect(); @endphp

                @forelse($achievements as $ach)
                <div class="achievement-card bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm section-fade flex flex-col h-full">
                    <div class="relative h-64 overflow-hidden">
                        @php
                            $achFallback = null;
                            if ($ach->image && $ach->media->isEmpty()) {
                                $achFallback = str_starts_with($ach->image, 'content/') ? asset('storage/' . $ach->image) : asset($ach->image);
                            }
                        @endphp
                        @if($ach->media->isNotEmpty() || $achFallback)
                            <div class="w-full h-full">
                                <x-media-slideshow :media="$ach->media" :fallbackImage="$achFallback" roundedClass="" aspectClass="h-full" />
                            </div>
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center p-6 text-center">
                                <div>
                                    <div class="text-4xl mb-3">🏆</div>
                                    <h3 class="font-display font-bold text-white text-lg uppercase tracking-wider">{{ $ach->title ?? 'Achievement' }}</h3>
                                </div>
                            </div>
                        @endif
                        <div class="absolute top-3 left-3"><span class="inline-block bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase shadow-lg">{{ $ach->extra('badge') ?? 'Top Performer' }}</span></div>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <h4 class="font-display font-bold text-slate-900 text-lg uppercase">{{ $ach->title }}</h4>
                        @if($ach->subtitle)
                        <p class="text-sm text-slate-500 mb-3">{{ $ach->subtitle }}</p>
                        @endif
                        <p class="text-slate-600 text-sm">{!! Str::limit($ach->content, 250) !!}</p>
                    </div>
                </div>
                @empty
                {{-- Fallback: Static achievement cards --}}
                <div class="achievement-card bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm section-fade flex flex-col h-full">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/jamesinstructor.jpeg') }}" alt="Sensei Benard Kihachu" class="w-full h-full object-cover object-top">
                        <div class="absolute top-3 left-3"><span class="inline-block bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase shadow-lg">🥇 Lead Competitor</span></div>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <h4 class="font-display font-bold text-slate-900 text-lg uppercase">Sensei Benard Kihachu</h4>
                        <p class="text-sm text-slate-500 mb-3">Male Kata — Kenya National Team</p>
                        <p class="text-slate-600 text-sm">Member of the Kenya National Karate Team and <strong>Bronze Medalist</strong> at the <strong>11th Commonwealth Karate Championships</strong>. Represented Kenya at the World Karate Championships where the team achieved an impressive 9th place out of 23 countries.</p>
                    </div>
                </div>
                <div class="achievement-card bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm section-fade flex flex-col h-full">
                    <div class="relative h-64 overflow-hidden">
                        <div class="w-full h-full bg-gradient-to-br from-red-800 to-slate-900 flex items-center justify-center p-6 text-center">
                            <div>
                                <div class="text-5xl mb-4">🥋</div>
                                <h3 class="font-display font-bold text-white text-xl uppercase tracking-wider">Team Kata</h3>
                                <p class="text-red-300 text-sm mt-2">National Trials 2024</p>
                            </div>
                        </div>
                        <div class="absolute top-3 left-3"><span class="inline-block bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase shadow-lg">🏆 2024 National</span></div>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <h4 class="font-display font-bold text-slate-900 text-lg uppercase">National Trials 2024</h4>
                        <p class="text-sm text-slate-500 mb-3">Male Team Kata Championship</p>
                        <p class="text-slate-600 text-sm">Mukusho Nyeri Karate Club's team competed at the <strong>2024 National Trials</strong> male team kata championship, demonstrating the club's growing strength in competitive karate and Shorin-Ryu excellence.</p>
                    </div>
                </div>
                <div class="achievement-card bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm section-fade flex flex-col h-full">
                    <div class="relative h-64 overflow-hidden">
                        <div class="w-full h-full bg-gradient-to-br from-amber-600 to-red-700 flex items-center justify-center p-6 text-center">
                            <div>
                                <div class="text-5xl mb-4">👥</div>
                                <h3 class="font-display font-bold text-white text-xl uppercase tracking-wider">Community Impact</h3>
                                <p class="text-amber-200 text-sm mt-2">Nyeri · Nanyuki · Murang'a</p>
                            </div>
                        </div>
                        <div class="absolute top-3 left-3"><span class="inline-block bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase shadow-lg">🌍 Growing</span></div>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <h4 class="font-display font-bold text-slate-900 text-lg uppercase">Youth Development Program</h4>
                        <p class="text-sm text-slate-500 mb-3">Community Empowerment Through Karate</p>
                        <p class="text-slate-600 text-sm">Training <strong>hundreds of youth</strong> across three counties with affordable karate programs. Building discipline, confidence, and life skills through the art of Shorin-Ryu — supported by spiritual mentorship from <strong>Rev. Fr. Peter Kiongo</strong>.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Achievement Timeline --}}
    <section class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 section-fade">
                <h2 class="text-4xl font-display font-bold text-slate-900 uppercase">Our <span class="text-amber-500">Journey</span></h2>
                <p class="text-slate-600 max-w-xl mx-auto mt-4">Key milestones in Mukusho Karate Kenya's rise as a premier karate organization.</p>
            </div>
            <div class="space-y-6 section-fade">
                <div class="timeline-item flex gap-6 items-start p-6 bg-slate-50 rounded-2xl border border-slate-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl flex items-center justify-center shrink-0 text-white font-display font-bold text-lg shadow-lg">🥉</div>
                    <div>
                        <h4 class="font-display font-bold text-slate-900 text-lg uppercase">Commonwealth Bronze Medal</h4>
                        <p class="text-amber-600 text-sm font-semibold mb-2">11th Commonwealth Karate Championships</p>
                        <p class="text-slate-600 text-sm">Sensei Benard Kihachu earned a Bronze Medal representing Kenya in Male Kata at the Commonwealth Championships — a historic achievement for the club.</p>
                    </div>
                </div>
                <div class="timeline-item flex gap-6 items-start p-6 bg-slate-50 rounded-2xl border border-slate-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-700 rounded-2xl flex items-center justify-center shrink-0 text-white font-display font-bold text-lg shadow-lg">🌍</div>
                    <div>
                        <h4 class="font-display font-bold text-slate-900 text-lg uppercase">World Karate Championships</h4>
                        <p class="text-red-600 text-sm font-semibold mb-2">Kenya National Team — 9th out of 23 Countries</p>
                        <p class="text-slate-600 text-sm">The Kenya team, featuring Mukusho's Sensei Benard, placed an impressive 9th out of 23 countries at the World Karate Championships, showcasing Kenya's growing status in world karate.</p>
                    </div>
                </div>
                <div class="timeline-item flex gap-6 items-start p-6 bg-slate-50 rounded-2xl border border-slate-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-700 rounded-2xl flex items-center justify-center shrink-0 text-white font-display font-bold text-lg shadow-lg">🥋</div>
                    <div>
                        <h4 class="font-display font-bold text-slate-900 text-lg uppercase">2024 National Trials</h4>
                        <p class="text-red-600 text-sm font-semibold mb-2">Male Team Kata Championship</p>
                        <p class="text-slate-600 text-sm">Mukusho Nyeri Karate Club fielded a competitive team at the 2024 National Trials for male team kata, proving the depth of talent within the club and exciting future prospects.</p>
                    </div>
                </div>
                <div class="timeline-item flex gap-6 items-start p-6 bg-slate-50 rounded-2xl border border-slate-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-slate-700 to-slate-800 rounded-2xl flex items-center justify-center shrink-0 text-white font-display font-bold text-lg shadow-lg">👥</div>
                    <div>
                        <h4 class="font-display font-bold text-slate-900 text-lg uppercase">3-County Expansion</h4>
                        <p class="text-slate-500 text-sm font-semibold mb-2">Nyeri · Nanyuki · Murang'a</p>
                        <p class="text-slate-600 text-sm">Successfully expanded training programs to three counties, making quality Shorin-Ryu karate accessible to hundreds of young athletes across central Kenya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section style="padding: 80px 20px; background: linear-gradient(135deg, #fbbf24, #f59e0b); text-align: center;">
        <div style="max-width: 700px; margin: 0 auto;">
            <h2 class="font-display" style="font-size: 2.5rem; font-weight: 700; color: #0f172a; margin-bottom: 16px;">Be Part of Our Story</h2>
            <p style="color: #1e293b; font-size: 1.1rem; margin-bottom: 32px;">Join Mukusho Karate Kenya and write the next chapter of champions.</p>
            <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('register.create') }}" style="background: #B91C1C; color: white; padding: 16px 40px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 15px; text-transform: uppercase; letter-spacing: 0.05em; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.2)'" onmouseout="this.style.transform=''; this.style.boxShadow=''">Register Now</a>
                <a href="{{ route('about') }}#interviews" style="background: white; color: #B91C1C; padding: 16px 40px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 15px; text-transform: uppercase; letter-spacing: 0.05em; transition: all 0.3s; border: 2px solid #B91C1C;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform=''">View Interviews</a>
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
