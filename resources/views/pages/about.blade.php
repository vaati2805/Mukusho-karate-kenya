<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us — Mukusho Karate Kenya & Shorin-Ryu</title>
    <meta name="description" content="Learn about Mukusho Karate Kenya, our Shorin-Ryu karate heritage, instructors, and achievements.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; margin: 0; color: #1e293b; scroll-behavior: smooth; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Oswald', sans-serif; }
        .hero-overlay { background: linear-gradient(135deg, rgba(185,28,28,0.85), rgba(0,0,0,0.7)); }
        .section-fade { opacity: 0; transform: translateY(30px); transition: all 0.8s ease; }
        .section-fade.visible { opacity: 1; transform: translateY(0); }
        .value-card { transition: all 0.3s ease; }
        .value-card:hover { transform: translateY(-8px); box-shadow: 0 25px 50px rgba(0,0,0,0.15); }
        
        /* Shorin Ryu styles */
        .technique-card { transition: all 0.3s ease; border: 2px solid transparent; }
        .technique-card:hover { transform: translateY(-5px); border-color: #b91c1c; box-shadow: 0 20px 40px rgba(0,0,0,0.12); }
        .belt-bar { transition: all 0.3s ease; }
        .belt-bar:hover { transform: scale(1.05); }
        .precept-item { transition: all 0.3s ease; }
        .precept-item:hover { background: rgba(255,255,255,0.15) !important; }
        
        /* Interview styles */
        .interview-card { transition: all 0.3s ease; }
        .interview-card:hover { transform: translateY(-5px); box-shadow: 0 25px 50px rgba(0,0,0,0.12); }
        .achievement-item { transition: all 0.3s ease; }
        .achievement-item:hover { transform: translateX(8px); }
        .video-card { transition: all 0.3s ease; }
        .video-card:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.15); }

        .about-nav-link { font-weight: 700; color: white; text-transform: uppercase; font-size: 13px; letter-spacing: 0.05em; text-decoration: none; padding: 12px 24px; border-radius: 50px; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); transition: all 0.3s; }
        .about-nav-link:hover { background: #fbbf24; color: #0f172a; border-color: #fbbf24; }
    </style>
</head>
<body>

    @include('partials.navbar')

    {{-- Hero Section --}}
    @php
        $pageHeroItems = $sections['hero_about'] ?? collect();
        $pageHero = $pageHeroItems->first();
        $heroMedia = $pageHero && $pageHero->media ? $pageHero->media->first() : null;
    @endphp
    <section style="position: relative; min-height: 55vh; display: flex; align-items: center; justify-content: center; overflow: hidden; background: #000; padding: 120px 0 60px;">
        @if($heroMedia)
            @if($heroMedia->isImage())
                <img src="{{ $heroMedia->url }}" alt="About Hero" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.5;">
            @else
                <video src="{{ $heroMedia->url }}" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.5;" muted loop autoplay playsinline></video>
            @endif
        @else
            <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.3; filter: blur(3px);">
        @endif
        <div class="hero-overlay" style="position: absolute; inset: 0;"></div>
        <div style="position: relative; z-index: 10; text-align: center; color: white; padding: 0 20px; max-width: 900px;">
            <div style="display: inline-block; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 8px 24px; border-radius: 50px; margin-bottom: 24px; border: 1px solid rgba(255,255,255,0.2);">
                <span style="font-size: 14px; letter-spacing: 0.2em; text-transform: uppercase; font-weight: 500;">Est. in Nyeri, Kenya</span>
            </div>
            <h1 class="font-display" style="font-size: clamp(2.5rem, 5vw, 4.5rem); font-weight: 700; margin: 0 0 16px; line-height: 1.1; text-shadow: 2px 4px 8px rgba(0,0,0,0.3);">About Mukusho<br><span style="color: #fbbf24;">Karate Kenya</span></h1>
            <p style="font-size: 1.15rem; opacity: 0.9; max-width: 700px; margin: 0 auto 32px; line-height: 1.6;">Dedicated to the authentic practice and promotion of Shorin-Ryu Karate. Discover our story, heritage, and the interviews with our leading instructors.</p>
            
            <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                <a href="#about-mukusho" class="about-nav-link">Our Story</a>
                <a href="#shorin-ryu" class="about-nav-link">Shorin-Ryu</a>
                <a href="#interviews" class="about-nav-link">Interviews</a>
            </div>
        </div>
    </section>

    <!-- ==========================================
         SECTION 1: ABOUT MUKUSHO KARATE KENYA
         ========================================== -->
    <div id="about-mukusho">
        {{-- Our Story --}}
        <section id="content" style="padding: 80px 20px; background: white;">
            <div style="max-width: 1100px; margin: 0 auto;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
                    <div>
                        <span style="color: #B91C1C; font-weight: 700; text-transform: uppercase; letter-spacing: 0.15em; font-size: 13px;">Our Story</span>
                        <h2 class="font-display" style="font-size: 2.5rem; font-weight: 700; color: #0f172a; margin: 12px 0 24px;">The Birth of Mukusho Karate</h2>
                        <p style="color: #475569; line-height: 1.8; margin-bottom: 16px;">
                            <strong>Mukusho Karate Kenya</strong> was founded with a deep passion for spreading the art of traditional karate across Kenya's central highlands. Based primarily in <strong>Nyeri, Nanyuki, and Murang'a</strong>, the organization draws its name from the Japanese concept of <em>Mokuso</em> (黙想) — the meditative practice of silent reflection that opens and closes every karate training session.
                        </p>
                        <p style="color: #475569; line-height: 1.8; margin-bottom: 16px;">
                            This name embodies our core philosophy: that true martial arts mastery begins with inner peace and mental clarity. Before the first punch is thrown or kick delivered, the karateka must first quiet the mind, center the spirit, and focus completely on the training ahead.
                        </p>
                        <p style="color: #475569; line-height: 1.8;">
                            Under the dedicated leadership of <strong>Sensei Benard Kihanchu</strong>, Mukusho has grown from a small community dojo into a thriving karate organization with multiple training locations, actively participating in national competitions and nurturing the next generation of Kenyan martial artists.
                        </p>
                    </div>
                    <div style="position: relative;">
                        <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="Mukusho Karate Training" style="width: 100%; border-radius: 20px; box-shadow: 0 25px 50px rgba(0,0,0,0.15);">
                        <div style="position: absolute; bottom: -20px; right: -20px; background: linear-gradient(135deg, #B91C1C, #EF4444); color: white; padding: 20px 30px; border-radius: 16px; box-shadow: 0 10px 30px rgba(185,28,28,0.3);">
                            <span class="font-display" style="font-size: 2rem; font-weight: 700; display: block;">3+</span>
                            <span style="font-size: 13px; opacity: 0.9;">Training Locations</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Mission & Vision --}}
        <section style="padding: 100px 20px; background: linear-gradient(135deg, #0f172a 0%, #7f1d1d 100%); color: white;">
            <div style="max-width: 1100px; margin: 0 auto; text-align: center;">
                <h2 class="font-display" style="font-size: 2.5rem; font-weight: 700; margin-bottom: 60px;">Our Mission & Vision</h2>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
                    <div style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 50px 40px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.15);">
                        <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #fbbf24, #f59e0b); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
                            <svg style="width: 32px; height: 32px; color: #0f172a;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h3 class="font-display" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 16px;">Our Mission</h3>
                        <p style="opacity: 0.85; line-height: 1.8;">To promote and teach authentic Shorin-Ryu Karate across Kenya, building discipline, confidence, and championship-level skill in practitioners of all ages. We aim to make quality martial arts training accessible to communities throughout Kenya's central highlands and beyond.</p>
                    </div>
                    <div style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 50px 40px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.15);">
                        <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #EF4444, #B91C1C); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
                            <svg style="width: 32px; height: 32px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                        <h3 class="font-display" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 16px;">Our Vision</h3>
                        <p style="opacity: 0.85; line-height: 1.8;">To be Kenya's leading Shorin-Ryu karate organization, recognized for producing disciplined martial artists, national champions, and community leaders. We envision a future where every interested Kenyan has the opportunity to learn and benefit from the art of karate.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Our Values --}}
        <section style="padding: 100px 20px; background: #f8fafc;">
            <div style="max-width: 1100px; margin: 0 auto; text-align: center;">
                <span style="color: #B91C1C; font-weight: 700; text-transform: uppercase; letter-spacing: 0.15em; font-size: 13px;">What We Stand For</span>
                <h2 class="font-display" style="font-size: 2.5rem; font-weight: 700; color: #0f172a; margin: 12px 0 60px;">Our Core Values</h2>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
                    <div class="value-card" style="background: white; padding: 40px 30px; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); border: 1px solid #e2e8f0;">
                        <div style="font-size: 3rem; margin-bottom: 16px;">🥋</div>
                        <h3 class="font-display" style="font-size: 1.25rem; font-weight: 700; margin-bottom: 12px;">Discipline</h3>
                        <p style="color: #64748b; line-height: 1.7;">Consistent training and mental fortitude are the foundation of every karateka's journey. We build self-discipline that extends beyond the dojo.</p>
                    </div>
                    <div class="value-card" style="background: white; padding: 40px 30px; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); border: 1px solid #e2e8f0;">
                        <div style="font-size: 3rem; margin-bottom: 16px;">🤝</div>
                        <h3 class="font-display" style="font-size: 1.25rem; font-weight: 700; margin-bottom: 12px;">Respect</h3>
                        <p style="color: #64748b; line-height: 1.7;">Karate begins and ends with respect. We honor our instructors, fellow students, and the rich traditions of Okinawan martial arts.</p>
                    </div>
                    <div class="value-card" style="background: white; padding: 40px 30px; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); border: 1px solid #e2e8f0;">
                        <div style="font-size: 3rem; margin-bottom: 16px;">🏆</div>
                        <h3 class="font-display" style="font-size: 1.25rem; font-weight: 700; margin-bottom: 12px;">Excellence</h3>
                        <p style="color: #64748b; line-height: 1.7;">We strive for perfection in every technique, every kata, and every competition. Our students are trained to be champions both on and off the mat.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- ==========================================
         SECTION 2: SHORIN-RYU KARATE
         ========================================== -->
    <div id="shorin-ryu">
        {{-- Introduction / History --}}
        <section style="padding: 100px 20px; background: white; border-top: 1px solid #e2e8f0;">
            <div style="max-width: 1100px; margin: 0 auto;">
                <div style="text-align: center; margin-bottom: 60px;">
                    <span style="color: #b91c1c; font-weight: 700; text-transform: uppercase; letter-spacing: 0.15em; font-size: 13px;">Origins & Heritage</span>
                    <h2 class="font-display" style="font-size: 2.5rem; font-weight: 700; color: #0f172a; margin: 12px 0 24px;">The Art of Shorin-Ryu</h2>
                    <p style="font-size: 1.25rem; color: #475569; line-height: 1.8; max-width: 800px; margin: 0 auto;">
                        Shorin-Ryu (少林流) is one of the oldest and most traditional forms of Okinawan martial arts, translating to "Shaolin Style." It blends indigenous Okinawan fighting arts with Chinese principles.
                    </p>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: start;">
                    <div>
                        <h3 class="font-display" style="font-size: 1.8rem; font-weight: 700; color: #0f172a; margin-bottom: 24px;">History & Evolution</h3>
                        <p style="color: #475569; line-height: 1.8; margin-bottom: 16px;">
                            The origins of Shorin-Ryu trace back to Okinawa, influenced by trading ties with China. Key figures in its development include <strong>Kanga 'Tode' Sakugawa</strong>, the "Father of Okinawan Karate," and his legendary student <strong>Sokon "Bushi" Matsumura</strong>.
                        </p>
                        <p style="color: #475569; line-height: 1.8; margin-bottom: 16px;">
                            <strong>Anko Itosu</strong> introduced karate into Okinawan public schools, developing the Pinan kata series. His student, <strong>Choshin Chibana</strong>, officially named the style "Shorin-Ryu" in 1933. Today, it remains a pillar of traditional karate worldwide.
                        </p>
                    </div>
                    <div style="background: linear-gradient(135deg, #1a1a1a, #8b0000); padding: 50px 40px; border-radius: 20px; color: white;">
                        <h3 class="font-display" style="font-size: 1.5rem; margin-bottom: 24px; color: #fbbf24;">Key Lineage</h3>
                        <div style="display: flex; flex-direction: column; gap: 20px;">
                            <div style="display: flex; align-items: center; gap: 16px; padding: 12px; background: rgba(255,255,255,0.08); border-radius: 12px;">
                                <div style="width: 40px; height: 40px; background: #b91c1c; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0;">1</div>
                                <div><strong>Kanga Sakugawa</strong> — <span style="opacity: 0.7; font-size: 13px;">"Father of Okinawan Karate"</span></div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 16px; padding: 12px; background: rgba(255,255,255,0.08); border-radius: 12px;">
                                <div style="width: 40px; height: 40px; background: #b91c1c; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0;">2</div>
                                <div><strong>Sokon Matsumura</strong> — <span style="opacity: 0.7; font-size: 13px;">Royal bodyguard</span></div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 16px; padding: 12px; background: rgba(255,255,255,0.08); border-radius: 12px;">
                                <div style="width: 40px; height: 40px; background: #b91c1c; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0;">3</div>
                                <div><strong>Anko Itosu</strong> — <span style="opacity: 0.7; font-size: 13px;">School Karate Pioneer</span></div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 16px; padding: 12px; background: rgba(255,255,255,0.08); border-radius: 12px;">
                                <div style="width: 40px; height: 40px; background: #b91c1c; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0;">4</div>
                                <div><strong>Choshin Chibana</strong> — <span style="opacity: 0.7; font-size: 13px;">Named "Shorin-Ryu" in 1933</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Belt System --}}
        <section style="padding: 100px 20px; background: #f8fafc;">
            <div style="max-width: 900px; margin: 0 auto; text-align: center;">
                <h2 class="font-display" style="font-size: 2.5rem; font-weight: 700; color: #0f172a; margin-bottom: 16px;">The Belt Ranking System</h2>
                <p style="color: #64748b; margin-bottom: 50px; font-size: 1.1rem;">Progress in karate is marked by the belt (obi) system, from white belt beginner to black belt mastery.</p>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 16px;">
                    <div class="belt-bar" style="background: white; padding: 24px; border-radius: 12px; border: 2px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
                        <div style="width: 100%; height: 12px; background: white; border: 2px solid #d1d5db; border-radius: 6px; margin-bottom: 12px;"></div>
                        <div style="font-weight: 700; font-size: 14px;">White Belt</div>
                        <div style="color: #94a3b8; font-size: 12px;">Beginner</div>
                    </div>
                    <div class="belt-bar" style="background: white; padding: 24px; border-radius: 12px; border: 2px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
                        <div style="width: 100%; height: 12px; background: #facc15; border-radius: 6px; margin-bottom: 12px;"></div>
                        <div style="font-weight: 700; font-size: 14px;">Yellow Belt</div>
                        <div style="color: #94a3b8; font-size: 12px;">8th-7th Kyu</div>
                    </div>
                    <div class="belt-bar" style="background: white; padding: 24px; border-radius: 12px; border: 2px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
                        <div style="width: 100%; height: 12px; background: #f97316; border-radius: 6px; margin-bottom: 12px;"></div>
                        <div style="font-weight: 700; font-size: 14px;">Orange Belt</div>
                        <div style="color: #94a3b8; font-size: 12px;">6th-5th Kyu</div>
                    </div>
                    <div class="belt-bar" style="background: white; padding: 24px; border-radius: 12px; border: 2px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
                        <div style="width: 100%; height: 12px; background: #16a34a; border-radius: 6px; margin-bottom: 12px;"></div>
                        <div style="font-weight: 700; font-size: 14px;">Green Belt</div>
                        <div style="color: #94a3b8; font-size: 12px;">4th-3rd Kyu</div>
                    </div>
                    <div class="belt-bar" style="background: white; padding: 24px; border-radius: 12px; border: 2px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
                        <div style="width: 100%; height: 12px; background: #2563eb; border-radius: 6px; margin-bottom: 12px;"></div>
                        <div style="font-weight: 700; font-size: 14px;">Blue Belt</div>
                        <div style="color: #94a3b8; font-size: 12px;">2nd Kyu</div>
                    </div>
                    <div class="belt-bar" style="background: white; padding: 24px; border-radius: 12px; border: 2px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
                        <div style="width: 100%; height: 12px; background: #7c3aed; border-radius: 6px; margin-bottom: 12px;"></div>
                        <div style="font-weight: 700; font-size: 14px;">Purple Belt</div>
                        <div style="color: #94a3b8; font-size: 12px;">1st Kyu</div>
                    </div>
                    <div class="belt-bar" style="background: #0f172a; color: white; padding: 24px; border-radius: 12px; grid-column: 1 / -1;">
                        <div style="width: 100%; height: 12px; background: #000; border-radius: 6px; margin-bottom: 12px; border: 1px solid #333;"></div>
                        <div style="font-weight: 700; font-size: 16px;">Black Belt (Dan)</div>
                        <div style="color: #94a3b8; font-size: 13px;">Shodan (1st Dan) and above — The beginning of true mastery</div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- ==========================================
         SECTION 3: INTERVIEWS
         ========================================== -->
    <div id="interviews">
        <section style="padding: 100px 20px; background: white; border-top: 1px solid #e2e8f0;">
            <div style="max-width: 1100px; margin: 0 auto;">
                <span style="color: #B91C1C; font-weight: 700; text-transform: uppercase; letter-spacing: 0.15em; font-size: 13px;">Meet Our Team</span>
                <h2 class="font-display" style="font-size: 2.5rem; font-weight: 700; color: #0f172a; margin: 12px 0 60px;">Instructor Spotlights</h2>

                {{-- Sensei Benard Kihanchu --}}
                <div class="interview-card" style="display: grid; grid-template-columns: 300px 1fr; gap: 40px; align-items: start; background: #f8fafc; border-radius: 20px; overflow: hidden; margin-bottom: 40px; border: 1px solid #e2e8f0;">
                    <div style="background: linear-gradient(135deg, #B91C1C, #EF4444); padding: 40px; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 350px;">
                        <img src="{{ asset('images/jamesinstructor.jpeg') }}" style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06); border: 3px solid rgba(255,255,255,0.3); margin-bottom: 20px;">
                        <h3 style="color: white; font-size: 1.25rem; font-weight: 700; margin: 0; text-align: center;">Sensei Benard Kihanchu</h3>
                        <p style="color: rgba(255,255,255,0.8); font-size: 14px; margin: 4px 0 0; text-align: center;">Head Instructor & Founder</p>
                    </div>
                    <div style="padding: 40px;">
                        <div style="background: #B91C1C; color: white; display: inline-block; padding: 4px 16px; border-radius: 50px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 20px;">Featured Interview</div>
                        <h3 class="font-display" style="font-size: 1.5rem; font-weight: 700; margin: 0 0 16px; color: #0f172a;">"Karate Changed My Life — I Want It to Change Others' Lives Too"</h3>
                        <p style="color: #475569; line-height: 1.8; margin-bottom: 16px;">
                            Sensei Benard Kihanchu's journey in karate spans decades of dedication. Having represented Kenya in international competitions, including the World Karate Championships where the Kenyan team achieved an impressive 9th place finish out of 23 countries, his experience brings world-class knowledge to every Mukusho student.
                        </p>
                        <p style="color: #475569; line-height: 1.8; margin-bottom: 16px;">
                            "I founded Mukusho because I believe every young person in Kenya's central highlands deserves access to quality martial arts training. Karate is not just about fighting — it's about building character, discipline, and confidence. When I see a shy child transform into a confident young person through karate, that's what drives me."
                        </p>
                        <p style="color: #475569; line-height: 1.8;">
                            His vision for Mukusho extends beyond competition. "We want to use karate as a tool for youth empowerment. In communities like Nyeri, Nanyuki, and Murang'a, we're showing young people that with discipline and hard work, they can achieve anything."
                        </p>
                    </div>
                </div>

                {{-- Rev. Fr. Peter Kiongo --}}
                <div class="interview-card" style="display: grid; grid-template-columns: 300px 1fr; gap: 40px; align-items: start; background: #f8fafc; border-radius: 20px; overflow: hidden; border: 1px solid #e2e8f0;">
                    <div style="background: linear-gradient(135deg, #7c3aed, #4f46e5); padding: 40px; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 350px;">
                        <div style="width: 120px; height: 120px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; border: 3px solid rgba(255,255,255,0.3);">
                            <svg style="width: 60px; height: 60px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <h3 style="color: white; font-size: 1.25rem; font-weight: 700; margin: 0; text-align: center;">Rev. Fr. Peter Kiongo</h3>
                        <p style="color: rgba(255,255,255,0.8); font-size: 14px; margin: 4px 0 0; text-align: center;">Spiritual Mentor</p>
                    </div>
                    <div style="padding: 40px;">
                        <div style="background: #7c3aed; color: white; display: inline-block; padding: 4px 16px; border-radius: 50px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 20px;">Spiritual Guidance</div>
                        <h3 class="font-display" style="font-size: 1.5rem; font-weight: 700; margin: 0 0 16px; color: #0f172a;">"Faith and Martial Arts: A Path to Character Development"</h3>
                        <p style="color: #475569; line-height: 1.8; margin-bottom: 16px;">
                            Father Peter Kiongo brings a unique spiritual dimension to Mukusho Karate Kenya. As the organization's spiritual mentor, he helps integrate faith-based values with the traditional martial arts principles of respect, discipline, and humility.
                        </p>
                        <p style="color: #475569; line-height: 1.8;">
                            "The values taught in karate — respect, perseverance, self-control — align perfectly with spiritual teachings. At Mukusho, we're not just training fighters; we're nurturing young people who will become responsible members of their communities. Martial arts, when taught with the right moral foundation, can be a powerful tool for positive change."
                        </p>
                    </div>
                </div>
            </div>
            {{-- TESTIMONIALS (Student Stories) --}}
            <div style="margin-top: 100px; padding-top: 80px; border-top: 1px solid #e2e8f0;">
                <div class="text-center mb-16 reveal">
                    <div class="inline-flex items-center bg-amber-50 text-amber-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">What People Say</div>
                    <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 uppercase">Student <span class="text-red-700">Stories</span></h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($sections['testimonials'] as $testimonial)
                    <div class="bg-slate-50 rounded-2xl p-8 border border-slate-100 reveal">
                        <div class="flex gap-1 text-amber-400 mb-4">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="text-slate-600 leading-relaxed mb-6 italic">"{{ $testimonial->content }}"</p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-{{ $testimonial->extra('color', 'red') }}-100 rounded-full flex items-center justify-center font-display font-bold text-{{ $testimonial->extra('color', 'red') }}-700">{{ $testimonial->extra('initial', mb_substr($testimonial->title, 0, 1)) }}</div>
                            <div><div class="font-bold text-slate-900 text-sm">{{ $testimonial->title }}</div><div class="text-xs text-slate-500">{{ $testimonial->subtitle }}</div></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    {{-- CTA --}}
    <section style="padding: 80px 20px; background: linear-gradient(135deg, #B91C1C, #EF4444); text-align: center; color: white;">
        <div style="max-width: 700px; margin: 0 auto;">
            <h2 class="font-display" style="font-size: 2.5rem; font-weight: 700; margin-bottom: 16px;">Ready to Start Your Journey?</h2>
            <p style="font-size: 1.1rem; opacity: 0.9; margin-bottom: 32px;">Join our community and discover the transformative power of traditional karate.</p>
            <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('register.create') }}" style="background: #fbbf24; color: #0f172a; padding: 16px 40px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 15px; text-transform: uppercase; letter-spacing: 0.05em; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform=''">Join Now</a>
                <a href="{{ route('contact') }}" style="background: transparent; color: white; padding: 16px 40px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 15px; text-transform: uppercase; letter-spacing: 0.05em; border: 2px solid white; transition: all 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.1)'" onmouseout="this.style.background='transparent'">Contact Us</a>
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>
