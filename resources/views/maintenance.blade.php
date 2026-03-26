<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mukusho Kenya — Karate &amp; Films</title>
    <meta name="description" content="Mukusho Kenya — Karate and Films. Coming soon.">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --karate-red: #B91C1C;
            --gold: #F59E0B;
            --film-purple: #7C3AED;
            --dark: #0a0a0a;
        }

        body {
            font-family: 'Inter', sans-serif;
            overflow: hidden;
            height: 100vh;
            background: #0a0a0a;
        }
        h1,h2,h3,.font-display { font-family: 'Oswald', sans-serif; }

        /* ─── PORTAL BACKGROUND ─────────────────────────────── */
        .portal-wrapper {
            display: flex;
            height: 100vh;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

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
            border: none;
            background: none;
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
            border: none;
            background: none;
        }

        .portal-wrapper:has(.side-karate:hover) .side-karate { flex: 1.6; }
        .portal-wrapper:has(.side-karate:hover) .side-films  { flex: 0.4; }
        .portal-wrapper:has(.side-films:hover)  .side-films  { flex: 1.6; }
        .portal-wrapper:has(.side-films:hover)  .side-karate { flex: 0.4; }

        /* Karate BG */
        .side-karate .bg-layer {
            position: absolute; inset: 0;
            background: url('{{ asset("images/Dojo.jpeg") }}') center/cover no-repeat;
            filter: brightness(0.35) saturate(0.8);
            transition: filter 0.5s ease, transform 0.6s ease;
            z-index: 0;
        }
        .side-karate:hover .bg-layer { filter: brightness(0.5) saturate(1.1); transform: scale(1.04); }

        /* Film BG */
        .side-films .bg-layer {
            position: absolute; inset: 0;
            background: linear-gradient(135deg, #0d0d1a 0%, #1a0533 40%, #0d1a2d 100%);
            z-index: 0;
        }
        .film-reel-bg {
            position: absolute; inset: 0; z-index: 1;
            background: radial-gradient(ellipse at 30% 40%, rgba(124,58,237,0.25) 0%, transparent 60%),
                        radial-gradient(ellipse at 70% 70%, rgba(245,158,11,0.15) 0%, transparent 60%);
        }
        .film-strip-anim {
            position: absolute; inset: 0; z-index: 2; opacity: 0.06;
            background-image: repeating-linear-gradient(0deg, transparent, transparent 60px, #fff 60px, #fff 64px),
                              repeating-linear-gradient(90deg, transparent, transparent 10px, #fff 10px, #fff 14px);
            animation: filmscroll 8s linear infinite;
        }
        @keyframes filmscroll { from { background-position: 0 0; } to { background-position: 0 128px; } }

        /* Gradient overlays */
        .grad-overlay-karate {
            position: absolute; inset: 0; z-index: 1;
            background: linear-gradient(135deg,rgba(185,28,28,0.3) 0%,rgba(0,0,0,0.5) 100%);
        }
        .grad-overlay-film {
            position: absolute; inset: 0; z-index: 3;
            background: linear-gradient(135deg,rgba(124,58,237,0.15) 0%,rgba(0,0,0,0.4) 100%);
        }

        /* Divider + OR badge */
        .divider {
            position: absolute; left: 50%; top: 0; width: 3px; height: 100%;
            background: linear-gradient(to bottom, transparent, rgba(255,255,255,0.5), transparent);
            z-index: 20; pointer-events: none;
        }
        .or-badge {
            position: absolute; left: 50%; top: 50%;
            transform: translate(-50%,-50%);
            z-index: 30;
            width: 52px; height: 52px; border-radius: 50%;
            background: rgba(20,20,30,0.95);
            border: 2px solid rgba(255,255,255,0.25);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Oswald', sans-serif; font-size: 14px; font-weight: 700;
            color: rgba(255,255,255,0.7); letter-spacing: 0.1em;
            box-shadow: 0 0 30px rgba(0,0,0,0.5);
            pointer-events: none;
        }

        /* Top brand */
        .top-brand {
            position: absolute; top: 0; left: 0; right: 0; z-index: 25;
            padding: 16px 32px;
            display: flex; align-items: center; justify-content: center; gap: 12px;
            background: linear-gradient(to bottom, rgba(0,0,0,0.6), transparent);
            pointer-events: none;
        }
        .top-brand img { width: 36px; height: 36px; border-radius: 50%; border: 1px solid rgba(255,255,255,0.3); object-fit: cover; }
        .top-brand span { font-family: 'Oswald', sans-serif; font-size: 13px; font-weight: 600; letter-spacing: 0.2em; text-transform: uppercase; color: rgba(255,255,255,0.6); }

        /* Side content */
        .side-content {
            position: relative; z-index: 10;
            display: flex; flex-direction: column; align-items: center;
            padding: 40px; gap: 20px;
        }
        .side-logo {
            width: 90px; height: 90px; border-radius: 50%;
            border: 3px solid rgba(255,255,255,0.3); object-fit: cover;
            box-shadow: 0 0 40px rgba(0,0,0,0.5);
            transition: transform 0.4s ease, border-color 0.4s ease;
        }
        .side-karate:hover .side-logo { transform: scale(1.08); border-color: var(--gold); }
        .side-films:hover .film-logo-icon { transform: scale(1.08) !important; }

        .side-label-tag {
            font-size: 11px; font-weight: 700; letter-spacing: 0.35em;
            text-transform: uppercase; padding: 6px 16px; border-radius: 100px; color: white;
        }
        .side-karate .side-label-tag { background: rgba(185,28,28,0.6); border: 1px solid #ef4444; }
        .side-films  .side-label-tag { background: rgba(124,58,237,0.6); border: 1px solid #8b5cf6; }

        .side-title {
            font-family: 'Oswald', sans-serif; font-weight: 800;
            font-size: clamp(2rem, 4vw, 3.8rem); color: white;
            letter-spacing: 0.04em; line-height: 1; text-transform: uppercase;
            text-shadow: 0 4px 20px rgba(0,0,0,0.8);
        }
        .accent-karate { color: var(--gold); }
        .accent-film   { color: #a78bfa; }

        .side-desc {
            font-size: 13px; color: rgba(255,255,255,0.65);
            max-width: 300px; line-height: 1.7; text-align: center;
        }
        .side-pills {
            display: flex; flex-wrap: wrap; justify-content: center; gap: 8px;
        }
        .pill {
            font-size: 10px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase;
            padding: 5px 12px; border-radius: 100px;
            color: rgba(255,255,255,0.9); border: 1px solid rgba(255,255,255,0.15);
            background: rgba(255,255,255,0.08); backdrop-filter: blur(4px);
        }
        .stat-row { display: flex; gap: 24px; }
        .stat-item { text-align: center; }
        .stat-num-karate { font-family: 'Oswald',sans-serif; font-size: 22px; font-weight: 700; color: var(--gold); }
        .stat-num-film   { font-family: 'Oswald',sans-serif; font-size: 22px; font-weight: 700; color: #a78bfa; }
        .stat-label { font-size: 10px; color: rgba(255,255,255,0.4); letter-spacing: 0.08em; text-transform: uppercase; }

        .enter-btn {
            display: inline-flex; align-items: center; gap: 10px;
            font-family: 'Oswald', sans-serif; font-weight: 700; font-size: 15px;
            letter-spacing: 0.15em; text-transform: uppercase;
            padding: 13px 30px; border-radius: 8px; color: white;
            transition: all 0.3s ease; border: 2px solid transparent; margin-top: 4px;
        }
        .side-karate .enter-btn { background: #B91C1C; border-color: #ef4444; }
        .side-karate .enter-btn:hover { background: #dc2626; box-shadow: 0 0 30px rgba(239,68,68,0.4); transform: translateY(-2px); }
        .side-films  .enter-btn { background: #7C3AED; border-color: #8b5cf6; }
        .side-films  .enter-btn:hover { background: #6d28d9; box-shadow: 0 0 30px rgba(139,92,246,0.4); transform: translateY(-2px); }
        .enter-btn svg { transition: transform 0.3s ease; }
        .enter-btn:hover svg { transform: translateX(4px); }

        .kanji-float {
            position: absolute; font-family: serif; font-size: 200px;
            color: white; opacity: 0.03; line-height: 1;
            user-select: none; pointer-events: none; z-index: 3;
        }

        /* ─── MAINTENANCE OVERLAY ───────────────────────────── */
        .maint-overlay {
            position: fixed; inset: 0; z-index: 1000;
            background: rgba(0,0,0,0.92);
            backdrop-filter: blur(8px);
            display: flex; align-items: center; justify-content: center;
            opacity: 0; visibility: hidden;
            transition: opacity 0.35s ease, visibility 0.35s ease;
            padding: 24px;
        }
        .maint-overlay.show { opacity: 1; visibility: visible; }

        .maint-card {
            background: #111111;
            border: 1px solid #1f1f1f;
            border-radius: 24px;
            padding: 56px 48px;
            max-width: 540px;
            width: 100%;
            text-align: center;
            transform: scale(0.92) translateY(20px);
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .maint-overlay.show .maint-card { transform: scale(1) translateY(0); }

        /* Spinner */
        .spinner-wrap { display: flex; justify-content: center; margin-bottom: 32px; }
        .spinner {
            width: 64px; height: 64px; border-radius: 50%;
            border: 3px solid #1f1f1f; border-top-color: #22c55e;
            animation: spin 1.2s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        .maint-title {
            font-size: clamp(2rem, 5vw, 2.8rem); font-weight: 800;
            color: white; margin-bottom: 16px; line-height: 1.1;
        }
        .maint-desc { font-size: 16px; color: rgba(255,255,255,0.5); line-height: 1.7; margin-bottom: 8px; }
        .maint-subdesc { font-size: 14px; color: rgba(255,255,255,0.3); line-height: 1.7; margin-bottom: 36px; }

        .btn-row { display: flex; justify-content: center; flex-wrap: wrap; gap: 12px; }

        .btn-outline {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 13px 28px; border-radius: 100px;
            border: 1.5px solid rgba(255,255,255,0.2);
            background: transparent; color: rgba(255,255,255,0.65);
            font-size: 14px; font-weight: 600;
            text-decoration: none; cursor: pointer; transition: all 0.25s ease;
            font-family: 'Inter', sans-serif;
        }
        .btn-outline:hover { border-color: rgba(255,255,255,0.5); color: white; }

        .btn-green {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 13px 32px; border-radius: 100px;
            background: #22c55e; color: #0a0a0a;
            font-size: 14px; font-weight: 700;
            text-decoration: none; transition: all 0.25s ease;
            border: none; cursor: pointer; font-family: 'Inter', sans-serif;
        }
        .btn-green:hover { background: #16a34a; transform: translateY(-1px); box-shadow: 0 8px 25px rgba(34,197,94,0.3); }

        .maint-logo-row {
            margin-top: 40px; padding-top: 28px;
            border-top: 1px solid #1f1f1f;
            display: flex; align-items: center; justify-content: center;
            gap: 10px; color: rgba(255,255,255,0.2);
            font-size: 12px; letter-spacing: 0.15em; text-transform: uppercase;
        }
        .maint-logo-row img { width: 26px; height: 26px; border-radius: 50%; opacity: 0.3; object-fit: cover; }

        /* Close hint */
        .close-hint {
            margin-top: 16px;
            font-size: 12px;
            color: rgba(255,255,255,0.2);
            cursor: pointer;
            letter-spacing: 0.05em;
            transition: color 0.2s;
        }
        .close-hint:hover { color: rgba(255,255,255,0.5); }

        /* Mobile */
        @media (max-width: 768px) {
            body { overflow: auto; }
            .portal-wrapper { flex-direction: column; height: auto; min-height: 100vh; }
            .side-karate, .side-films { flex: none !important; min-height: 50vh; }
            .divider, .or-badge { display: none; }
            .side-content { padding: 50px 24px; }
            .side-title { font-size: clamp(1.8rem, 8vw, 2.8rem); }
            .maint-card { padding: 40px 24px; }
        }
    </style>
</head>
<body>

{{-- ── PORTAL LAYOUT (visible but clicks are intercepted) ── --}}
<div class="portal-wrapper">

    <!-- Top brand -->
    <div class="top-brand">
        <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="Mukusho">
        <span>Mukusho Kenya</span>
    </div>

    {{-- LEFT — KARATE (Active) --}}
    <button class="side-karate" onclick="window.location.href='{{ route('karate.home') }}'" id="btn-karate">
        <div class="bg-layer"></div>
        <div class="grad-overlay-karate"></div>
        <div class="kanji-float" style="bottom:-40px;right:-20px;">空手</div>
        <div class="side-content">
            <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="Mukusho Karate Kenya" class="side-logo">
            <div class="side-label-tag">Martial Arts</div>
            <div class="side-title">MUKUSHO<br><span class="accent-karate">KARATE</span> KENYA</div>
            <p class="side-desc">Sport karate, self-defence &amp; youth empowerment. Nyeri, Nanyuki, Murang'a &amp; Othaya.</p>
            <div class="side-pills">
                <span class="pill">🥋 Shorin-Ryu</span>
                <span class="pill">🏆 National Champions</span>
                <span class="pill">👦🏾 Kids & Adults</span>
            </div>
            <div class="stat-row">
                <div class="stat-item"><div class="stat-num-karate">20+</div><div class="stat-label">Clubs</div></div>
                <div class="stat-item"><div class="stat-num-karate">10+</div><div class="stat-label">Years</div></div>
                <div class="stat-item"><div class="stat-num-karate">50+</div><div class="stat-label">Athletes</div></div>
            </div>
            <div class="enter-btn">
                Enter Dojo
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </div>
        </div>
    </button>

    {{-- DIVIDER --}}
    <div class="divider"></div>
    <div class="or-badge">OR</div>

    {{-- RIGHT — FILMS --}}
    <button class="side-films" onclick="showMaintenance()" id="btn-films">
        <div class="bg-layer"></div>
        <div class="film-reel-bg"></div>
        <div class="film-strip-anim"></div>
        <div class="grad-overlay-film"></div>
        <div class="side-content">
            <div class="film-logo-icon" style="width:90px;height:90px;border-radius:50%;border:3px solid rgba(139,92,246,0.5);background:rgba(124,58,237,0.2);display:flex;align-items:center;justify-content:center;font-size:44px;transition:transform 0.4s ease;">🎬</div>
            <div class="side-label-tag">Film Production</div>
            <div class="side-title">MUKUSHO<br><span class="accent-film">FILMS</span></div>
            <p class="side-desc">Home of MAPESA series, KISASI, Pazia la Siri &amp; more — airing on UTV Kenya.</p>
            <div class="side-pills">
                <span class="pill">🎭 MAPESA Series</span>
                <span class="pill">📺 UTV Kenya</span>
                <span class="pill">🎬 375+ Videos</span>
            </div>
            <div class="stat-row">
                <div class="stat-item"><div class="stat-num-film">4+</div><div class="stat-label">Seasons</div></div>
                <div class="stat-item"><div class="stat-num-film">2.6K</div><div class="stat-label">Subs</div></div>
                <div class="stat-item"><div class="stat-num-film">178K</div><div class="stat-label">Views</div></div>
            </div>
            <div class="enter-btn">
                Watch Now
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </div>
        </div>
    </button>
</div>

{{-- ── MAINTENANCE OVERLAY ── --}}
<div class="maint-overlay" id="maintOverlay" onclick="handleOverlayClick(event)">
    <div class="maint-card" id="maintCard">
        <div class="spinner-wrap">
            <div class="spinner"></div>
        </div>

        <h1 class="maint-title">Under Maintenance</h1>

        <p class="maint-desc">
            We're currently performing scheduled<br>maintenance to improve your experience.
        </p>
        <p class="maint-subdesc">
            We'll be back online shortly. Thank you for your patience!
        </p>

        <div class="btn-row">
            <a href="mailto:mukushofilms@gmail.com" class="btn-outline">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Contact Support
            </a>
            <a href="{{ route('karate.home') }}" class="btn-green">
                Return Home
            </a>
        </div>

        <div class="maint-logo-row">
            <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="Mukusho Kenya">
            Mukusho Kenya
        </div>

        <a href="{{ route('karate.home') }}" class="close-hint" style="display:inline-block; text-decoration:none;">✕ Close and go back</a>
    </div>
</div>

<script>
    function showMaintenance() {
        document.getElementById('maintOverlay').classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function hideMaintenance() {
        document.getElementById('maintOverlay').classList.remove('show');
        document.body.style.overflow = '';
    }

    // Click outside card to close
    function handleOverlayClick(e) {
        if (e.target === document.getElementById('maintOverlay')) {
            hideMaintenance();
        }
    }

    // ESC key to close
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            window.location.href = "{{ route('karate.home') }}";
        }
    });
</script>

@if(isset($autoShowModal) && $autoShowModal)
<script>
    document.addEventListener('DOMContentLoaded', () => {
        showMaintenance();
    });
</script>
@endif

</body>
</html>
