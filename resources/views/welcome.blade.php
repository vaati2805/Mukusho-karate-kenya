<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mukusho Karate Kenya — Sport Karate & Self Defence</title>
    <meta name="description" content="Mukusho Karate Kenya — Training in Sport Karate & Self Defence in Nyeri, Nanyuki, and Murang'a. Led by Sensei Benard Kihachu. Kids, teens & adults welcome.">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
        :root {
            --red: #B91C1C;
            --red-dark: #991B1B;
            --blue: #1E40AF;
            --blue-dark: #1E3A8A;
            --green: #B91C1C;
            --green-light: #EF4444;
            --gold: #F59E0B;
            --dark: #0F172A;
        }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Oswald', sans-serif; }
        .hero-bg { background-attachment: fixed; background-size: cover; background-position: center; }
        @media (max-width: 768px) { .hero-bg { background-attachment: scroll; } }
        .reveal { opacity: 0; transform: translateY(40px); transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
        .reveal.active { opacity: 1; transform: translateY(0); }
        .counter { font-variant-numeric: tabular-nums; }
        .text-gradient { background: linear-gradient(135deg, #EF4444 0%, #F59E0B 50%, #EF4444 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .card-glow:hover { box-shadow: 0 0 30px rgba(185, 28, 28, 0.15); }
        .mobile-menu { max-height: 0; overflow: hidden; transition: max-height 0.4s ease; }
        .mobile-menu.open { max-height: 500px; }
        /* Mobile utility bar */
        @media (max-width: 767px) {
            .utility-bar { padding: 4px 0 !important; }
            .utility-bar-inner { gap: 4px !important; }
            .utility-bar-inner .social-icons { gap: 12px !important; }
            .utility-bar-inner .social-icons svg { width: 16px !important; height: 16px !important; }
            .utility-right { gap: 8px !important; }
            .utility-right .wa-text { display: none; }
            .utility-right .films-btn { font-size: 10px !important; padding: 4px 10px !important; }
            .desktop-nav { display: none !important; }
            .nav-logo-img { height: 40px !important; }
            .nav-logo-text { font-size: 1rem !important; letter-spacing: 0.05em !important; }
            .nav-logo-sub { font-size: 8px !important; letter-spacing: 0.15em !important; }
            .nav-bar-inner { height: 56px !important; }
            .nav-logo-link { gap: 10px !important; }
            #navbar { top: 32px !important; }
        }
        @media (min-width: 1024px) {
            .desktop-nav { display: flex !important; }
        }
        .faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.35s ease; }
        .faq-answer.open { max-height: 300px; }
        .badge-float { animation: float 3s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-10px); } }
        .pulse-ring { animation: pulse-ring 2s infinite; }
        @keyframes pulse-ring { 0% { box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.5); } 70% { box-shadow: 0 0 0 15px rgba(220, 38, 38, 0); } 100% { box-shadow: 0 0 0 0 rgba(220, 38, 38, 0); } }
        /* Navbar layout */
        .nav-bg { background-color: #0a0a0a; }
        .nav-bg-scrolled { background-color: #111111; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3); }
        /* Dropdown hover - replaces Tailwind group-hover */
        .group:hover > .nav-dropdown { opacity: 1 !important; visibility: visible !important; }
    </style>
</head>
<body class="bg-white text-slate-800 antialiased">

    {{-- UTILITY BAR - Social Media + Films Switcher --}}
    <div class="utility-bar" style="position: fixed; width: 100%; z-index: 60; top: 0; background-color: #1f2937; color: white; padding: 8px 0;">
        <div class="utility-bar-inner" style="max-width: 80rem; margin: 0 auto; padding: 0 16px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px;">
            <div class="social-icons" style="display: flex; align-items: center; gap: 20px;">
                <a href="https://www.facebook.com/mukushomartials/" target="_blank" title="Facebook" style="transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.25)'" onmouseout="this.style.transform='scale(1)'">
                    <svg style="width: 20px; height: 20px; color: white;" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/></svg>
                </a>
                <a href="#" target="_blank" title="Instagram" style="transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.25)'" onmouseout="this.style.transform='scale(1)'">
                    <svg style="width: 20px; height: 20px; color: white;" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
                <a href="https://www.tiktok.com/@benmukushokarate1" target="_blank" title="TikTok" style="transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.25)'" onmouseout="this.style.transform='scale(1)'">
                    <svg style="width: 20px; height: 20px; color: white;" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.88-2.88 2.89 2.89 0 012.88-2.88c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 00-.79-.05A6.34 6.34 0 003.16 15.2a6.34 6.34 0 0010.86 4.48 6.3 6.3 0 001.87-4.48V8.73a8.3 8.3 0 004.86 1.57V6.85a4.89 4.89 0 01-1.16-.16z"/></svg>
                </a>
                <a href="https://www.youtube.com/@mukushokaratekenya7619" target="_blank" title="YouTube" style="transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.25)'" onmouseout="this.style.transform='scale(1)'">
                    <svg style="width: 20px; height: 20px; color: white;" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>
            </div>
            <div class="utility-right" style="display:flex;align-items:center;gap:16px;">
                {{-- 🎬 Films Switcher Button --}}
                <a class="films-btn" href="{{ route('films.home') }}" style="display:inline-flex;align-items:center;gap:7px;font-family:'Inter',sans-serif;font-weight:700;font-size:12px;letter-spacing:0.12em;text-transform:uppercase;padding:6px 14px;border-radius:6px;background:rgba(124,58,237,0.25);border:1px solid rgba(139,92,246,0.5);color:#c4b5fd;text-decoration:none;transition:all 0.3s ease;white-space:nowrap;" onmouseover="this.style.background='rgba(124,58,237,0.5)';this.style.color='white';" onmouseout="this.style.background='rgba(124,58,237,0.25)';this.style.color='#c4b5fd';">
                    🎬 Mukusho Films
                </a>
                <a href="https://wa.me/254743909457" target="_blank" style="color: white; text-decoration: none; display: flex; align-items: center; gap: 8px; font-size: 14px; transition: color 0.2s;" onmouseover="this.style.color='#4ade80'" onmouseout="this.style.color='white'">
                    <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.489-1.761-1.662-2.06-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M2.004 22l1.352-4.968A9.892 9.892 0 011.95 11.95a9.96 9.96 0 1120.015 0 9.96 9.96 0 01-14.71 8.647L2.004 22zm5.446-2.583a8.172 8.172 0 109.916-12.8 8.17 8.17 0 00-11.416 1.492 8.118 8.118 0 00-1.085 4.39A8.106 8.106 0 005.12 17.1l-1.01 3.71 3.784-1.011z"/></svg>
                    <span class="wa-text">Chat with us on WhatsApp</span>
                </a>
            </div>
        </div>
    </div>

    {{-- NAVBAR - JKA Style Dark Professional --}}
    <nav id="navbar" style="position: fixed; width: 100%; z-index: 50; top: 36px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3); background: #0a0a0a; border-bottom: 3px solid #B91C1C;">
        <div style="max-width: 80rem; margin: 0 auto; padding: 0 16px;">
            <div class="nav-bar-inner" style="display: flex; justify-content: space-between; align-items: center; height: 96px;">
                {{-- Logo & Brand --}}
                <a class="nav-logo-link" href="{{ route('karate.home') }}" style="display: flex; align-items: center; gap: 16px; flex-shrink: 0; text-decoration: none;">
                    <img class="nav-logo-img" src="{{ asset('images/mukusho-logo.jpeg') }}" alt="Mukusho Karate Kenya Logo" style="height: 80px; width: auto; border-radius: 50%; border: 2px solid white; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.2);">
                    <div style="display: flex; flex-direction: column; justify-content: center;">
                        <span class="font-display nav-logo-text" style="font-weight: 700; font-size: 1.875rem; color: white; letter-spacing: 0.1em; line-height: 1; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">MUKUSHO</span>
                        <span class="font-display nav-logo-sub" style="font-weight: 500; color: #fbbf24; font-size: 11px; letter-spacing: 0.25em; text-transform: uppercase; margin-top: 4px;">Karate Kenya</span>
                    </div>
                </a>

                {{-- Navigation Links (JKA Style) --}}
                <div class="hidden lg:flex desktop-nav" style="align-items: center; gap: 24px; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">

                    {{-- HOME --}}
                    <a href="{{ route('karate.home') }}" style="font-weight: 700; color: white; text-transform: uppercase; font-size: 14px; letter-spacing: 0.05em; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#fde047'" onmouseout="this.style.color='white'">HOME</a>

                    {{-- About Us Link --}}
                    <a href="{{ route('about') }}" style="font-weight: 700; color: white; text-transform: uppercase; font-size: 14px; letter-spacing: 0.05em; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#fde047'" onmouseout="this.style.color='white'">ABOUT US</a>

                    {{-- Learning Resources Dropdown --}}
                    <div class="relative group">
                        <a href="{{ route('learning.resources') }}" style="display: flex; align-items: center; gap: 4px; font-weight: 700; color: white; text-transform: uppercase; font-size: 14px; letter-spacing: 0.05em; cursor: pointer; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#fde047'" onmouseout="this.style.color='white'">
                            LEARNING RESOURCES
                            <svg style="width: 12px; height: 12px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </a>
                        <div class="nav-dropdown" style="position: absolute; top: 100%; left: 0; margin-top: 8px; width: 220px; background: white; box-shadow: 0 10px 25px rgba(0,0,0,0.15); opacity: 0; visibility: hidden; transition: all 0.2s; z-index: 50; border-radius: 4px; overflow: hidden;">
                            <a href="{{ route('learning.resources') }}#clubs" style="display: block; padding: 12px 16px; font-size: 14px; color: #374151; text-decoration: none; text-shadow: none; transition: all 0.2s;" onmouseover="this.style.backgroundColor='#f9fafb'; this.style.color='#dc2626'" onmouseout="this.style.backgroundColor=''; this.style.color='#374151'">Find a Dojo</a>
                            <a href="{{ route('learning.resources') }}#instructor" style="display: block; padding: 12px 16px; font-size: 14px; color: #374151; text-decoration: none; text-shadow: none; transition: all 0.2s;" onmouseover="this.style.backgroundColor='#f9fafb'; this.style.color='#dc2626'" onmouseout="this.style.backgroundColor=''; this.style.color='#374151'">Our Instructors</a>
                            <a href="{{ route('learning.resources') }}#schedule" style="display: block; padding: 12px 16px; font-size: 14px; color: #374151; text-decoration: none; text-shadow: none; transition: all 0.2s;" onmouseover="this.style.backgroundColor='#f9fafb'; this.style.color='#dc2626'" onmouseout="this.style.backgroundColor=''; this.style.color='#374151'">Events & Schedule</a>
                            <a href="{{ route('learning.resources') }}#gallery" style="display: block; padding: 12px 16px; font-size: 14px; color: #374151; text-decoration: none; text-shadow: none; transition: all 0.2s;" onmouseover="this.style.backgroundColor='#f9fafb'; this.style.color='#dc2626'" onmouseout="this.style.backgroundColor=''; this.style.color='#374151'">Inside the Dojo</a>
                        </div>
                    </div>

                    <a href="{{ route('achievements') }}" style="font-weight: 700; color: white; text-transform: uppercase; font-size: 14px; letter-spacing: 0.05em; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#fde047'" onmouseout="this.style.color='white'">ACHIEVEMENTS</a>
                    <a href="{{ route('karate.home') }}#faq" style="font-weight: 700; color: white; text-transform: uppercase; font-size: 14px; letter-spacing: 0.05em; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#fde047'" onmouseout="this.style.color='white'">FAQ</a>
                    <a href="{{ route('contact') }}" style="font-weight: 700; color: white; text-transform: uppercase; font-size: 14px; letter-spacing: 0.05em; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#fde047'" onmouseout="this.style.color='white'">CONTACT</a>

                    {{-- Register Dropdown --}}
                    <div class="relative group" id="register-dropdown">
                        <button class="bg-amber-500 hover:bg-amber-400 text-slate-900 font-bold py-2.5 px-6 rounded-lg shadow-lg transition-all hover:-translate-y-0.5 uppercase text-sm tracking-wide pulse-ring flex items-center gap-1.5">
                            Register
                            <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="absolute right-0 top-full mt-2 w-64 bg-white rounded-sm shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden">
                            <a href="{{ route('register.create') }}" class="flex items-center gap-3 px-5 py-3.5 text-gray-700 hover:bg-gray-50 hover:text-red-600 transition-colors text-sm font-medium">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                                Register New Member
                            </a>
                            <div class="border-t border-gray-100"></div>
                            <a href="{{ route('payment.create') }}" class="flex items-center gap-3 px-5 py-3.5 text-gray-700 hover:bg-gray-50 hover:text-red-600 transition-colors text-sm font-medium">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                Pay Monthly Fee
                            </a>
                        </div>
                    </div>
                    {{-- Admin Login --}}
                    <a href="{{ route('admin.login.form') }}" class="bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white font-bold py-2.5 px-5 rounded-lg transition-all uppercase text-sm tracking-wide border border-white/20 hover:border-yellow-400/50">
                        <svg class="w-4 h-4 inline-block mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Login
                    </a>
                </div>

                {{-- Mobile Menu Button --}}
                <button id="mobile-toggle" class="lg:hidden text-white focus:outline-none" aria-label="Toggle menu">
                    <svg id="menu-icon" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg id="close-icon" class="w-8 h-8 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            {{-- Mobile Menu --}}
            <div id="mobile-menu" class="mobile-menu lg:hidden">
                <div class="pb-6 pt-2 space-y-3 border-t border-white/10">
                    <a href="{{ route('karate.home') }}" class="block text-white/80 hover:text-yellow-300 uppercase text-sm font-bold tracking-wide py-2 mobile-link">Home</a>
                    <a href="{{ route('about') }}" class="block text-white/80 hover:text-yellow-300 uppercase text-sm font-bold tracking-wide py-2 mobile-link">About Us</a>
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center justify-between w-full text-white/80 hover:text-yellow-300 uppercase text-sm font-bold tracking-wide py-2">
                            Learning Resources
                            <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition class="pl-4 py-2 space-y-2 border-l border-white/20 ml-2 mt-1">
                            <a href="{{ route('learning.resources') }}#clubs" class="block text-white/60 hover:text-yellow-300 uppercase text-[11px] font-medium tracking-wider py-1.5 mobile-link">Find a Dojo</a>
                            <a href="{{ route('learning.resources') }}#instructor" class="block text-white/60 hover:text-yellow-300 uppercase text-[11px] font-medium tracking-wider py-1.5 mobile-link">Our Instructors</a>
                            <a href="{{ route('learning.resources') }}#schedule" class="block text-white/60 hover:text-yellow-300 uppercase text-[11px] font-medium tracking-wider py-1.5 mobile-link">Events & Schedule</a>
                            <a href="{{ route('learning.resources') }}#gallery" class="block text-white/60 hover:text-yellow-300 uppercase text-[11px] font-medium tracking-wider py-1.5 mobile-link">Inside the Dojo</a>
                        </div>
                    </div>
                    <a href="{{ route('achievements') }}" class="block text-white/80 hover:text-yellow-300 uppercase text-sm font-bold tracking-wide py-2 mobile-link">Achievements</a>
                    <a href="{{ route('karate.home') }}#faq" class="block text-white/80 hover:text-yellow-300 uppercase text-sm font-bold tracking-wide py-2 mobile-link">FAQ</a>
                    <a href="{{ route('contact') }}" class="block text-white/80 hover:text-yellow-300 uppercase text-sm font-bold tracking-wide py-2 mobile-link">Contact</a>
                    <div class="border-t border-white/10 pt-3 mt-3 space-y-2">
                        <a href="{{ route('register.create') }}" class="block bg-amber-500 text-slate-900 font-bold py-3 px-6 rounded-lg text-center uppercase text-sm tracking-wide">Register New Member</a>
                        <a href="{{ route('payment.create') }}" class="block bg-white/10 text-white font-bold py-3 px-6 rounded-lg text-center uppercase text-sm tracking-wide border border-white/20">Pay Monthly Fee</a>
                        <a href="{{ route('admin.login.form') }}" class="block bg-white/10 text-white font-bold py-3 px-6 rounded-lg text-center uppercase text-sm tracking-wide border border-white/20">Admin Login</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- HERO --}}
    @php
        $heroItems = $sections['hero'] ?? collect();
        $heroItem = $heroItems->first();
        // Collect ALL media from ALL active hero items for the slideshow
        $heroMedia = $heroItems->flatMap(fn($item) => $item->media ?? collect())->values();
        $heroHasMedia = $heroMedia->count() > 0;
    @endphp
    <header class="relative min-h-screen flex items-center justify-center overflow-hidden"
            x-data="heroSlideshow()" x-init="startAutoPlay()">

        {{-- Background Slideshow Layer --}}
        @if($heroHasMedia)
        <div class="absolute inset-0 z-0">
            @foreach($heroMedia as $hi => $hm)
            <div x-cloak x-show="currentSlide === {{ $hi }}"
                 x-transition:enter="transition-opacity ease-out duration-1000"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-in duration-1000"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0">
                @if($hm->isImage())
                <img src="{{ $hm->url }}" alt="{{ $heroItem->title }}" class="w-full h-full object-cover">
                @else
                <video class="w-full h-full object-cover" :id="'hero-vid-{{ $hi }}'" muted playsinline loop
                       x-init="currentSlide === {{ $hi }} && $el.play()"
                       @play="isVideoPlaying = true" @pause="isVideoPlaying = false">
                    <source src="{{ $hm->url }}" type="video/mp4">
                </video>
                @endif
            </div>
            @endforeach
        </div>
        @else
        {{-- Fallback static background --}}
        <div class="absolute inset-0 z-0 hero-bg" style="background-image: url('{{ asset('images/Dojo.jpeg') }}'); background-size: cover; background-position: center;"></div>
        @endif

        {{-- Dark overlay for text readability --}}
        <div class="absolute inset-0 z-[1] bg-gradient-to-br from-black/70 via-slate-900/60 to-red-900/40"></div>
        <div class="absolute inset-0 z-[1] bg-black/30"></div>

        {{-- Kanji decoration --}}
        <div class="absolute right-10 top-1/4 hidden xl:block opacity-[0.03] z-[2]">
            <span class="text-[220px] font-display text-white font-bold leading-none">空手</span>
        </div>

        {{-- Hero Content --}}
        <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-20">
            <div class="inline-flex items-center bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-5 py-2 mb-8 badge-float">
                <span class="w-2 h-2 bg-red-400 rounded-full mr-3 animate-pulse"></span>
                <span class="text-white/90 text-sm font-medium">{!! $heroItem && $heroItem->subtitle ? e($heroItem->subtitle) : 'Now Enrolling &mdash; Nyeri, Nanyuki, and Murang\'a' !!}</span>
            </div>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-display font-black text-white mb-6 leading-[0.9] tracking-tight hero-title">
                <span class="block">MUKUSHO</span>
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-red-400 via-white to-amber-400">KARATE KENYA</span>
            </h1>
            <p class="text-lg md:text-xl text-white/80 mb-10 max-w-2xl mx-auto font-light leading-relaxed">
                {{ $heroItem && $heroItem->content ? $heroItem->content : 'Mukusho Karate Kenya builds discipline, confidence and championship-level skill through authentic karate training. All ages welcome — beginners to black belts.' }}
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6">
                <a href="#contact" class="bg-red-700 hover:bg-red-600 text-white font-bold py-4 px-10 rounded-lg text-lg uppercase tracking-wide transition-all hover:shadow-[0_0_25px_rgba(185,28,28,0.5)] hover:-translate-y-0.5">{{ $heroItem ? $heroItem->extra('cta_primary', 'Start Training Free') : 'Start Training Free' }}</a>
                <a href="#programs" class="group bg-transparent hover:bg-white/10 border-2 border-white/50 hover:border-white text-white font-bold py-4 px-10 rounded-lg text-lg uppercase tracking-wide transition-all flex items-center justify-center gap-2">
                    {{ $heroItem ? $heroItem->extra('cta_secondary', 'View Programs') : 'View Programs' }}
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            {{-- Slide indicators (only if multiple media) --}}
            @if($heroMedia->count() > 1)
            <div class="flex justify-center gap-2 mt-10">
                @foreach($heroMedia as $di => $dm)
                <button @click="goTo({{ $di }})" class="w-2.5 h-2.5 rounded-full transition-all duration-300"
                        :class="currentSlide === {{ $di }} ? 'bg-white scale-125' : 'bg-white/40 hover:bg-white/60'"></button>
                @endforeach
            </div>
            @endif
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10">
            <div class="w-6 h-10 border-2 border-white/40 rounded-full flex justify-center">
                <div class="w-1.5 h-3 bg-white/60 rounded-full mt-2 animate-bounce"></div>
            </div>
        </div>
        <div class="absolute bottom-0 w-full overflow-hidden leading-none z-10">
            <svg class="relative block w-full h-12 md:h-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M1200 120L0 16.48V0h1200v120z" fill="#ffffff"></path>
            </svg>
        </div>
    </header>

    {{-- STATS BAR --}}
    <!-- <section class="relative -mt-1 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-slate-900 rounded-2xl shadow-2xl py-8 px-6 md:px-12 grid grid-cols-2 md:grid-cols-4 gap-6 text-center -mt-8 relative z-20 reveal">
                <div>
                    <div class="text-3xl md:text-4xl font-display font-bold text-amber-400 counter" data-target="10">0</div>
                    <div class="text-slate-400 text-sm uppercase tracking-wider mt-1">Years Training</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-display font-bold text-amber-400 counter" data-target="5">0</div>
                    <div class="text-slate-400 text-sm uppercase tracking-wider mt-1">Medals Won in 2026</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-display font-bold text-amber-400 counter" data-target="4">0</div>
                    <div class="text-slate-400 text-sm uppercase tracking-wider mt-1">Training Days / Week</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-display font-bold text-amber-400 flex items-center justify-center gap-1"><span class="counter" data-target="100">0</span>%</div>
                    <div class="text-slate-400 text-sm uppercase tracking-wider mt-1">Heart & Dedication</div>
                </div>
            </div>
        </div>
    </section> -->

    {{-- ABOUT --}}
    <section id="about" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative reveal">
                    @php
                        $aboutItem = ($sections['about'] ?? collect())->first();
                        $aboutMedia = $aboutItem ? $aboutItem->media : collect();
                        $aboutFallback = asset('images/life.jpeg');
                        if ($aboutItem && $aboutItem->image && $aboutMedia->isEmpty()) {
                            $aboutFallback = str_starts_with($aboutItem->image, 'content/') ? asset('storage/' . $aboutItem->image) : asset($aboutItem->image);
                        }
                    @endphp
                    <div class="shadow-2xl rounded-2xl w-full overflow-hidden relative">
                        <x-media-slideshow :media="$aboutMedia" :fallbackImage="$aboutFallback" roundedClass="rounded-2xl" aspectClass="aspect-[4/3]" />
                    </div>
                    <div class="absolute -bottom-6 -right-4 sm:right-4 bg-green-800 text-white rounded-xl p-5 shadow-xl max-w-[210px]">
                        <div class="text-2xl font-display font-bold">Shorin-Ryu</div>
                        <div class="text-amber-300 text-xs uppercase tracking-wider mt-0.5">Nyeri &bull; Nanyuki &bull; Murang'a</div>
                        <div class="text-xs text-green-200">Okinawan Karate Style</div><div class="w-full h-px bg-white/20 my-2"></div><div class="text-xs text-green-300 mt-0.5">Sport Karate &amp; Self Defence</div>
                    </div>
                </div>
                <div class="reveal" x-data="{ expanded: false }">
                    <div class="inline-flex items-center bg-green-50 text-green-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">
                        <span class="w-1.5 h-1.5 bg-green-600 rounded-full mr-2"></span> About Our Dojo
                    </div>
                    <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 mb-6 uppercase leading-tight">
                        More Than a Club.<br><span class="text-green-700">A Way of Life.</span>
                    </h2>
                    <p class="text-slate-600 text-lg leading-relaxed mb-4">
                        Mukusho Karate Kenya is a group of dedicated martial arts practitioners based in <strong>Nyeri County</strong>, with branches extending to <strong>Nanyuki, Murang'a, and Othaya</strong>.
                        The club operates under the spiritual patronage and leadership of <strong>Rev. Fr. Peter Kiongo</strong>, whose vision, faith, and unwavering commitment to youth have been the cornerstone of the dojo's growth and community impact.
                    </p>
                    {{-- Collapsible extra --}}
                    <div x-show="expanded" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                    <p class="text-slate-600 text-lg leading-relaxed mb-4">
                        Mukusho is rooted in <strong>Shorin-Ryu Karate</strong> — one of the oldest and most respected styles of Okinawan martial arts, tracing its lineage through the legendary Shuri-te tradition to masters Sokon Matsumura and Anko Itosu. Shorin-Ryu emphasises <em>speed, natural body motion, and practical self-defence</em>.
                        While Shorin-Ryu is our foundation, our highly advanced coaching staff are trained in multiple disciplines and bring additional styles to enrich every student's journey.
                    </p>
                    <p class="text-slate-600 text-lg leading-relaxed mb-4">
                        Today, Mukusho Karate Kenya is active in <strong>more than 30 schools</strong> across the region, instilling discipline, confidence, and martial arts excellence in hundreds of young people. We continue to grow, with exciting expansion plans to establish more school programmes in <strong>Nanyuki</strong> and <strong>Murang'a</strong> — bringing quality karate training closer to even more communities.
                    </p>
                    <p class="text-slate-500 leading-relaxed mb-6 text-base italic border-l-4 border-green-600 pl-4">
                        "Empowering every child with the greatness within them through confidence, discipline, and teamwork." — Training at <strong>Othaya Catholic Parish Hall</strong> and <strong>ACK St. James Cathedral, Murang'a</strong>.
                    </p>

                    {{-- Fr. Peter Kiongo Card --}}
                    <div class="bg-gradient-to-br from-green-50 to-slate-50 border border-green-200 rounded-2xl p-5 mb-6 flex items-start gap-4">
                        <div class="w-11 h-11 rounded-full bg-green-700 flex items-center justify-center shrink-0 shadow">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                        <div>
                            <div class="font-display font-bold text-slate-900 uppercase text-sm tracking-wide">Rev. Fr. Peter Kiongo</div>
                            <div class="text-xs text-green-700 font-semibold mb-1.5">Spiritual Patron &amp; Club Patron · Othaya Catholic Parish, Nyeri</div>
                            <p class="text-slate-600 text-sm leading-relaxed">
                                Father Peter Kiongo is a Catholic priest serving at Othaya Catholic Parish in Nyeri County. His deep commitment to youth development and holistic formation has made him a central pillar of Mukusho Karate Kenya —
                                providing the spiritual foundation, institutional support, and parental confidence that allows the club to thrive at the parish grounds and reach children and young adults across the region.
                            </p>
                        </div>
                    </div>
                    </div>{{-- end collapsible --}}

                    {{-- Read More / Show Less button --}}
                    <button
                        @click="expanded = !expanded"
                        class="inline-flex items-center gap-2 text-green-700 font-bold text-sm hover:text-green-600 transition-colors mb-6 group"
                    >
                        <span x-text="expanded ? 'Show Less ↑' : 'Read More ↓'">Read More ↓</span>
                    </button>

                    <div class="grid grid-cols-3 gap-2 sm:gap-4">
                        <div class="text-center p-3 sm:p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <div class="text-2xl sm:text-3xl mb-2">心</div>
                            <div class="font-display font-bold text-slate-900 uppercase text-xs sm:text-sm">Spirit</div>
                            <div class="text-xs text-slate-500 mt-1 hidden sm:block">Confidence & Discipline</div>
                        </div>
                        <div class="text-center p-3 sm:p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <div class="text-2xl sm:text-3xl mb-2">技</div>
                            <div class="font-display font-bold text-slate-900 uppercase text-xs sm:text-sm">Technique</div>
                            <div class="text-xs text-slate-500 mt-1 hidden sm:block">Kata & Kumite Mastery</div>
                        </div>
                        <div class="text-center p-3 sm:p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <div class="text-2xl sm:text-3xl mb-2">体</div>
                            <div class="font-display font-bold text-slate-900 uppercase text-xs sm:text-sm">Body</div>
                            <div class="text-xs text-slate-500 mt-1 hidden sm:block">Fitness & Strength</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PAIN POINTS --}}
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <div class="inline-flex items-center bg-amber-50 text-amber-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">Does This Sound Familiar?</div>
                <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 uppercase">We Understand Your <span class="text-green-700">Challenges</span></h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 card-glow transition-all duration-300 hover:-translate-y-1 reveal">
                    <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-display text-xl font-bold text-slate-900 uppercase mb-3">Lacking Confidence?</h3>
                    <p class="text-slate-600 leading-relaxed">Many of our students arrive feeling unsure of themselves. Through structured training, they build unshakeable self-belief &mdash; on and off the mat.</p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 card-glow transition-all duration-300 hover:-translate-y-1 reveal">
                    <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="font-display text-xl font-bold text-slate-900 uppercase mb-3">Struggling with Focus?</h3>
                    <p class="text-slate-600 leading-relaxed">In a world of distractions, karate teaches razor-sharp concentration. Our students improve focus in school, work, and everyday life.</p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 card-glow transition-all duration-300 hover:-translate-y-1 reveal">
                    <div class="w-14 h-14 bg-emerald-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="font-display text-xl font-bold text-slate-900 uppercase mb-3">Worried About Safety?</h3>
                    <p class="text-slate-600 leading-relaxed">Learn practical self-defense skills in a safe, controlled environment. Gain the physical ability and mental composure to protect yourself.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- PROGRAMS --}}
    <section id="programs" class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>
        {{-- Decorative blurs --}}
        <div class="absolute top-20 -left-32 w-72 h-72 bg-red-500/10 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-20 -right-32 w-72 h-72 bg-amber-500/10 rounded-full blur-[100px]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 reveal">
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-1.5 text-sm font-semibold mb-6 text-red-400">Choose Your Path</div>
                <h2 class="text-4xl md:text-5xl font-display font-bold uppercase">Training <span class="text-red-400">Programs</span></h2>
                <p class="text-slate-400 max-w-2xl mx-auto text-lg mt-4">From absolute beginners to elite competitors &mdash; structured training designed to develop confidence, strength, and skill at every level.</p>
            </div>

            {{-- Programs Grid - 4 columns --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                @foreach($sections['programs'] as $index => $program)
                @php
                    $isPopular = $program->extra('is_popular', false);
                    $badgeColor = $program->extra('badge_color', 'amber');
                    // Gradient themes per card
                    $gradients = [
                        'from-amber-500/20 via-orange-500/10 to-transparent',
                        'from-blue-500/20 via-indigo-500/10 to-transparent',
                        'from-green-500/20 via-emerald-500/10 to-transparent',
                        'from-red-500/20 via-rose-500/10 to-transparent',
                    ];
                    $iconBgs = ['bg-amber-500/20', 'bg-blue-500/20', 'bg-green-500/20', 'bg-red-500/20'];
                    $iconRings = ['ring-amber-500/30', 'ring-blue-500/30', 'ring-green-500/30', 'ring-red-500/30'];
                    $accentColors = ['text-amber-400', 'text-blue-400', 'text-green-400', 'text-red-400'];
                    $dotColors = ['bg-amber-400', 'bg-blue-400', 'bg-green-400', 'bg-red-400'];
                    $grad = $gradients[$index % 4];
                    $iconBg = $iconBgs[$index % 4];
                    $iconRing = $iconRings[$index % 4];
                    $accent = $accentColors[$index % 4];
                    $dot = $dotColors[$index % 4];
                @endphp
                <div class="group relative bg-slate-800/60 backdrop-blur-sm rounded-2xl overflow-hidden border {{ $isPopular ? 'border-amber-500/50' : 'border-slate-700/40' }} transition-all duration-500 hover:-translate-y-3 hover:shadow-[0_20px_60px_-15px_rgba(245,158,11,0.15)] reveal flex flex-col">
                    {{-- Popular ribbon --}}
                    @if($isPopular)
                    <div class="absolute top-0 right-0 z-20">
                        <div class="bg-gradient-to-r from-red-600 to-red-500 text-white font-bold text-[10px] py-1.5 pl-4 pr-3 rounded-bl-xl uppercase tracking-widest shadow-lg flex items-center gap-1.5">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            Popular
                        </div>
                    </div>
                    @endif

                    {{-- Top gradient icon area --}}
                    @php
                        $programImage = null;
                        if ($program->image && $program->media->isEmpty()) {
                            $programImage = str_starts_with($program->image, 'content/') ? asset('storage/' . $program->image) : asset($program->image);
                        }
                    @endphp
                    <div class="relative h-44 overflow-hidden">
                        @if($program->media->isNotEmpty() || $programImage)
                        {{-- CMS uploaded media --}}
                        <div class="w-full h-full group-hover:scale-110 transition-transform duration-500">
                            <x-media-slideshow :media="$program->media" :fallbackImage="$programImage" roundedClass="" aspectClass="h-full" />
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-800/90 via-slate-800/40 to-transparent pointer-events-none"></div>
                        @else
                        {{-- Fallback: gradient + emoji icon --}}
                        <div class="absolute inset-0 bg-gradient-to-br {{ $grad }}"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-800/90 via-slate-800/30 to-transparent"></div>
                        <div class="absolute inset-0 opacity-[0.03]" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, white 10px, white 11px);"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="{{ $iconBg }} ring-1 {{ $iconRing }} backdrop-blur-sm rounded-2xl w-20 h-20 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                                <span class="text-5xl drop-shadow-lg">{{ $program->icon }}</span>
                            </div>
                        </div>
                        @endif
                        {{-- Age badge --}}
                        <div class="absolute top-3 left-3">
                            <span class="bg-white/10 backdrop-blur-md border border-white/20 text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1.5 rounded-full">{{ $program->extra('age_range', '') }}</span>
                        </div>
                        {{-- Session length badge --}}
                        <div class="absolute bottom-3 left-3">
                            <span class="bg-black/40 backdrop-blur-sm text-white/80 text-[10px] font-medium px-2.5 py-1 rounded-full flex items-center gap-1">
                                <svg class="w-3 h-3 {{ $accent }}" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                                {{ $program->extra('session_length', '') }}
                            </span>
                        </div>
                    </div>

                    {{-- Card body --}}
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-lg font-display font-bold text-white uppercase mb-2 group-hover:{{ $accent }} transition-colors duration-300">{{ $program->title }}</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-5 flex-1">{{ $program->content }}</p>

                        {{-- Features list --}}
                        <div class="space-y-2.5 mb-6">
                            @foreach($program->extra('features', []) as $feature)
                            <div class="flex items-center gap-2.5 text-xs">
                                <span class="w-1.5 h-1.5 {{ $dot }} rounded-full shrink-0"></span>
                                <span class="text-slate-300">{{ $feature }}</span>
                            </div>
                            @endforeach
                        </div>

                        {{-- CTA --}}
                        <div class="pt-4 mt-auto">
                            <a href="{{ route('register.create') }}" class="block text-center {{ $isPopular ? 'bg-gradient-to-r from-amber-500 to-amber-400 hover:from-amber-400 hover:to-amber-300 text-slate-900 shadow-lg shadow-amber-500/20' : 'bg-white/10 hover:bg-white/20 border border-white/10 hover:border-white/30 text-white' }} font-bold py-3 px-6 rounded-xl transition-all duration-300 uppercase text-xs tracking-widest group-hover:shadow-lg">
                                JOIN NOW
                                <svg class="w-3.5 h-3.5 inline ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Why Train With Us - Feature Grid --}}
            <div class="reveal">
                <div class="text-center mb-10">
                    <h3 class="text-2xl md:text-3xl font-display font-bold uppercase text-white">Why Train <span class="text-red-400">With Us?</span></h3>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                    @foreach($sections['features'] as $feature)
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-5 text-center hover:bg-white/10 hover:border-amber-500/30 transition-all duration-300 hover:-translate-y-1">
                        <div class="text-2xl mb-2">{{ $feature->icon }}</div>
                        <h4 class="font-display font-bold text-white text-xs uppercase tracking-wide mb-1">{{ $feature->title }}</h4>
                        <p class="text-slate-500 text-[10px] leading-relaxed">{{ $feature->content }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- CLUBS / LOCATIONS --}}
    <section id="clubs" class="py-24 bg-[#166534] relative border-t border-green-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 reveal">
                <div class="inline-flex items-center bg-green-500/20 text-green-100 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">
                    <span class="w-2 h-2 bg-amber-400 rounded-full mr-2 animate-pulse"></span> Our Locations
                </div>
                <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-6 uppercase tracking-tight">
                    Affiliated <span class="text-amber-400">Clubs</span>
                </h2>
                <p class="text-green-100 max-w-2xl mx-auto text-lg">
                    Join any of our registered Mukusho Karate Kenya clubs spreading across Nyeri, Murang'a, Nanyuki, and surrounding regions. We are always expanding.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($sections['clubs'] as $club)
                <div class="bg-green-800/50 rounded-2xl p-6 shadow-lg border border-green-700/50 hover:bg-green-800 hover:border-amber-400/50 hover:-translate-y-1 transition-all duration-300 reveal group">
                    <div class="w-12 h-12 bg-green-700 rounded-xl flex items-center justify-center mb-5 group-hover:bg-amber-400 transition-colors duration-300">
                        <svg class="w-6 h-6 text-green-300 group-hover:text-green-900 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-display font-bold text-white mb-2 uppercase">{{ $club->title }}</h3>
                    <p class="text-green-200 text-sm font-medium mb-1 line-clamp-1 truncate">{{ $club->content }}</p>
                    <p class="text-amber-400 text-[11px] font-bold uppercase tracking-wider">{{ $club->extra('county', '') }}</p>
                </div>
                @endforeach
            </div>

            {{-- WhatsApp Contact for Clubs --}}
            <div class="mt-14 text-center reveal">
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
            <div class="text-center mb-16 reveal">
                <div class="inline-flex items-center bg-green-50 text-green-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">
                    <span class="w-1.5 h-1.5 bg-green-600 rounded-full mr-2"></span> Meet Our Coaching Team
                </div>
                <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 mb-4 uppercase leading-tight">
                    Learn From The <span class="text-green-700">Best</span>
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
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 overflow-hidden hover:shadow-xl transition-all duration-300 reveal flex flex-col text-center">
                    {{-- Card Media --}}
                    <div class="h-64 w-full overflow-hidden relative bg-slate-100 flex items-center justify-center">
                        <x-media-slideshow :media="$coach->media" :fallbackImage="$coachFallback" roundedClass="" aspectClass="h-full w-full object-cover object-top" />
                    </div>
                    
                    {{-- Card Content --}}
                    <div class="p-8 flex-grow flex flex-col items-center">
                        <div class="inline-block bg-green-50 text-green-700 rounded-full px-4 py-1.5 text-xs font-bold uppercase tracking-wider mb-4 border border-green-100">{{ $coach->subtitle ?? 'Instructor' }}</div>
                        
                        <h3 class="text-xl font-display font-bold text-slate-900 uppercase mb-4 leading-tight">
                            {!! nl2br(e($coach->title)) !!}
                        </h3>
                        
                        <div class="text-slate-600 text-[14px] leading-relaxed mb-6">
                            @if($coach->content)
                                {{ \Illuminate\Support\Str::words(strip_tags($coach->content), 12, '...') }}
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
                        @else
                            <div class="mt-auto"></div>
                        @endif

                        <div class="flex flex-col gap-2 w-full pt-4 border-t border-slate-100">
                            {{-- Social Media Icons --}}
                            <div class="flex justify-center items-center gap-4 mb-2">
                                @if($coach->extra('facebook'))
                                <a href="{{ $coach->extra('facebook') }}" target="_blank" class="text-[#1877F2] hover:opacity-80 transition-opacity" title="Facebook">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                @endif
                                @if($coach->extra('instagram'))
                                <a href="{{ $coach->extra('instagram') }}" target="_blank" class="text-[#E1306C] hover:opacity-80 transition-opacity" title="Instagram">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                                </a>
                                @endif
                                @if($coach->extra('tiktok'))
                                <a href="{{ $coach->extra('tiktok') }}" target="_blank" class="text-black hover:opacity-80 transition-opacity" title="TikTok">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 448 512"><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"/></svg>
                                </a>
                                @endif
                                @if($coach->extra('whatsapp'))
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $coach->extra('whatsapp')) }}" target="_blank" class="text-[#25D366] hover:opacity-80 transition-opacity" title="WhatsApp">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.489-1.761-1.662-2.06-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M2.004 22l1.352-4.968A9.892 9.892 0 011.95 11.95a9.96 9.96 0 1120.015 0 9.96 9.96 0 01-14.71 8.647L2.004 22zm5.446-2.583a8.172 8.172 0 109.916-12.8 8.17 8.17 0 00-11.416 1.492 8.118 8.118 0 00-1.085 4.39A8.106 8.106 0 005.12 17.1l-1.01 3.71 3.784-1.011z"/></svg>
                                </a>
                                @endif
                            </div>

                            <a href="{{ route('instructor.show', $coach->id) }}" class="inline-flex items-center justify-center gap-2 text-slate-700 font-bold hover:text-red-600 transition-colors uppercase text-sm tracking-widest group">
                                Read Full Profile
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </section>

    {{-- ACHIEVEMENTS --}}
    <section id="achievements" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <div class="inline-flex items-center bg-amber-50 text-amber-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">🏆 Proven Results</div>
                <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 uppercase">Our <span class="text-red-700">Champions</span> & Achievements</h2>
                <p class="text-slate-600 max-w-2xl mx-auto text-lg mt-4">Mukusho Karate Kenya athletes have represented the club with distinction at national and international competitions, building a legacy of excellence.</p>
            </div>

            {{-- Stats Banner --}}
            <div class="grid grid-cols-3 gap-2 sm:gap-4 mb-12 reveal">
                <div class="bg-slate-900 rounded-2xl p-4 sm:p-8 text-center text-white shadow-lg">
                    <div class="font-display text-2xl sm:text-4xl md:text-5xl font-bold text-white">50+</div>
                    <div class="text-slate-300 text-xs sm:text-sm font-medium mt-2 uppercase tracking-wider">Active Athletes</div>
                </div>
                <div class="bg-amber-500 rounded-2xl p-4 sm:p-8 text-center text-white shadow-lg">
                    <div class="font-display text-2xl sm:text-4xl md:text-5xl font-bold text-white">3</div>
                    <div class="text-amber-50 text-xs sm:text-sm font-medium mt-2 uppercase tracking-wider">Training Locations</div>
                </div>
                <div class="bg-red-700 rounded-2xl p-4 sm:p-8 text-center text-white shadow-lg">
                    <div class="font-display text-2xl sm:text-4xl md:text-5xl font-bold text-white">10+</div>
                    <div class="text-red-100 text-xs sm:text-sm font-medium mt-2 uppercase tracking-wider">National Events</div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $achievements = $sections['achievements'] ?? collect();
                @endphp

                @forelse($achievements->take(3) as $ach)
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 reveal flex flex-col h-full group">
                    <div class="relative h-56 overflow-hidden">
                        @php
                            $achFallback = null;
                            if ($ach->image && $ach->media->isEmpty()) {
                                $achFallback = str_starts_with($ach->image, 'content/') ? asset('storage/' . $ach->image) : asset($ach->image);
                            }
                        @endphp
                        @if($ach->media->isNotEmpty() || $achFallback)
                            <div class="w-full h-full group-hover:scale-105 transition-transform duration-500">
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
                        <h4 class="font-display font-bold text-slate-900 text-lg uppercase mb-1">{{ $ach->title }}</h4>
                        @if($ach->subtitle)
                        <p class="text-sm text-amber-600 font-medium mb-3">{{ $ach->subtitle }}</p>
                        @endif
                        <p class="text-slate-600 text-sm leading-relaxed">{!! Str::limit($ach->content, 150) !!}</p>
                    </div>
                </div>
                @empty
                {{-- Fallback: 3 rich static cards --}}
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 reveal flex flex-col h-full">
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
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 reveal flex flex-col h-full">
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
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 reveal flex flex-col h-full">
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

            {{-- View All Link --}}
            <div class="text-center mt-12 reveal">
                <a href="{{ route('about') }}#interviews" style="display: inline-flex; align-items: center; gap: 8px; background: linear-gradient(135deg, #B91C1C, #EF4444); color: white; padding: 14px 32px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 4px 15px rgba(185,28,28,0.3); transition: all 0.3s;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 25px rgba(185,28,28,0.4)'" onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 15px rgba(185,28,28,0.3)'">
                    View All Interviews & Achievements
                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- VALUES --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <div class="inline-flex items-center bg-red-50 text-red-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">The Principles We Live By</div>
                <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 uppercase">Our <span class="text-red-700">Values</span></h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($sections['values'] as $value)
                <div class="text-center p-6 bg-slate-50 rounded-2xl border border-slate-100 hover:border-red-200 hover:bg-red-50/30 transition-all duration-300 reveal">
                    @if($value->media && $value->media->count() > 0)
                        @php $vMedia = $value->media->first(); @endphp
                        @if($vMedia->isImage())
                            <img src="{{ $vMedia->url }}" alt="{{ $value->title }}" class="w-12 h-12 object-cover rounded-lg mx-auto mb-3">
                        @else
                            <video src="{{ $vMedia->url }}" class="w-12 h-12 object-cover rounded-lg mx-auto mb-3" muted loop autoplay playsinline></video>
                        @endif
                    @else
                        <div class="text-3xl mb-3">{!! $value->icon !!}</div>
                    @endif
                    <h4 class="font-display font-bold text-slate-900 uppercase text-sm mb-1">{{ $value->title }}</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">{{ $value->content }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- WHY CHOOSE MUKUSHO --}}
    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <div class="inline-flex items-center bg-red-50 text-red-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">
                    <span class="w-1.5 h-1.5 bg-red-600 rounded-full mr-2"></span> Why Train With Us
                </div>
                <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 mb-4 uppercase leading-tight">
                    Why Choose <span class="text-red-700">Mukusho Karate Kenya?</span>
                </h2>
                <p class="text-slate-600 max-w-2xl mx-auto text-lg">More than a dojo — we're a community dedicated to developing complete martial artists and building character that lasts a lifetime.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($sections['features'] as $i => $feature)
                @php
                    $fColor = $i % 2 === 0 ? 'red' : 'amber';
                    $hasMedia = $feature->media && $feature->media->count() > 0;
                    $fMedia = $hasMedia ? $feature->media->first() : null;
                @endphp
                <div class="group rounded-2xl border border-slate-100 hover:shadow-xl transition-all duration-300 reveal relative overflow-hidden h-72 flex flex-col justify-end {{ $hasMedia ? '' : 'bg-white hover:border-' . $fColor . '-200' }}">
                    @if($hasMedia)
                        {{-- Full-cover background media --}}
                        @if($fMedia->isImage())
                            <img src="{{ $fMedia->url }}" alt="{{ $feature->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @else
                            <video src="{{ $fMedia->url }}" class="absolute inset-0 w-full h-full object-cover" muted loop autoplay playsinline></video>
                        @endif
                        {{-- Dark gradient overlay for text readability --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        {{-- Text over media --}}
                        <div class="relative z-10 p-8">
                            <h4 class="font-display font-bold text-white uppercase text-lg mb-2 drop-shadow-lg">{{ $feature->title }}</h4>
                            <p class="text-white/90 text-sm leading-relaxed drop-shadow">{{ $feature->content }}</p>
                        </div>
                    @else
                        {{-- No media — icon card --}}
                        <div class="absolute top-0 right-0 w-24 h-24 bg-{{ $fColor }}-50 rounded-bl-[80px] -z-0 group-hover:w-32 group-hover:h-32 transition-all duration-500"></div>
                        <div class="relative z-10 p-8 flex flex-col justify-center h-full">
                            <div class="w-14 h-14 bg-{{ $fColor }}-50 text-{{ $fColor }}-700 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                                <span class="text-2xl">{!! $feature->icon !!}</span>
                            </div>
                            <h4 class="font-display font-bold text-slate-900 uppercase text-lg mb-3">{{ $feature->title }}</h4>
                            <p class="text-slate-600 text-sm leading-relaxed">{{ $feature->content }}</p>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- EVENTS & COMPETITIONS --}}
    <section id="events" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <div class="inline-flex items-center bg-amber-50 text-amber-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">
                    <span class="w-1.5 h-1.5 bg-amber-500 rounded-full mr-2"></span> Events & Calendar
                </div>
                <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 mb-4 uppercase leading-tight">
                    Upcoming <span class="text-red-700">Events</span>
                </h2>
                <p class="text-slate-600 max-w-2xl mx-auto text-lg">Mark your calendar for these upcoming competitions, gradings, and special events.</p>
            </div>

            {{-- Events Data --}}
            @php
                $eventItems = $sections['events'];

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
            <div class="mb-20">
                <div class="flex items-center gap-3 justify-center mb-10 reveal">
                    <div class="h-px flex-1 max-w-[80px] bg-amber-300"></div>
                    <h3 class="text-2xl md:text-3xl font-display font-bold text-slate-900">Upcoming Events</h3>
                    <div class="h-px flex-1 max-w-[80px] bg-amber-300"></div>
                </div>

                @if($upcomingEvents->isEmpty())
                    <div class="text-center py-16 bg-white rounded-2xl border border-dashed border-slate-200 reveal">
                        <div class="text-4xl mb-3">📅</div>
                        <p class="text-slate-400 text-lg font-medium">No upcoming events yet</p>
                        <p class="text-slate-300 text-sm mt-1">Check back soon for new competitions & gradings</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 {{ $upcomingEvents->take(3)->count() === 1 ? 'max-w-lg mx-auto' : 'md:grid-cols-2 lg:grid-cols-3' }} gap-8">
                        @foreach($upcomingEvents->take(3) as $event)
                        <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-slate-100 reveal group">
                            {{-- Image / Media Slideshow / Placeholder --}}
                            <div class="relative h-56 overflow-hidden">
                                @if($event->media && $event->media->count() > 0)
                                    @if($event->media->count() > 1)
                                    {{-- Mini slideshow for multiple media --}}
                                    <div x-data="{ cs: 0, total: {{ $event->media->count() }} }" class="w-full h-full relative">
                                        @foreach($event->media as $mi => $em)
                                            <div x-show="cs === {{ $mi }}" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="absolute inset-0">
                                                @if($em->isImage())
                                                    <img src="{{ $em->url }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                                                @else
                                                    <video class="w-full h-full object-cover bg-black" muted playsinline>
                                                        <source src="{{ $em->url }}" type="video/mp4">
                                                    </video>
                                                @endif
                                            </div>
                                        @endforeach
                                        <button @click="cs = (cs - 1 + total) % total" class="absolute left-2 top-1/2 -translate-y-1/2 z-10 w-8 h-8 bg-black/40 hover:bg-black/60 rounded-full flex items-center justify-center text-white">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                        </button>
                                        <button @click="cs = (cs + 1) % total" class="absolute right-2 top-1/2 -translate-y-1/2 z-10 w-8 h-8 bg-black/40 hover:bg-black/60 rounded-full flex items-center justify-center text-white">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                        </button>
                                        <div class="absolute bottom-2 left-1/2 -translate-x-1/2 z-10 flex gap-1">
                                            @foreach($event->media as $di => $dm)
                                            <button @click="cs = {{ $di }}" class="w-2 h-2 rounded-full transition-all" :class="cs === {{ $di }} ? 'bg-white scale-125' : 'bg-white/50'"></button>
                                            @endforeach
                                        </div>
                                    </div>
                                    @else
                                    {{-- Single media item --}}
                                    @php $singleMedia = $event->media->first(); @endphp
                                    @if($singleMedia->isImage())
                                        <img src="{{ $singleMedia->url }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <video class="w-full h-full object-cover bg-black" muted playsinline>
                                            <source src="{{ $singleMedia->url }}" type="video/mp4">
                                        </video>
                                    @endif
                                    @endif
                                @elseif($event->image)
                                    @if(str_starts_with($event->image, 'content/'))
                                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <img src="{{ asset($event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @endif
                                    <div class="w-full h-full bg-gradient-to-br from-{{ $event->extra('color', 'amber') === 'red' ? 'red-800' : 'amber-600' }} via-{{ $event->extra('color', 'amber') === 'red' ? 'red-700' : 'amber-500' }} to-slate-900 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                @endif
                                {{-- Date badge overlay --}}
                                <div class="absolute top-4 left-4 bg-red-700 text-white rounded-lg px-3 py-2 text-center shadow-lg">
                                    <div class="text-xl font-display font-bold leading-none">{{ $event->extra('day', '') }}</div>
                                    <div class="text-[10px] uppercase tracking-wider font-semibold opacity-90">{{ $event->extra('date', '') }}</div>
                                </div>
                                {{-- Event type badge --}}
                                <div class="absolute bottom-4 left-4">
                                    <span class="bg-{{ $event->extra('color', 'amber') === 'red' ? 'red-600' : 'amber-500' }} text-white text-[11px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-md shadow">{{ $event->extra('type', '') }}</span>
                                </div>
                            </div>
                            {{-- Card body --}}
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

            {{-- RECENT EVENTS --}}
            <div class="mb-20">
                <div class="flex items-center gap-3 justify-center mb-10 reveal">
                    <div class="h-px flex-1 max-w-[80px] bg-slate-300"></div>
                    <h3 class="text-2xl md:text-3xl font-display font-bold text-slate-900">Recent Events</h3>
                    <div class="h-px flex-1 max-w-[80px] bg-slate-300"></div>
                </div>

                @if($pastEvents->isNotEmpty())
                    <div class="grid grid-cols-1 {{ $pastEvents->take(3)->count() === 1 ? 'max-w-lg mx-auto' : 'md:grid-cols-2 lg:grid-cols-3' }} gap-8">
                        @foreach($pastEvents->take(3) as $event)
                        <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-slate-100 reveal group">
                            {{-- Image / Media Slideshow / Placeholder --}}
                            <div class="relative h-56 overflow-hidden">
                                @if($event->media && $event->media->count() > 0)
                                    @if($event->media->count() > 1)
                                    <div x-data="{ cs: 0, total: {{ $event->media->count() }} }" class="w-full h-full relative">
                                        @foreach($event->media as $mi => $em)
                                            <div x-show="cs === {{ $mi }}" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="absolute inset-0">
                                                @if($em->isImage())
                                                    <img src="{{ $em->url }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                                                @else
                                                    <video class="w-full h-full object-cover bg-black" muted playsinline>
                                                        <source src="{{ $em->url }}" type="video/mp4">
                                                    </video>
                                                @endif
                                            </div>
                                        @endforeach
                                        <button @click="cs = (cs - 1 + total) % total" class="absolute left-2 top-1/2 -translate-y-1/2 z-10 w-8 h-8 bg-black/40 hover:bg-black/60 rounded-full flex items-center justify-center text-white">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                        </button>
                                        <button @click="cs = (cs + 1) % total" class="absolute right-2 top-1/2 -translate-y-1/2 z-10 w-8 h-8 bg-black/40 hover:bg-black/60 rounded-full flex items-center justify-center text-white">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                        </button>
                                        <div class="absolute bottom-2 left-1/2 -translate-x-1/2 z-10 flex gap-1">
                                            @foreach($event->media as $di => $dm)
                                            <button @click="cs = {{ $di }}" class="w-2 h-2 rounded-full transition-all" :class="cs === {{ $di }} ? 'bg-white scale-125' : 'bg-white/50'"></button>
                                            @endforeach
                                        </div>
                                    </div>
                                    @else
                                    {{-- Single media item --}}
                                    @php $singleMedia = $event->media->first(); @endphp
                                    @if($singleMedia->isImage())
                                        <img src="{{ $singleMedia->url }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <video class="w-full h-full object-cover bg-black" muted playsinline>
                                            <source src="{{ $singleMedia->url }}" type="video/mp4">
                                        </video>
                                    @endif
                                    @endif
                                @elseif($event->image)
                                    @if(str_starts_with($event->image, 'content/'))
                                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <img src="{{ asset($event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @endif
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-slate-700 via-slate-600 to-slate-800 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                @endif
                                {{-- Date badge overlay --}}
                                <div class="absolute top-4 left-4 bg-slate-800/90 text-white rounded-lg px-3 py-2 text-center shadow-lg">
                                    <div class="text-xl font-display font-bold leading-none">{{ $event->extra('day', '') }}</div>
                                    <div class="text-[10px] uppercase tracking-wider font-semibold opacity-90">{{ $event->extra('date', '') }}</div>
                                </div>
                                {{-- Event type badge --}}
                                <div class="absolute bottom-4 left-4">
                                    <span class="bg-slate-700 text-white text-[11px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-md shadow">{{ $event->extra('type', '') }}</span>
                                </div>
                            </div>
                            {{-- Card body --}}
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
                @else
                    <div class="text-center py-12 reveal">
                        <p class="text-slate-400 text-lg">No past events to display.</p>
                    </div>
                @endif
            </div>

            {{-- Event Types --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 reveal">
                <div class="text-center p-8 bg-gradient-to-b from-red-50 to-white rounded-2xl border border-red-100 hover:shadow-lg hover:shadow-red-900/5 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-red-700 text-white rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-red-700/20">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>
                    </div>
                    <h4 class="font-display font-bold text-slate-900 uppercase mb-3 text-lg">Tournaments</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">Local and national competitions under KKF rules. Individual and team categories in Kata and Kumite.</p>
                </div>
                <div class="text-center p-8 bg-gradient-to-b from-amber-50 to-white rounded-2xl border border-amber-100 hover:shadow-lg hover:shadow-amber-900/5 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-amber-500 text-white rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-amber-500/20">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                    </div>
                    <h4 class="font-display font-bold text-slate-900 uppercase mb-3 text-lg">Belt Gradings</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">Biannual grading examinations to test and promote students. Conducted by certified examiners under strict protocols.</p>
                </div>
                <div class="text-center p-8 bg-gradient-to-b from-slate-50 to-white rounded-2xl border border-slate-200 hover:shadow-lg hover:shadow-slate-900/5 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-slate-800 text-white rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-slate-800/20">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h4 class="font-display font-bold text-slate-900 uppercase mb-3 text-lg">Seminars & Camps</h4>
                    <p class="text-slate-600 text-sm leading-relaxed">Special training seminars with guest instructors and intensive training camps for competition preparation and skill advancement.</p>
                </div>
            </div>

            {{-- View All Events Link --}}
            <div class="text-center mt-12 reveal">
                <a href="{{ route('events') }}" style="display: inline-flex; align-items: center; gap: 8px; background: linear-gradient(135deg, #0f172a, #334155); color: white; padding: 14px 32px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 4px 15px rgba(15,23,42,0.3); transition: all 0.3s;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 25px rgba(15,23,42,0.4)'" onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 15px rgba(15,23,42,0.3)'">
                    View All Events
                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- BELT PROGRESSION --}}
    <section class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 reveal">
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-1.5 text-sm font-semibold mb-6 text-red-400">Your Path Forward</div>
                <h2 class="text-4xl md:text-5xl font-display font-bold uppercase">Belt <span class="text-red-400">Progression</span></h2>
                <p class="text-slate-400 max-w-2xl mx-auto text-lg mt-4">Every journey begins with a white belt. Here's the path from beginner to black belt mastery.</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-10 gap-3 reveal">
                @php
                $belts = [
                    ['name' => 'White', 'jp' => '10th Kyu', 'color' => '#FFFFFF', 'text' => 'text-slate-900', 'bg' => 'bg-white', 'border' => 'border-slate-300'],
                    ['name' => 'Yellow', 'jp' => '9th Kyu', 'color' => '#FBBF24', 'text' => 'text-slate-900', 'bg' => 'bg-amber-400', 'border' => 'border-amber-500'],
                    ['name' => 'Orange', 'jp' => '8th Kyu', 'color' => '#F97316', 'text' => 'text-white', 'bg' => 'bg-orange-500', 'border' => 'border-orange-600'],
                    ['name' => 'Green', 'jp' => '7th Kyu', 'color' => '#22C55E', 'text' => 'text-white', 'bg' => 'bg-green-500', 'border' => 'border-green-600'],
                    ['name' => 'Blue', 'jp' => '6th Kyu', 'color' => '#3B82F6', 'text' => 'text-white', 'bg' => 'bg-blue-500', 'border' => 'border-blue-600'],
                    ['name' => 'Purple', 'jp' => '5th Kyu', 'color' => '#8B5CF6', 'text' => 'text-white', 'bg' => 'bg-violet-500', 'border' => 'border-violet-600'],
                    ['name' => 'Brown 3', 'jp' => '3rd Kyu', 'color' => '#92400E', 'text' => 'text-white', 'bg' => 'bg-amber-800', 'border' => 'border-amber-900'],
                    ['name' => 'Brown 2', 'jp' => '2nd Kyu', 'color' => '#78350F', 'text' => 'text-white', 'bg' => 'bg-amber-900', 'border' => 'border-amber-950'],
                    ['name' => 'Brown 1', 'jp' => '1st Kyu', 'color' => '#451A03', 'text' => 'text-white', 'bg' => 'bg-yellow-950', 'border' => 'border-yellow-950'],
                    ['name' => 'Black', 'jp' => 'Dan', 'color' => '#000000', 'text' => 'text-white', 'bg' => 'bg-black', 'border' => 'border-slate-600'],
                ];
                @endphp
                @foreach($belts as $i => $belt)
                <div class="text-center group">
                    <div class="relative mb-3">
                        <div class="w-full aspect-square {{ $belt['bg'] }} {{ $belt['border'] }} border-2 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <span class="{{ $belt['text'] }} font-display font-bold text-xs uppercase leading-tight text-center px-1">{{ $belt['name'] }}</span>
                        </div>
                        @if($i < count($belts) - 1)
                        <div class="hidden lg:block absolute top-1/2 -right-3 transform -translate-y-1/2">
                            <svg class="w-3 h-3 text-slate-600" fill="currentColor" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
                        </div>
                        @endif
                    </div>
                    <p class="text-slate-400 text-[10px] font-medium uppercase tracking-wider">{{ $belt['jp'] }}</p>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12 reveal">
                <p class="text-slate-500 text-sm mb-4">Belt gradings are held twice a year. Progression depends on skill level, training attendance, and examiner assessment.</p>
                <a href="#contact" class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-400 text-slate-900 font-bold py-3 px-8 rounded-lg transition-all hover:-translate-y-0.5 uppercase text-sm tracking-wide">
                    Start Your Journey
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- GALLERY / TEAM --}}
    <section id="gallery" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 reveal">
                <div class="inline-flex items-center bg-red-50 text-red-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">
                    <span class="w-1.5 h-1.5 bg-red-600 rounded-full mr-2"></span> Inside The Dojo
                </div>
                <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 mb-4 uppercase leading-tight">
                    Life At <span class="text-red-700">Mukusho Karate Kenya</span>
                </h2>
                <p class="text-slate-600 max-w-2xl mx-auto text-lg">From training sessions to championship podiums — our club in action.</p>
            </div>

            {{-- Collect media from the dedicated Gallery section --}}
            @php
                $allMedia = collect();
                foreach (($sections['gallery'] ?? collect()) as $item) {
                    if ($item->media && $item->media->count() > 0) {
                        foreach ($item->media as $m) {
                            $allMedia->push($m);
                        }
                    }
                }
                $galleryItems = $allMedia->values();
            @endphp

            @if($galleryItems->count() > 0)
            {{-- ═══ BENTO GALLERY GRID ═══ --}}
            <div class="reveal">
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 sm:gap-4 auto-rows-[150px] sm:auto-rows-[200px] md:auto-rows-[240px]">
                    @foreach($galleryItems->take(12) as $idx => $media)
                    @php
                        // First item: large hero spanning left column, 2 rows tall
                        // Every 3rd row first item (idx 5, 8...): spans 2 cols for variety
                        if ($idx === 0) {
                            $spanClass = 'row-span-2';
                        } elseif ($idx === 5 || $idx === 8) {
                            $spanClass = 'col-span-2';
                        } else {
                            $spanClass = '';
                        }
                    @endphp
                    <div class="relative overflow-hidden rounded-2xl group {{ $spanClass }} bg-slate-900"
                         x-data="{ playing: false, muted: true }">
                        @if($media->isImage())
                            {{-- IMAGE --}}
                            <img src="{{ $media->url }}"
                                 alt="{{ $media->original_name ?? 'Gallery image' }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                 loading="lazy">
                            {{-- Subtle hover overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        @else
                            {{-- VIDEO — auto-plays on viewport entry --}}
                            <video class="w-full h-full object-cover"
                                   x-ref="vid"
                                   :muted="muted"
                                   loop playsinline
                                   x-intersect:enter="$refs.vid.play(); playing = true"
                                   x-intersect:leave="$refs.vid.pause(); playing = false">
                                <source src="{{ $media->url }}" type="video/mp4">
                            </video>
                            {{-- Video controls overlay --}}
                            <div class="absolute inset-0 flex items-center justify-center">
                                {{-- Play/Pause button --}}
                                <button @click.stop="
                                    if ($refs.vid.paused) { $refs.vid.play(); playing = true; }
                                    else { $refs.vid.pause(); playing = false; }
                                " class="w-14 h-14 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center text-white hover:bg-white/30 transition-all opacity-0 group-hover:opacity-100"
                                   :class="!playing && 'opacity-100'">
                                    <template x-if="!playing">
                                        <svg class="w-6 h-6 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </template>
                                    <template x-if="playing">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 9v6m4-6v6"/></svg>
                                    </template>
                                </button>
                            </div>
                            {{-- Mute toggle (bottom-right) --}}
                            <button @click.stop="muted = !muted; $refs.vid.muted = muted"
                                    class="absolute bottom-3 right-3 w-8 h-8 rounded-full bg-black/50 backdrop-blur-sm flex items-center justify-center text-white hover:bg-black/70 transition-all opacity-0 group-hover:opacity-100 z-10">
                                <template x-if="muted">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"/></svg>
                                </template>
                                <template x-if="!muted">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072M18.364 5.636a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/></svg>
                                </template>
                            </button>
                            {{-- Video badge --}}
                            <div class="absolute top-3 left-3 z-10">
                                <span class="bg-red-600/90 text-white text-[9px] font-bold px-2 py-1 rounded-full uppercase backdrop-blur-sm flex items-center gap-1">
                                    <svg class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    Video
                                </span>
                            </div>
                        @endif
                    </div>
                    @endforeach
                </div>

                {{-- View count + Load more hint --}}
                @if($galleryItems->count() > 12)
                <div class="text-center mt-6">
                    <p class="text-slate-400 text-sm">Showing 12 of {{ $galleryItems->count() }} — upload more via the CMS</p>
                </div>
                @endif
            </div>

            @else
                {{-- Empty state when no CMS media exists --}}
                <div class="text-center py-16 bg-slate-50 rounded-2xl border border-dashed border-slate-200 reveal">
                    <div class="text-5xl mb-4">📸</div>
                    <p class="text-slate-400 text-lg font-medium">Gallery coming soon</p>
                    <p class="text-slate-300 text-sm mt-1">Upload photos and videos through the CMS to populate the gallery.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- SCHEDULE --}}
    <section id="schedule" class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 reveal">
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-1.5 text-sm font-semibold mb-6 text-red-400">Training Schedule</div>
                <h2 class="text-4xl md:text-5xl font-display font-bold uppercase">When We <span class="text-red-400">Train</span></h2>
            </div>
            <div class="bg-slate-800/60 backdrop-blur-sm rounded-2xl border border-slate-700/50 overflow-hidden reveal">
                <div class="grid grid-cols-1 divide-y divide-slate-700/50">
                    @foreach($sections['schedule'] as $session)
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-1 sm:gap-4 p-4 sm:p-5 hover:bg-slate-700/30 transition-colors {{ !$session->extra('active', true) ? 'opacity-50' : '' }}">
                        <div class="font-display font-bold text-base sm:text-lg uppercase {{ $session->extra('active', true) ? 'text-red-400' : 'text-slate-500' }}">{{ $session->title }}</div>
                        <div class="text-slate-300 font-medium text-sm sm:text-base">{{ $session->subtitle }}</div>
                        <div class="text-slate-400 text-sm">{{ $session->content }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="text-center mt-8 reveal">
                <p class="text-slate-400 text-sm">Location: Cathedral Center, Nyeri County</p>
            </div>
        </div>
    </section>


    {{-- FAQ --}}
    <section id="faq" class="py-24 bg-slate-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <div class="inline-flex items-center bg-red-50 text-red-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-6">Common Questions</div>
                <h2 class="text-4xl md:text-5xl font-display font-bold text-slate-900 uppercase">Your Questions <span class="text-red-700">Answered</span></h2>
            </div>
            <div class="space-y-4 reveal">
                @foreach($sections['faqs'] as $faq)
                <div class="bg-white rounded-xl border border-slate-200 overflow-hidden faq-item">
                    <button class="faq-toggle w-full text-left px-6 py-5 flex items-center justify-between focus:outline-none group" aria-expanded="false">
                        <span class="font-display font-bold text-slate-900 uppercase text-sm pr-4">{{ $faq->title }}</span>
                        <svg class="w-5 h-5 text-red-600 shrink-0 transition-transform duration-300 faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-answer">
                        <div class="px-6 pb-5 text-slate-600 leading-relaxed text-sm">{{ $faq->content }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CONTACT --}}
    <section id="contact" class="py-24 bg-gradient-to-br from-[#0a0a0a] via-slate-900 to-red-900 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-red-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-red-500/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-amber-500/5 rounded-full blur-3xl"></div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="reveal">
                    <div class="inline-flex items-center bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-1.5 text-sm font-semibold mb-6 text-red-300">
                        <span class="w-1.5 h-1.5 bg-red-400 rounded-full mr-2 animate-pulse"></span> Free Trial Available
                    </div>
                    <h2 class="text-4xl md:text-5xl font-display font-bold uppercase mb-6 leading-tight">Ready to Begin<br>Your <span class="text-amber-300">Journey?</span></h2>
                    <p class="text-white/70 text-lg leading-relaxed mb-10">Your first trial class is <strong class="text-white">absolutely free</strong>. Come and experience authentic karate training. No obligation, no pressure &mdash; just step onto the mat.</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start gap-4 bg-white/5 backdrop-blur-sm rounded-xl p-4 border border-white/10 hover:border-red-400/30 transition-colors">
                            <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <div class="font-display font-bold text-white uppercase text-sm tracking-wide mb-1">Locations</div>
                                <div class="text-white/60 text-sm leading-relaxed">Othaya Catholic Parish Hall, Nyeri<br>ACK St. James Cathedral, Murang'a &bull; Nanyuki</div>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 bg-white/5 backdrop-blur-sm rounded-xl p-4 border border-white/10 hover:border-amber-400/30 transition-colors">
                            <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <div class="font-display font-bold text-white uppercase text-sm tracking-wide mb-1">Training Times</div>
                                <div class="text-white/60 text-sm">Monday &ndash; Thursday: 5:30 PM &ndash; 7:30 PM</div>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 bg-white/5 backdrop-blur-sm rounded-xl p-4 border border-white/10 hover:border-red-400/30 transition-colors">
                            <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <div class="font-display font-bold text-white uppercase text-sm tracking-wide mb-1">Contact Sensei</div>
                                <div class="text-white/60 text-sm">Benard Kihachu: <a href="tel:+254724216488" class="text-amber-300 hover:text-amber-200 hover:underline font-semibold">0724 216 488</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-8 text-slate-800 shadow-2xl reveal relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-red-600 via-amber-400 to-red-500"></div>
                    <h3 class="font-display font-bold text-2xl text-slate-900 uppercase mb-6">Get Your Free Trial</h3>

                    {{-- Success Message --}}
                    @if(session('trial_success'))
                    <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3">
                        <svg class="w-5 h-5 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-green-800 text-sm font-medium">{{ session('trial_success') }}</p>
                    </div>
                    @if(session('trial_notify'))
                    @php
                        $tn = session('trial_notify');
                        $trialMsg = "🥋 *FREE TRIAL REQUEST*\n\n";
                        $trialMsg .= "👤 *Name:* {$tn['name']}\n";
                        $trialMsg .= "📞 *Phone:* {$tn['phone']}\n";
                        $trialMsg .= "🎯 *Program:* {$tn['program']}\n";
                        $trialMsg .= "📅 *Date:* " . now()->format('d M Y, h:i A') . "\n\n";
                        $trialMsg .= "Please contact me about a free trial class at Mukusho Karate Kenya!";
                        $trialWaUrl = "https://wa.me/254743909457?text=" . urlencode($trialMsg);
                    @endphp
                    <a href="{{ $trialWaUrl }}" target="_blank"
                       class="mb-4 flex items-center justify-center gap-2 bg-[#25D366] hover:bg-[#20bd5a] text-white font-bold py-3 px-6 rounded-xl text-sm tracking-wide transition-all w-full">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Tap to Notify Sensei via WhatsApp
                    </a>
                    @endif
                    @endif

                    {{-- Validation Errors --}}
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

    {{-- FOOTER --}}
    <footer class="relative text-white py-16 border-t-4 border-green-600 overflow-hidden bg-green-900">
        {{-- Green glow accents --}}
        <div class="absolute top-0 left-0 w-96 h-96 bg-green-500/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-green-500/20 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="Mukusho Karate Kenya Logo" class="h-14 w-auto rounded-full ring-2 ring-white/50">
                        <div class="font-display font-bold text-xl tracking-wider uppercase leading-tight">
                            <span class="text-white">MUKUSHO</span>
                            <span class="text-green-300 text-xs tracking-[0.25em] ml-2 font-bold">KARATE KENYA</span>
                        </div>
                    </div>
                    <p class="text-white font-medium leading-relaxed mb-6 max-w-sm opacity-90">"Empowering every child with the greatness within them through confidence, discipline, and teamwork." Based in Nyeri with branches in Nanyuki and Murang'a.</p>
                    <div class="flex gap-4 text-white">
                        <a href="https://www.facebook.com/mukushomartials/" target="_blank" class="w-12 h-12 bg-white hover:scale-110 rounded-xl flex items-center justify-center transition-transform shadow-lg" aria-label="Facebook">
                            <svg class="w-7 h-7 text-[#1877F2]" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/></svg>
                        </a>
                        <a href="#" target="_blank" class="w-12 h-12 bg-white hover:scale-110 rounded-xl flex items-center justify-center transition-transform shadow-lg" aria-label="Instagram">
                            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none"><rect width="24" height="24" rx="5" fill="none"/><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C9.282 2 8.943 2.011 7.828 2.063C6.715 2.114 5.955 2.274 5.295 2.531C4.613 2.796 4.027 3.16 3.447 3.742C2.866 4.324 2.501 4.909 2.236 5.59C1.979 6.25 1.82 7.011 1.769 8.125C1.718 9.24 1.706 9.578 1.706 12.296C1.706 15.014 1.718 15.353 1.769 16.467C1.82 17.581 1.979 18.342 2.236 19.001C2.501 19.683 2.866 20.268 3.447 20.85C4.027 21.432 4.613 21.796 5.295 22.061C5.955 22.318 6.715 22.478 7.828 22.529C8.943 22.58 9.282 22.592 12 22.592C14.718 22.592 15.057 22.58 16.172 22.529C17.285 22.478 18.045 22.318 18.705 22.061C19.387 21.796 19.973 21.432 20.553 20.85C21.134 20.268 21.499 19.683 21.764 19.001C22.021 18.342 22.18 17.581 22.231 16.467C22.282 15.353 22.294 15.014 22.294 12.296C22.294 9.578 22.282 9.24 22.231 8.125C22.18 7.011 22.021 6.25 21.764 5.59C21.499 4.909 21.134 4.324 20.553 3.742C19.973 3.16 19.387 2.796 18.705 2.531C18.045 2.274 17.285 2.114 16.172 2.063C15.057 2.011 14.718 2 12 2ZM12 4.195C14.673 4.195 14.995 4.205 16.071 4.254C17.062 4.299 17.595 4.453 17.95 4.591C18.421 4.774 18.758 4.995 19.111 5.348C19.465 5.702 19.686 6.039 19.869 6.51C20.007 6.865 20.16 7.398 20.206 8.389C20.255 9.465 20.265 9.787 20.265 12.459C20.265 15.132 20.255 15.454 20.206 16.53C20.16 17.521 20.007 18.054 19.869 18.409C19.686 18.88 19.465 19.217 19.111 19.571C18.758 19.924 18.421 20.145 17.95 20.328C17.595 20.466 17.062 20.62 16.071 20.665C14.995 20.714 14.673 20.724 12 20.724C9.327 20.724 9.005 20.714 7.929 20.665C6.938 20.62 6.405 20.466 6.05 20.328C5.579 20.145 5.242 19.924 4.889 19.571C4.535 19.217 4.314 18.88 4.131 18.409C3.993 18.054 3.84 17.521 3.794 16.53C3.745 15.454 3.735 15.132 3.735 12.459C3.735 9.787 3.745 9.465 3.794 8.389C3.84 7.398 3.993 6.865 4.131 6.51C4.314 6.039 4.535 5.702 4.889 5.348C5.242 4.995 5.579 4.774 6.05 4.591C6.405 4.453 6.938 4.299 7.929 4.254C9.005 4.205 9.327 4.195 12 4.195ZM12 7.026C8.98 7.026 6.533 9.473 6.533 12.493C6.533 15.513 8.98 17.96 12 17.96C15.02 17.96 17.467 15.513 17.467 12.493C17.467 9.473 15.02 7.026 12 7.026ZM12 15.765C10.194 15.765 8.728 14.299 8.728 12.493C8.728 10.686 10.194 9.221 12 9.221C13.806 9.221 15.272 10.686 15.272 12.493C15.272 14.299 13.806 15.765 12 15.765ZM17.491 8.016C17.491 8.825 16.835 9.482 16.026 9.482C15.217 9.482 14.561 8.825 14.561 8.016C14.561 7.208 15.217 6.551 16.026 6.551C16.835 6.551 17.491 7.208 17.491 8.016Z" fill="url(#ig-grad-footer)"/></svg>
                            <svg width="0" height="0">
                              <linearGradient id="ig-grad-footer" x1="2" y1="2" x2="22" y2="22">
                                <stop offset="0%" stop-color="#f09433" />
                                <stop offset="25%" stop-color="#e6683c" />
                                <stop offset="50%" stop-color="#dc2743" />
                                <stop offset="75%" stop-color="#cc2366" />
                                <stop offset="100%" stop-color="#bc1888" />
                              </linearGradient>
                            </svg>
                        </a>
                        <a href="https://www.tiktok.com/@benmukushokarate1" target="_blank" class="w-12 h-12 bg-white hover:scale-110 rounded-xl flex items-center justify-center transition-transform shadow-lg" aria-label="TikTok">
                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.88-2.88 2.89 2.89 0 012.88-2.88c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 00-.79-.05A6.34 6.34 0 003.16 15.2a6.34 6.34 0 0010.86 4.48 6.3 6.3 0 001.87-4.48V8.73a8.3 8.3 0 004.86 1.57V6.85a4.89 4.89 0 01-1.16-.16z"/></svg>
                        </a>
                        <a href="https://www.youtube.com/@mukushokaratekenya7619" target="_blank" class="w-12 h-12 bg-white hover:scale-110 rounded-xl flex items-center justify-center transition-transform shadow-lg" aria-label="YouTube">
                            <svg class="w-7 h-7 text-[#FF0000]" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                        <a href="https://wa.me/254724216488" class="w-12 h-12 bg-white hover:scale-110 rounded-xl flex items-center justify-center transition-transform shadow-lg" aria-label="WhatsApp">
                            <svg class="w-7 h-7 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-display font-bold text-white uppercase text-sm tracking-wider mb-4 border-b border-green-700 pb-2 inline-block">Quick Links</h4>
                    <ul class="grid grid-cols-2 gap-x-4 gap-y-2.5">
                        <li><a href="#about" class="text-white hover:text-green-300 font-medium transition-colors text-sm">About Us</a></li>
                        <li><a href="#events" class="text-white hover:text-green-300 font-medium transition-colors text-sm">Events</a></li>
                        <li><a href="#programs" class="text-white hover:text-green-300 font-medium transition-colors text-sm">Programs</a></li>
                        <li><a href="#gallery" class="text-white hover:text-green-300 font-medium transition-colors text-sm">Gallery</a></li>
                        <li><a href="#instructor" class="text-white hover:text-green-300 font-medium transition-colors text-sm">Our Team</a></li>
                        <li><a href="#schedule" class="text-white hover:text-green-300 font-medium transition-colors text-sm">Schedule</a></li>
                        <li><a href="#achievements" class="text-white hover:text-green-300 font-medium transition-colors text-sm">Achievements</a></li>
                        <li><a href="#faq" class="text-white hover:text-green-300 font-medium transition-colors text-sm">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-display font-bold text-white uppercase text-sm tracking-wider mb-4 border-b border-green-700 pb-2 inline-block">Contact</h4>
                    <ul class="space-y-3 text-sm text-white">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-300 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="font-medium opacity-90">Train in Nyeri, Nanyuki &amp; Murang'a<br>Kenya</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <a href="tel:+254724216488" class="font-bold text-white hover:text-green-300 transition-colors">0724 216 488</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="font-medium opacity-90">Mon-Thu: 5:30-7:30 PM</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-green-700 mt-12 pt-8 flex flex-col xl:flex-row justify-between items-center gap-4 text-center xl:text-left">
                <div class="flex flex-col xl:flex-row items-center gap-2 xl:gap-3 text-white/80 font-medium text-xs">
                    <span>&copy; {{ date('Y') }} Mukusho Karate Kenya.</span>
                    <span class="hidden xl:inline text-green-500/50">|</span>
                    <span class="flex items-center text-white/60">
                        System Developed by Vee DVM &bull; <a href="tel:+254743909457" class="hover:text-green-300 transition-colors mx-1">+254 743 909 457</a>
                        <a href="https://www.tiktok.com/" target="_blank" class="hover:text-white transition-colors ml-1" title="View Developer on TikTok">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.88-2.88 2.89 2.89 0 012.88-2.88c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 00-.79-.05A6.34 6.34 0 003.16 15.2a6.34 6.34 0 0010.86 4.48 6.3 6.3 0 001.87-4.48V8.73a8.3 8.3 0 004.86 1.57V6.85a4.89 4.89 0 01-1.16-.16z"/></svg>
                        </a>
                    </span>
                    <span class="hidden xl:inline text-green-500/50">|</span>
                    <span>All rights reserved.</span>
                </div>
                <p class="text-white/80 font-medium text-xs shrink-0">Affiliated with the Kenya Karate Federation (KKF)</p>
            </div>
        </div>
    </footer>

    {{-- JAVASCRIPT --}}
    @php
        // Gallery is now a static bento grid — no JS slideshow needed
    @endphp
    <script>
    // Hero slideshow Alpine.js component
    function heroSlideshow() {
        return {
            currentSlide: 0,
            totalSlides: {{ $heroMedia->count() }},
            autoPlayInterval: null,
            isVideoPlaying: false,

            startAutoPlay() {
                if (this.totalSlides <= 1) return;
                this.scheduleNext();
                // Play first video if it's a video slide
                this.handleSlideChange();
            },

            scheduleNext() {
                clearInterval(this.autoPlayInterval);
                this.autoPlayInterval = setInterval(() => { this.next(); }, 6000);
            },

            next() {
                this.pauseCurrentVideo();
                this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
                this.handleSlideChange();
                this.scheduleNext();
            },

            goTo(index) {
                if (index === this.currentSlide) return;
                this.pauseCurrentVideo();
                this.currentSlide = index;
                this.handleSlideChange();
                this.scheduleNext();
            },

            handleSlideChange() {
                this.$nextTick(() => {
                    const vid = document.getElementById('hero-vid-' + this.currentSlide);
                    if (vid) {
                        vid.currentTime = 0;
                        vid.play().catch(() => {});
                    }
                });
            },

            pauseCurrentVideo() {
                const vid = document.getElementById('hero-vid-' + this.currentSlide);
                if (vid) vid.pause();
            }
        };
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Mobile menu
        const toggle = document.getElementById('mobile-toggle');
        const menu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        toggle.addEventListener('click', () => {
            menu.classList.toggle('open');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
        document.querySelectorAll('.mobile-link').forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.remove('open');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            });
        });

        // Smooth scroll for anchor links (handles both #section and /#section)
        document.querySelectorAll('a[href^="#"], a[href^="/#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                let href = this.getAttribute('href');
                // If it's /#section and we're on the homepage, scroll smoothly
                if (href.startsWith('/#')) {
                    href = href.substring(1); // Remove leading /
                }
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const offset = 140;
                    const top = target.getBoundingClientRect().top + window.pageYOffset - offset;
                    window.scrollTo({ top, behavior: 'smooth' });
                }
            });
        });

        // Handle hash on page load (e.g. when navigating from subpage to /#achievements)
        if (window.location.hash) {
            setTimeout(function() {
                const target = document.querySelector(window.location.hash);
                if (target) {
                    const offset = 140;
                    const top = target.getBoundingClientRect().top + window.pageYOffset - offset;
                    window.scrollTo({ top, behavior: 'smooth' });
                }
            }, 500);
        }

        // Scroll reveal
        const reveals = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        reveals.forEach(el => revealObserver.observe(el));

        // Counter animation
        const counters = document.querySelectorAll('.counter');
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = +el.dataset.target;
                    const duration = 2000;
                    const start = performance.now();
                    const animate = (now) => {
                        const elapsed = now - start;
                        const progress = Math.min(elapsed / duration, 1);
                        const eased = 1 - Math.pow(1 - progress, 3);
                        el.textContent = Math.round(target * eased);
                        if (progress < 1) requestAnimationFrame(animate);
                    };
                    requestAnimationFrame(animate);
                    counterObserver.unobserve(el);
                }
            });
        }, { threshold: 0.5 });
        counters.forEach(el => counterObserver.observe(el));

        // FAQ accordion
        document.querySelectorAll('.faq-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                const answer = btn.nextElementSibling;
                const chevron = btn.querySelector('.faq-chevron');
                const isOpen = answer.classList.contains('open');
                document.querySelectorAll('.faq-answer').forEach(a => a.classList.remove('open'));
                document.querySelectorAll('.faq-chevron').forEach(c => c.classList.remove('rotate-180'));
                if (!isOpen) {
                    answer.classList.add('open');
                    chevron.classList.add('rotate-180');
                }
            });
        });
    });
    </script>
</body>
</html>
