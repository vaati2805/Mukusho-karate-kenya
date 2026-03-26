<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us — Mukusho Karate Kenya</title>
    <meta name="description" content="Get in touch with Mukusho Karate Kenya. Claim your free trial class, find our training locations in Nyeri, Nanyuki, and Murang'a, or contact Sensei Benard directly.">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; margin: 0; color: #1e293b; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Oswald', sans-serif; }
        .hero-overlay { background: linear-gradient(135deg, rgba(185,28,28,0.9), rgba(15,23,42,0.85)); }
        .section-fade { opacity: 0; transform: translateY(30px); transition: all 0.8s ease; }
        .section-fade.visible { opacity: 1; transform: translateY(0); }
        .contact-card { transition: all 0.3s ease; }
        .contact-card:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.12); }
    </style>
</head>
<body>

    @include('partials.navbar')

    {{-- Hero Section --}}
    @php
        $pageHeroItems = $sections['hero_contact'] ?? collect();
        $pageHero = $pageHeroItems->first();
        $heroMedia = $pageHero && $pageHero->media ? $pageHero->media->first() : null;
    @endphp
    <section style="position: relative; min-height: 45vh; display: flex; align-items: center; justify-content: center; overflow: hidden; background: #000; padding: 140px 0 60px;">
        @if($heroMedia)
            @if($heroMedia->isImage())
                <img src="{{ $heroMedia->url }}" alt="Contact Hero" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.5;">
            @else
                <video src="{{ $heroMedia->url }}" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.5;" muted loop autoplay playsinline></video>
            @endif
        @else
            <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.2; filter: blur(3px);">
        @endif
        <div class="hero-overlay" style="position: absolute; inset: 0;"></div>
        <div style="position: relative; z-index: 10; text-align: center; color: white; padding: 0 20px; max-width: 900px;">
            <div style="display: inline-block; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 8px 24px; border-radius: 50px; margin-bottom: 24px; border: 1px solid rgba(255,255,255,0.2);">
                <span style="font-size: 14px; letter-spacing: 0.2em; text-transform: uppercase; font-weight: 500;">📞 Get In Touch</span>
            </div>
            <h1 class="font-display" style="font-size: clamp(2.5rem, 6vw, 4.5rem); font-weight: 700; margin: 0 0 16px; line-height: 1.1; text-shadow: 2px 4px 8px rgba(0,0,0,0.3);">Contact <span style="color: #fbbf24;">Us</span></h1>
            <p style="font-size: 1.25rem; opacity: 0.9; max-width: 600px; margin: 0 auto; line-height: 1.6;">Your first trial class is absolutely free. Come and experience authentic karate training.</p>
        </div>
    </section>

    {{-- Contact Info Cards --}}
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 section-fade">
                <div class="contact-card bg-gradient-to-br from-red-50 to-red-100 rounded-2xl p-8 border border-red-200 text-center">
                    <div class="w-16 h-16 bg-red-600 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-slate-900 text-xl uppercase mb-3">Our Locations</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Othaya Catholic Parish Hall, <strong>Nyeri</strong><br>ACK St. James Cathedral, <strong>Murang'a</strong><br><strong>Nanyuki</strong></p>
                </div>
                <div class="contact-card bg-gradient-to-br from-amber-50 to-amber-100 rounded-2xl p-8 border border-amber-200 text-center">
                    <div class="w-16 h-16 bg-amber-500 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-slate-900 text-xl uppercase mb-3">Training Times</h3>
                    <p class="text-slate-600 text-sm leading-relaxed"><strong>Monday – Thursday</strong><br>5:30 PM – 7:30 PM<br><em class="text-slate-400">All levels welcome</em></p>
                </div>
                <div class="contact-card bg-gradient-to-br from-red-50 to-red-100 rounded-2xl p-8 border border-red-200 text-center">
                    <div class="w-16 h-16 bg-red-600 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-slate-900 text-xl uppercase mb-3">Contact Sensei</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Sensei Benard Kihachu<br><a href="tel:+254724216488" class="text-red-600 font-bold hover:underline text-lg">0724 216 488</a></p>
                </div>
            </div>
        </div>
    </section>

    {{-- Free Trial Form & WhatsApp --}}
    <section class="py-24 bg-gradient-to-br from-[#0a0a0a] via-slate-900 to-red-900 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-red-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-red-500/10 rounded-full blur-3xl"></div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="section-fade">
                    <div class="inline-flex items-center bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-1.5 text-sm font-semibold mb-6 text-red-300">
                        <span class="w-1.5 h-1.5 bg-red-400 rounded-full mr-2 animate-pulse"></span> Free Trial Available
                    </div>
                    <h2 class="text-4xl md:text-5xl font-display font-bold uppercase mb-6 leading-tight">Ready to Begin<br>Your <span class="text-amber-300">Journey?</span></h2>
                    <p class="text-white/70 text-lg leading-relaxed mb-10">Your first trial class is <strong class="text-white">absolutely free</strong>. Come and experience authentic karate training. No obligation, no pressure &mdash; just step onto the mat.</p>

                    {{-- WhatsApp Direct --}}
                    <div class="space-y-4">
                        <a href="https://wa.me/254724216488?text=Hi%20Sensei%20Benard%2C%20I'm%20interested%20in%20joining%20Mukusho%20Karate%20Kenya.%20Can%20I%20get%20more%20information%3F" target="_blank" class="flex items-center gap-4 bg-[#25D366] hover:bg-[#20bd5a] text-white font-bold py-4 px-6 rounded-xl transition-all hover:-translate-y-1 shadow-lg">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            <div>
                                <div class="text-lg">Chat on WhatsApp</div>
                                <div class="text-white/70 text-sm font-normal">Message Sensei Benard directly</div>
                            </div>
                        </a>
                        <a href="tel:+254724216488" class="flex items-center gap-4 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white font-bold py-4 px-6 rounded-xl transition-all border border-white/20">
                            <svg class="w-8 h-8 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <div>
                                <div class="text-lg">Call 0724 216 488</div>
                                <div class="text-white/50 text-sm font-normal">Sensei Benard Kihachu</div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Free Trial Form --}}
                <div class="bg-white rounded-2xl p-8 text-slate-800 shadow-2xl section-fade relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-red-600 via-amber-400 to-red-500"></div>
                    <h3 class="font-display font-bold text-2xl text-slate-900 uppercase mb-6">Get Your Free Trial</h3>

                    @if(session('trial_success'))
                    <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3">
                        <svg class="w-5 h-5 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-green-800 text-sm font-medium">{{ session('trial_success') }}</p>
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-xl">
                        <ul class="text-red-700 text-sm space-y-1">
                            @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('free.trial.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Full Name</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="Your full name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="your.email@example.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Phone Number</label>
                            <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="+254 7XX XXX XXX">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Interested In</label>
                            <select name="program" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm">
                                <option value="">Select a program</option>
                                <option value="kids">Little Warriors (Ages 5-12)</option>
                                <option value="teens-adults">Teens & Adults (Ages 13+)</option>
                                <option value="competition">Elite Competition</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Message (Optional)</label>
                            <textarea name="message" rows="3" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm resize-none" placeholder="Any questions or special requirements?"></textarea>
                        </div>
                        <div class="pt-2">
                            <button type="submit" class="relative block w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white font-display font-bold py-4 rounded-xl uppercase tracking-wider shadow-[0_4px_14px_0_rgba(185,28,28,0.39)] hover:shadow-[0_6px_20px_rgba(185,28,28,0.23)] hover:-translate-y-0.5 transition-all duration-200 text-base">
                                Claim Your Free Trial &rarr;
                            </button>
                        </div>
                        <p class="text-xs text-slate-500 text-center mt-4">No commitment required. Come train with us and decide.</p>
                    </form>

                    {{-- Register & Pay Buttons --}}
                    <div class="mt-6 pt-6 border-t border-slate-200">
                        <p class="text-xs text-slate-500 text-center mb-3 uppercase tracking-wide font-semibold">Already a member?</p>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('register.create') }}" class="flex items-center justify-center gap-2 bg-amber-500 hover:bg-amber-400 text-slate-900 font-bold py-3 px-4 rounded-xl uppercase text-sm tracking-wide transition-all hover:-translate-y-0.5 shadow-md">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                                Register
                            </a>
                            <a href="{{ route('payment.create') }}" class="flex items-center justify-center gap-2 bg-slate-800 hover:bg-slate-700 text-white font-bold py-3 px-4 rounded-xl uppercase text-sm tracking-wide transition-all hover:-translate-y-0.5 shadow-md">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                Pay Monthly
                            </a>
                        </div>
                    </div>
                </div>
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
