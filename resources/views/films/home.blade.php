<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mukusho Films — Kenyan Drama &amp; Film Production | Nyeri, Kenya</title>
    <meta name="description" content="Mukusho Films — Home of the MAPESA series, KISASI, Pazia la Siri and more. Kenyan movie and drama production based in Nyeri. Watch on UTV Kenya every Friday.">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --purple: #7C3AED;
            --purple-light: #8b5cf6;
            --gold: #F59E0B;
            --dark: #0d0d1a;
            --dark2: #13131f;
            --card-bg: #1a1a2e;
        }
        body { font-family: 'Inter', sans-serif; background: var(--dark); color: white; overflow-x: hidden; }
        h1,h2,h3,h4,h5,.font-display { font-family: 'Oswald', sans-serif; }

        /* ── SWITCHER BAR ── */
        .switcher-bar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            background: rgba(13,13,26,0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(124,58,237,0.3);
            padding: 10px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }
        .switcher-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        .switcher-brand img {
            width: 40px; height: 40px;
            border-radius: 50%;
            border: 2px solid rgba(139,92,246,0.5);
            object-fit: cover;
        }
        .switcher-brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }
        .switcher-brand-text .main {
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
            font-size: 18px;
            color: white;
            letter-spacing: 0.05em;
        }
        .switcher-brand-text .sub {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #a78bfa;
        }

        /* Nav links */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 24px;
        }
        .nav-links a {
            font-weight: 600;
            font-size: 13px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.2s;
        }
        .nav-links a:hover { color: #a78bfa; }

        /* Switch button */
        .switch-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 9px 20px;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            border: 2px solid #ef4444;
            background: rgba(185,28,28,0.2);
            transition: all 0.3s ease;
            white-space: nowrap;
        }
        .switch-btn:hover {
            background: #B91C1C;
            box-shadow: 0 0 20px rgba(239,68,68,0.3);
            transform: translateY(-1px);
        }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding-top: 72px;
        }
        .hero-bg-1 {
            position: absolute; inset: 0;
            background: radial-gradient(ellipse at 20% 50%, rgba(124,58,237,0.3) 0%, transparent 60%),
                        radial-gradient(ellipse at 80% 20%, rgba(245,158,11,0.15) 0%, transparent 50%),
                        radial-gradient(ellipse at 50% 90%, rgba(124,58,237,0.15) 0%, transparent 50%);
        }
        .hero-film-strip {
            position: absolute; inset: 0;
            opacity: 0.04;
            background-image: repeating-linear-gradient(0deg, transparent, transparent 70px, #fff 70px, #fff 74px),
                              repeating-linear-gradient(90deg, transparent, transparent 12px, #fff 12px, #fff 16px);
            animation: filmscroll 10s linear infinite;
        }
        @keyframes filmscroll { from { background-position: 0 0; } to { background-position: 0 148px; } }

        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            max-width: 900px;
            padding: 0 24px;
        }
        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 20px;
            border-radius: 100px;
            background: rgba(124,58,237,0.2);
            border: 1px solid rgba(124,58,237,0.4);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #a78bfa;
            margin-bottom: 28px;
        }
        .hero-tag .dot { width: 6px; height: 6px; border-radius: 50%; background: #a78bfa; animation: pulse 2s infinite; }
        @keyframes pulse { 0%,100% { opacity: 1; } 50% { opacity: 0.3; } }

        .hero-title {
            font-size: clamp(3rem, 8vw, 7rem);
            font-weight: 900;
            letter-spacing: -0.01em;
            line-height: 0.9;
            text-transform: uppercase;
            margin-bottom: 24px;
            color: white;
        }
        .hero-title .line-films { color: #a78bfa; }

        .hero-subtitle {
            font-size: 18px;
            color: rgba(255,255,255,0.65);
            max-width: 600px;
            margin: 0 auto 36px;
            line-height: 1.7;
        }

        .hero-btns {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 16px;
            margin-bottom: 48px;
        }
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 16px 36px;
            border-radius: 8px;
            background: linear-gradient(135deg, #7C3AED, #6d28d9);
            color: white;
            text-decoration: none;
            border: 2px solid #8b5cf6;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #6d28d9, #5b21b6);
            box-shadow: 0 0 30px rgba(124,58,237,0.4);
            transform: translateY(-2px);
        }
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 14px 34px;
            border-radius: 8px;
            background: transparent;
            color: white;
            text-decoration: none;
            border: 2px solid rgba(255,255,255,0.3);
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            border-color: #a78bfa;
            background: rgba(124,58,237,0.1);
            transform: translateY(-2px);
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 48px;
            flex-wrap: wrap;
        }
        .h-stat { text-align: center; }
        .h-stat-num {
            font-family: 'Oswald', sans-serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: #a78bfa;
        }
        .h-stat-lbl {
            font-size: 11px;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.4);
            margin-top: 4px;
        }

        /* ── SECTION STYLES ── */
        section { padding: 96px 24px; }
        .container { max-width: 1200px; margin: 0 auto; }

        .section-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: #a78bfa;
            margin-bottom: 16px;
        }
        .section-tag::before { content: ''; width: 24px; height: 2px; background: #a78bfa; }
        .section-title {
            font-size: clamp(2rem, 4vw, 3.5rem);
            font-weight: 800;
            text-transform: uppercase;
            color: white;
            margin-bottom: 16px;
        }
        .section-title .accent { color: #a78bfa; }
        .section-title .gold { color: var(--gold); }
        .section-desc {
            font-size: 16px;
            color: rgba(255,255,255,0.55);
            max-width: 600px;
            line-height: 1.7;
        }

        /* ── SERIES CARDS ── */
        .series-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
            margin-top: 48px;
        }
        .series-card {
            background: var(--card-bg);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(124,58,237,0.2);
            transition: all 0.4s ease;
            display: flex;
            flex-direction: column;
        }
        .series-card:hover {
            transform: translateY(-8px);
            border-color: rgba(139,92,246,0.5);
            box-shadow: 0 20px 60px rgba(124,58,237,0.2);
        }
        .series-thumb {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .series-thumb .thumb-emoji { font-size: 64px; z-index: 2; position: relative; }
        .series-thumb .thumb-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to bottom, transparent 40%, var(--card-bg));
        }
        .series-badge {
            position: absolute;
            top: 12px; left: 12px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            padding: 5px 12px;
            border-radius: 100px;
            z-index: 3;
        }
        .badge-utv { background: rgba(245,158,11,0.9); color: #0d0d1a; }
        .badge-youtube { background: rgba(239,68,68,0.9); color: white; }
        .badge-new { background: rgba(124,58,237,0.9); color: white; }

        .series-body { padding: 24px; flex: 1; display: flex; flex-direction: column; }
        .series-title {
            font-size: 1.4rem;
            font-weight: 800;
            text-transform: uppercase;
            color: white;
            margin-bottom: 8px;
        }
        .series-meta {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #a78bfa;
            margin-bottom: 12px;
        }
        .series-desc {
            font-size: 14px;
            color: rgba(255,255,255,0.55);
            line-height: 1.7;
            flex: 1;
            margin-bottom: 20px;
        }
        .series-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #a78bfa;
            text-decoration: none;
            transition: color 0.2s, gap 0.2s;
        }
        .series-link:hover { color: white; gap: 12px; }

        /* ── KARATE MARTIAL ARTS FILMS BOX ── */
        .martial-box {
            background: linear-gradient(135deg, rgba(124,58,237,0.15), rgba(245,158,11,0.1));
            border: 1px solid rgba(124,58,237,0.3);
            border-radius: 24px;
            padding: 48px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 48px;
            align-items: center;
            margin-top: 48px;
        }
        @media (max-width: 768px) { .martial-box { grid-template-columns: 1fr; gap: 32px; }}

        .martial-icon-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        .martial-icon-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
        }
        .martial-icon-card:hover {
            background: rgba(124,58,237,0.15);
            border-color: rgba(124,58,237,0.4);
            transform: translateY(-4px);
        }
        .martial-icon-card .icon { font-size: 36px; margin-bottom: 8px; }
        .martial-icon-card .label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.6);
        }

        /* ── CONTACT / CHANNELS ── */
        .channels-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 16px;
            margin-top: 40px;
        }
        .channel-card {
            background: var(--card-bg);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .channel-card:hover {
            transform: translateY(-4px);
            border-color: rgba(124,58,237,0.4);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        .channel-icon {
            width: 48px; height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }
        .channel-name {
            font-family: 'Oswald', sans-serif;
            font-size: 15px;
            font-weight: 700;
            color: white;
            text-transform: uppercase;
        }
        .channel-handle {
            font-size: 12px;
            color: rgba(255,255,255,0.4);
            margin-top: 2px;
        }

        /* ── FOOTER ── */
        footer {
            background: #08080f;
            border-top: 1px solid rgba(124,58,237,0.2);
            padding: 48px 24px;
            text-align: center;
        }
        footer .footer-brand {
            font-family: 'Oswald', sans-serif;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0.1em;
            color: white;
            margin-bottom: 8px;
        }
        footer .footer-sub {
            font-size: 12px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.35);
            margin-bottom: 24px;
        }
        footer .footer-links {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 24px;
            margin-bottom: 32px;
        }
        footer .footer-links a {
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.4);
            text-decoration: none;
            transition: color 0.2s;
        }
        footer .footer-links a:hover { color: #a78bfa; }
        footer .footer-copy {
            font-size: 11px;
            color: rgba(255,255,255,0.2);
        }

        @media (max-width: 768px) {
            .switcher-bar { padding: 10px 16px; }
            .nav-links { display: none; }
            section { padding: 64px 16px; }
            .hero-stats { gap: 24px; }
        }
    </style>
</head>
<body>

{{-- ── SWITCHER BAR (NAVBAR) ── --}}
<header class="switcher-bar">
    <a href="{{ route('films.home') }}" class="switcher-brand">
        <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="Mukusho Films">
        <div class="switcher-brand-text">
            <span class="main">MUKUSHO</span>
            <span class="sub">Films</span>
        </div>
    </a>

    <nav class="nav-links">
        <a href="#series">Our Series</a>
        <a href="#martial-films">Martial Films</a>
        <a href="#channels">Watch Online</a>
        <a href="#contact">Contact</a>
    </nav>

    <a href="{{ route('karate.home') }}" class="switch-btn">
        🥋 Switch to Karate Kenya
    </a>
</header>

{{-- ── HERO ── --}}
<section class="hero">
    <div class="hero-bg-1"></div>
    <div class="hero-film-strip"></div>

    <div class="hero-content">
        <div class="hero-tag">
            <div class="dot"></div>
            Now Streaming on UTV Kenya · Every Friday 7:30 PM
        </div>

        <h1 class="hero-title">
            MUKUSHO<br>
            <span class="line-films">FILMS</span>
        </h1>

        <p class="hero-subtitle">
            Kenyan drama, political thrillers, family stories &amp; martial arts content — crafted in the heart of Nyeri, Kenya. Telling authentic African stories that resonate.
        </p>

        <div class="hero-btns">
            <a href="https://www.youtube.com/@mukushofilms3728" target="_blank" rel="noopener" class="btn-primary">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                Watch on YouTube
            </a>
            <a href="#series" class="btn-secondary">
                Explore Series
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </a>
        </div>

        <div class="hero-stats">
            <div class="h-stat">
                <div class="h-stat-num">375+</div>
                <div class="h-stat-lbl">Videos</div>
            </div>
            <div class="h-stat">
                <div class="h-stat-num">2.6K</div>
                <div class="h-stat-lbl">Subscribers</div>
            </div>
            <div class="h-stat">
                <div class="h-stat-num">178K</div>
                <div class="h-stat-lbl">Total Views</div>
            </div>
            <div class="h-stat">
                <div class="h-stat-num">2018</div>
                <div class="h-stat-lbl">Est.</div>
            </div>
        </div>
    </div>
</section>

{{-- ── SERIES SECTION ── --}}
<section id="series" style="background: var(--dark2);">
    <div class="container">
        <div class="section-tag">Our Productions</div>
        <h2 class="section-title">Featured <span class="accent">Series</span></h2>
        <p class="section-desc">Compelling Kenyan drama series that tackle real societal issues — from political betrayal to family loyalty — in authentic Swahili storytelling.</p>

        <div class="series-grid">

            {{-- MAPESA --}}
            <div class="series-card">
                <div class="series-thumb" style="background: linear-gradient(135deg, #1a0533, #2d1b69, #1a3a4f);">
                    <div class="thumb-emoji">🏛️</div>
                    <div class="thumb-overlay"></div>
                    <div class="series-badge badge-utv">📺 UTV Kenya</div>
                </div>
                <div class="series-body">
                    <div class="series-title">The MAPESA Series</div>
                    <div class="series-meta">Political Drama · 4+ Seasons · 2021–Present</div>
                    <p class="series-desc">
                        A gripping Kenyan political thriller following Mapesa — a gubernatorial aspirant who runs a shadow network of drug trafficking and money laundering across East Africa. A story of power, betrayal, and consequences. Airs on <strong style="color:#F59E0B;">UTV every Friday at 7:30 PM</strong>.
                    </p>
                    <div style="margin-bottom: 16px; display: flex; flex-wrap: wrap; gap: 8px;">
                        <span style="font-size:11px;padding:4px 10px;border-radius:100px;background:rgba(245,158,11,0.15);color:#F59E0B;border:1px solid rgba(245,158,11,0.3);">Politics</span>
                        <span style="font-size:11px;padding:4px 10px;border-radius:100px;background:rgba(239,68,68,0.15);color:#ef4444;border:1px solid rgba(239,68,68,0.3);">Crime</span>
                        <span style="font-size:11px;padding:4px 10px;border-radius:100px;background:rgba(124,58,237,0.15);color:#a78bfa;border:1px solid rgba(124,58,237,0.3);">Family Drama</span>
                    </div>
                    <a href="https://www.youtube.com/@mukushofilms3728" target="_blank" class="series-link">
                        Watch Episodes
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- KISASI --}}
            <div class="series-card">
                <div class="series-thumb" style="background: linear-gradient(135deg, #1a0d0d, #3b1414, #1a1a0d);">
                    <div class="thumb-emoji">⚔️</div>
                    <div class="thumb-overlay"></div>
                    <div class="series-badge badge-youtube">▶ YouTube</div>
                </div>
                <div class="series-body">
                    <div class="series-title">KISASI</div>
                    <div class="series-meta">Revenge Drama · 2 Seasons · 40+ Episodes</div>
                    <p class="series-desc">
                        <em>"When Blood Turns Against Blood."</em> A powerful Swahili drama centered on betrayal within a family. Kinyau — the traitorous leader — will stop at nothing for power, setting off a devastating storm of vengeance between Kinanaga and Njambi. Forgiveness is a weakness. Payback is survival.
                    </p>
                    <div style="margin-bottom: 16px; display: flex; flex-wrap: wrap; gap: 8px;">
                        <span style="font-size:11px;padding:4px 10px;border-radius:100px;background:rgba(239,68,68,0.15);color:#ef4444;border:1px solid rgba(239,68,68,0.3);">Revenge</span>
                        <span style="font-size:11px;padding:4px 10px;border-radius:100px;background:rgba(148,163,184,0.15);color:#94a3b8;border:1px solid rgba(148,163,184,0.3);">Family</span>
                        <span style="font-size:11px;padding:4px 10px;border-radius:100px;background:rgba(124,58,237,0.15);color:#a78bfa;border:1px solid rgba(124,58,237,0.3);">Betrayal</span>
                    </div>
                    <a href="https://www.youtube.com/@mukushofilms3728" target="_blank" class="series-link">
                        Watch Episodes
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- PAZIA LA SIRI --}}
            <div class="series-card">
                <div class="series-thumb" style="background: linear-gradient(135deg, #0a1a2e, #1a2d1a, #2e1a2d);">
                    <div class="thumb-emoji">🤫</div>
                    <div class="thumb-overlay"></div>
                    <div class="series-badge badge-utv">📺 UTV · Sat 8 PM</div>
                </div>
                <div class="series-body">
                    <div class="series-title">Pazia la Siri</div>
                    <div class="series-meta">Political Thriller · Swahili Series · UTV Saturdays 8 PM</div>
                    <p class="series-desc">
                        A Swahili drama exploring political corruption and moral dilemmas. Governor Richard Kazungu is pressured by powerful brokers who funded his campaign, while Antonio Kapombe illegally amasses wealth at the cost of many victims. Secrets, loyalty and power collide. Also available at <strong style="color:#a78bfa;">www.utv.ke</strong>.
                    </p>
                    <div style="margin-bottom: 16px; display: flex; flex-wrap: wrap; gap: 8px;">
                        <span style="font-size:11px;padding:4px 10px;border-radius:100px;background:rgba(245,158,11,0.15);color:#F59E0B;border:1px solid rgba(245,158,11,0.3);">Politics</span>
                        <span style="font-size:11px;padding:4px 10px;border-radius:100px;background:rgba(20,83,45,0.3);color:#86efac;border:1px solid rgba(134,239,172,0.3);">Swahili</span>
                        <span style="font-size:11px;padding:4px 10px;border-radius:100px;background:rgba(124,58,237,0.15);color:#a78bfa;border:1px solid rgba(124,58,237,0.3);">Corruption</span>
                    </div>
                    <a href="https://www.youtube.com/@mukushofilms3728" target="_blank" class="series-link">
                        Watch Episodes
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- Other films --}}
            <div class="series-card">
                <div class="series-thumb" style="background: linear-gradient(135deg, #1a1a0a, #2d2d1a, #1a2d2d);">
                    <div class="thumb-emoji">🎭</div>
                    <div class="thumb-overlay"></div>
                    <div class="series-badge badge-new">🎬 More Films</div>
                </div>
                <div class="series-body">
                    <div class="series-title">More Productions</div>
                    <div class="series-meta">Short Films · Comedies · Movies</div>
                    <p class="series-desc">
                        Mukusho Films has produced 375+ videos since 2018, including: <strong style="color:white;">Mwana wa Kairitu</strong> (full movie), <strong style="color:white;">Tears of the Deaf</strong>, <strong style="color:white;">Excuses</strong> (short film), <strong style="color:white;">Too Selfish to be a Parent</strong>, and a growing library of Kenyan comedies and dramas in both Swahili and English.
                    </p>
                    <div style="margin-bottom: 16px; display: flex; flex-wrap: wrap; gap: 8px;">
                        <span style="font-size:11px;padding:4px 10px;border-radius:100px;background:rgba(20,83,45,0.3);color:#86efac;border:1px solid rgba(134,239,172,0.3);">Movies</span>
                        <span style="font-size:11px;padding:4px 10px;border-radius:100px;background:rgba(245,158,11,0.15);color:#F59E0B;border:1px solid rgba(245,158,11,0.3);">Comedies</span>
                        <span style="font-size:11px;padding:4px 10px;border-radius:100px;background:rgba(124,58,237,0.15);color:#a78bfa;border:1px solid rgba(124,58,237,0.3);">Short Films</span>
                    </div>
                    <a href="https://www.youtube.com/@mukushofilms3728" target="_blank" class="series-link">
                        Browse All
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ── MARTIAL ARTS FILMS ── --}}
<section id="martial-films" style="background: var(--dark);">
    <div class="container">
        <div class="section-tag">Unique to Mukusho</div>
        <h2 class="section-title">Karate Meets <span class="gold">Cinema</span></h2>
        <p class="section-desc">What makes Mukusho Films unique: we are a martial arts club that films. Our self-defence content fuses authentic Shorin-Ryu karate with engaging storytelling — a truly unique combination in Kenyan film.</p>

        <div class="martial-box">
            <div>
                <div style="font-size:13px;font-weight:700;letter-spacing:0.2em;text-transform:uppercase;color:#a78bfa;margin-bottom:16px;">About Mukusho Films</div>
                <p style="font-size:16px;color:rgba(255,255,255,0.7);line-height:1.8;margin-bottom:20px;">
                    <strong style="color:white;">"Mukusho Martials is a group of martial arts practitioners based in Nyeri, Kenya. We train karate alongside filming."</strong>
                </p>
                <p style="font-size:15px;color:rgba(255,255,255,0.55);line-height:1.8;margin-bottom:24px;">
                    Founded in 2018 and based in Nyeri Central, Kenya, Mukusho Films produces everything from high-drama television series to martial arts application clips — teaching real Okinawan karate techniques through engaging video content.
                </p>
                <div style="display:flex;flex-wrap:wrap;gap:12px;">
                    <div style="background:rgba(124,58,237,0.15);border:1px solid rgba(124,58,237,0.3);border-radius:12px;padding:12px 20px;">
                        <div style="font-family:'Oswald',sans-serif;font-size:24px;font-weight:700;color:white;">38+</div>
                        <div style="font-size:11px;letter-spacing:0.1em;text-transform:uppercase;color:rgba(255,255,255,0.4);">Self-Defence Videos</div>
                    </div>
                    <div style="background:rgba(245,158,11,0.1);border:1px solid rgba(245,158,11,0.3);border-radius:12px;padding:12px 20px;">
                        <div style="font-family:'Oswald',sans-serif;font-size:24px;font-weight:700;color:white;">132+</div>
                        <div style="font-size:11px;letter-spacing:0.1em;text-transform:uppercase;color:rgba(255,255,255,0.4);">Movies & Dramas</div>
                    </div>
                </div>
            </div>
            <div class="martial-icon-grid">
                <div class="martial-icon-card">
                    <div class="icon">🥋</div>
                    <div class="label">Kata Applications</div>
                </div>
                <div class="martial-icon-card">
                    <div class="icon">🎬</div>
                    <div class="label">Film Production</div>
                </div>
                <div class="martial-icon-card">
                    <div class="icon">🛡️</div>
                    <div class="label">Self-Defence Clips</div>
                </div>
                <div class="martial-icon-card">
                    <div class="icon">📺</div>
                    <div class="label">UTV Broadcast</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── CHANNELS / WATCH ONLINE ── --}}
<section id="channels" style="background: var(--dark2);">
    <div class="container">
        <div class="section-tag">Find Us Online</div>
        <h2 class="section-title">Watch &amp; Follow <span class="accent">Mukusho Films</span></h2>
        <p class="section-desc">Find all our content across YouTube, Facebook and UTV Kenya. Episodes of MAPESA, KISASI, Pazia la Siri and self-defence tutorials are available online.</p>

        <div class="channels-grid">
            <a href="https://www.youtube.com/@mukushofilms3728" target="_blank" rel="noopener" class="channel-card">
                <div class="channel-icon" style="background:rgba(239,68,68,0.2);">▶️</div>
                <div>
                    <div class="channel-name">YouTube</div>
                    <div class="channel-handle">@mukushofilms3728 · 2.63K subs</div>
                </div>
            </a>
            <a href="https://www.facebook.com/mukushomartials/" target="_blank" rel="noopener" class="channel-card">
                <div class="channel-icon" style="background:rgba(29,78,216,0.2);">📘</div>
                <div>
                    <div class="channel-name">Facebook</div>
                    <div class="channel-handle">@mukushomartials · 8.1K likes</div>
                </div>
            </a>
            <a href="https://www.utv.ke" target="_blank" rel="noopener" class="channel-card">
                <div class="channel-icon" style="background:rgba(245,158,11,0.2);">📺</div>
                <div>
                    <div class="channel-name">UTV Kenya</div>
                    <div class="channel-handle">MAPESA · Fri 7:30 PM · Sat 8 PM</div>
                </div>
            </a>
            <a href="mailto:mukushofilms@gmail.com" class="channel-card">
                <div class="channel-icon" style="background:rgba(124,58,237,0.2);">✉️</div>
                <div>
                    <div class="channel-name">Email Us</div>
                    <div class="channel-handle">mukushofilms@gmail.com</div>
                </div>
            </a>
        </div>
    </div>
</section>

{{-- ── FOOTER ── --}}
<footer id="contact">
    <div class="footer-brand">MUKUSHO FILMS</div>
    <div class="footer-sub">Nyeri, Kenya · Est. 2018 · "We train karate alongside filming"</div>
    <div class="footer-links">
        <a href="#series">Series</a>
        <a href="#martial-films">Martial Films</a>
        <a href="#channels">Watch Online</a>
        <a href="{{ route('karate.home') }}">Mukusho Karate Kenya</a>
        <a href="{{ route('portal') }}">← Back to Portal</a>
    </div>
    <div class="footer-copy">© 2026 Mukusho Films Kenya. All rights reserved.</div>
</footer>

</body>
</html>
