<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mukusho Kenya — Karate &amp; Films</title>
    <meta name="description" content="Welcome to Mukusho Kenya. Choose your destination: Mukusho Karate Kenya for world-class martial arts training, or Mukusho Films for Kenyan cinema and drama.">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --karate-red: #B91C1C;
            --karate-dark: #0a0a0a;
            --karate-gold: #F59E0B;
            --film-dark: #0d0d1a;
            --film-purple: #7C3AED;
            --film-gold: #F59E0B;
        }

        body {
            font-family: 'Inter', sans-serif;
            overflow: hidden;
            height: 100vh;
            background: #0a0a0a;
        }

        h1, h2, h3, .font-display { font-family: 'Oswald', sans-serif; }

        .portal-wrapper {
            display: flex;
            height: 100vh;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        /* ── LEFT: Karate ─────────────────────────────────── */
        .side-karate {
            position: relative;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            cursor: pointer;
            overflow: hidden;
            transition: flex 0.6s cubic-bezier(0.77, 0, 0.175, 1);
            text-decoration: none;
        }

        .side-films {
            position: relative;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            cursor: pointer;
            overflow: hidden;
            transition: flex 0.6s cubic-bezier(0.77, 0, 0.175, 1);
            text-decoration: none;
        }

        .portal-wrapper:has(.side-karate:hover) .side-karate { flex: 1.6; }
        .portal-wrapper:has(.side-karate:hover) .side-films { flex: 0.4; }
        .portal-wrapper:has(.side-films:hover) .side-films { flex: 1.6; }
        .portal-wrapper:has(.side-films:hover) .side-karate { flex: 0.4; }

        .side-karate .bg-layer {
            position: absolute;
            inset: 0;
            background: url('{{ asset("images/Dojo.jpeg") }}') center/cover no-repeat;
            filter: brightness(0.35) saturate(0.8);
            transition: filter 0.5s ease, transform 0.6s ease;
            z-index: 0;
        }
        .side-karate:hover .bg-layer {
            filter: brightness(0.5) saturate(1.1);
            transform: scale(1.04);
        }

        .side-films .bg-layer {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #0d0d1a 0%, #1a0533 40%, #0d1a2d 100%);
            z-index: 0;
        }
        .film-reel-bg {
            position: absolute;
            inset: 0;
            z-index: 1;
            background: radial-gradient(ellipse at 30% 40%, rgba(124,58,237,0.25) 0%, transparent 60%),
                        radial-gradient(ellipse at 70% 70%, rgba(245,158,11,0.15) 0%, transparent 60%);
        }

        /* Moving film strip pattern */
        .film-strip-anim {
            position: absolute;
            inset: 0;
            z-index: 2;
            opacity: 0.06;
            background-image: repeating-linear-gradient(
                0deg,
                transparent,
                transparent 60px,
                #fff 60px,
                #fff 64px
            ),
            repeating-linear-gradient(
                90deg,
                transparent,
                transparent 10px,
                #fff 10px,
                #fff 14px
            );
            animation: filmscroll 8s linear infinite;
        }
        @keyframes filmscroll {
            from { background-position: 0 0; }
            to { background-position: 0 128px; }
        }

        /* Vertical divider */
        .divider {
            position: absolute;
            left: 50%;
            top: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(to bottom, transparent, rgba(255,255,255,0.5), transparent);
            z-index: 20;
            pointer-events: none;
            transition: left 0.6s cubic-bezier(0.77, 0, 0.175, 1);
        }

        /* Content */
        .side-content {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
            gap: 24px;
            transition: transform 0.4s ease, opacity 0.4s ease;
        }

        .side-logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid rgba(255,255,255,0.3);
            object-fit: cover;
            box-shadow: 0 0 40px rgba(0,0,0,0.5);
            transition: transform 0.4s ease, border-color 0.4s ease;
        }
        .side-karate:hover .side-logo { transform: scale(1.08); border-color: var(--karate-gold); }
        .side-films:hover .side-logo { transform: scale(1.08); border-color: var(--film-purple); }

        .side-label-tag {
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            padding: 6px 16px;
            border-radius: 100px;
            color: white;
        }
        .side-karate .side-label-tag { background: rgba(185,28,28,0.6); border: 1px solid #ef4444; }
        .side-films .side-label-tag { background: rgba(124,58,237,0.6); border: 1px solid #8b5cf6; }

        .side-title {
            font-family: 'Oswald', sans-serif;
            font-weight: 800;
            font-size: clamp(2rem, 4vw, 4rem);
            color: white;
            letter-spacing: 0.04em;
            line-height: 1;
            text-transform: uppercase;
            text-shadow: 0 4px 20px rgba(0,0,0,0.8);
        }
        .side-title .accent-karate { color: var(--karate-gold); }
        .side-title .accent-film { color: #a78bfa; }

        .side-desc {
            font-size: 14px;
            color: rgba(255,255,255,0.7);
            max-width: 320px;
            line-height: 1.7;
            text-align: center;
        }

        .side-pills {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
        }
        .pill {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 5px 12px;
            border-radius: 100px;
            color: rgba(255,255,255,0.9);
            border: 1px solid rgba(255,255,255,0.15);
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(4px);
        }

        .enter-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            padding: 14px 32px;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            margin-top: 8px;
        }
        .side-karate .enter-btn {
            background: #B91C1C;
            border-color: #ef4444;
        }
        .side-karate .enter-btn:hover {
            background: #dc2626;
            box-shadow: 0 0 30px rgba(239,68,68,0.4);
            transform: translateY(-2px);
        }
        .side-films .enter-btn {
            background: #7C3AED;
            border-color: #8b5cf6;
        }
        .side-films .enter-btn:hover {
            background: #6d28d9;
            box-shadow: 0 0 30px rgba(139,92,246,0.4);
            transform: translateY(-2px);
        }

        .enter-btn svg {
            transition: transform 0.3s ease;
        }
        .enter-btn:hover svg { transform: translateX(4px); }

        /* Stats row */
        .stat-row {
            display: flex;
            gap: 24px;
            margin-top: 4px;
        }
        .stat-item {
            text-align: center;
        }
        .stat-number {
            font-family: 'Oswald', sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: white;
        }
        .side-karate .stat-number { color: var(--karate-gold); }
        .side-films .stat-number { color: #a78bfa; }
        .stat-label {
            font-size: 10px;
            color: rgba(255,255,255,0.5);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        /* Film-specific icons */
        .film-icons {
            display: flex;
            gap: 16px;
            font-size: 28px;
        }

        /* Central "OR" badge floating over the divider */
        .or-badge {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 30;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: rgba(20,20,30,0.95);
            border: 2px solid rgba(255,255,255,0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Oswald', sans-serif;
            font-size: 14px;
            font-weight: 700;
            color: rgba(255,255,255,0.7);
            letter-spacing: 0.1em;
            box-shadow: 0 0 30px rgba(0,0,0,0.5);
            pointer-events: none;
        }

        /* Mobile layout */
        @media (max-width: 768px) {
            body { overflow: auto; }
            .portal-wrapper { flex-direction: column; height: auto; min-height: 100vh; }
            .side-karate, .side-films { flex: none !important; min-height: 50vh; }
            .divider { display: none; }
            .or-badge { display: none; }
            .side-content { padding: 50px 24px; }
            .side-title { font-size: clamp(1.8rem, 8vw, 2.8rem); }
        }

        /* Floating kanji decoration */
        .kanji-float {
            position: absolute;
            font-family: serif;
            font-size: 200px;
            color: white;
            opacity: 0.03;
            line-height: 1;
            user-select: none;
            pointer-events: none;
            z-index: 3;
        }

        /* Scroll indicator on mobile */
        .scroll-hint {
            display: none;
            position: absolute;
            bottom: 16px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            color: rgba(255,255,255,0.4);
            font-size: 11px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            animation: bounce 2s infinite;
        }
        @media (max-width: 768px) { .scroll-hint { display: block; } }
        @keyframes bounce {
            0%, 100% { transform: translateX(-50%) translateY(0); }
            50% { transform: translateX(-50%) translateY(-6px); }
        }

        /* Top brand bar */
        .top-brand {
            position: absolute;
            top: 0; left: 0; right: 0;
            z-index: 25;
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            background: linear-gradient(to bottom, rgba(0,0,0,0.6), transparent);
            pointer-events: none;
        }
        .top-brand img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.3);
            object-fit: cover;
        }
        .top-brand span {
            font-family: 'Oswald', sans-serif;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.6);
        }
    </style>
</head>
<body>

<div class="portal-wrapper">

    <!-- Top brand bar -->
    <div class="top-brand">
        <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="Mukusho logo">
        <span>Mukusho Kenya</span>
    </div>

    {{-- ── LEFT: KARATE ────────────────────────── --}}
    <a href="{{ route('karate.home') }}" class="side-karate" id="portal-karate">
        <!-- Background -->
        <div class="bg-layer"></div>
        <!-- Gradient overlay -->
        <div style="position:absolute;inset:0;z-index:1;background:linear-gradient(135deg,rgba(185,28,28,0.3) 0%,rgba(0,0,0,0.5) 100%);"></div>
        <!-- Kanji decoration -->
        <div class="kanji-float" style="bottom:-40px;right:-20px;">空手</div>

        <!-- Content -->
        <div class="side-content">
            <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="Mukusho Karate Kenya" class="side-logo">
            <div class="side-label-tag">Martial Arts</div>
            <div class="side-title">
                MUKUSHO<br>
                <span class="accent-karate">KARATE</span> KENYA
            </div>
            <p class="side-desc">Sport karate, self-defence &amp; youth empowerment. Training in Nyeri, Nanyuki, Murang'a &amp; Othaya. All ages welcome.</p>
            <div class="side-pills">
                <span class="pill">🥋 Shorin-Ryu</span>
                <span class="pill">🏆 National Champions</span>
                <span class="pill">👦🏾 Kids & Adults</span>
            </div>
            <div class="stat-row">
                <div class="stat-item">
                    <div class="stat-number">20+</div>
                    <div class="stat-label">Clubs</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10+</div>
                    <div class="stat-label">Years</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Athletes</div>
                </div>
            </div>
            <div class="enter-btn">
                Enter Dojo
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </div>
        </div>
        <div class="scroll-hint">↓ Scroll down</div>
    </a>

    {{-- ── DIVIDER ─────────────────────────────── --}}
    <div class="divider"></div>
    <div class="or-badge">OR</div>

    {{-- ── RIGHT: FILMS ────────────────────────── --}}
    <a href="{{ route('films.home') }}" class="side-films" id="portal-films">
        <!-- BG Layers -->
        <div class="bg-layer"></div>
        <div class="film-reel-bg"></div>
        <div class="film-strip-anim"></div>
        <!-- Content overlay -->
        <div style="position:absolute;inset:0;z-index:3;background:linear-gradient(135deg,rgba(124,58,237,0.15) 0%,rgba(0,0,0,0.4) 100%);"></div>

        <!-- Content -->
        <div class="side-content" style="z-index:10;">
            <div style="width:100px;height:100px;border-radius:50%;border:3px solid rgba(139,92,246,0.5);background:rgba(124,58,237,0.2);display:flex;align-items:center;justify-content:center;font-size:48px;transition:transform 0.4s ease, border-color 0.4s ease;" class="film-logo-icon">🎬</div>
            <div class="side-label-tag">Film Production</div>
            <div class="side-title">
                MUKUSHO<br>
                <span class="accent-film">FILMS</span>
            </div>
            <p class="side-desc">Kenyan drama series, short films &amp; self-defence content. Home of the MAPESA series, KISASI, Pazia la Siri &amp; more — airing on UTV.</p>
            <div class="side-pills">
                <span class="pill">🎭 MAPESA Series</span>
                <span class="pill">📺 UTV Kenya</span>
                <span class="pill">🎬 375+ Videos</span>
            </div>
            <div class="stat-row">
                <div class="stat-item">
                    <div class="stat-number">4+</div>
                    <div class="stat-label">Seasons</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">2.6K</div>
                    <div class="stat-label">Subscribers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">178K</div>
                    <div class="stat-label">Views</div>
                </div>
            </div>
            <div class="enter-btn">
                Watch Now
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </div>
        </div>
    </a>
</div>

<style>
    .side-films:hover .film-logo-icon {
        transform: scale(1.08);
        border-color: rgba(167,139,250,0.8) !important;
    }
</style>

</body>
</html>
