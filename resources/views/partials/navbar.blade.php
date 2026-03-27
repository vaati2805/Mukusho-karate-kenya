<style>
/* Navbar Specific Styles */
.mobile-menu { max-height: 0; overflow: hidden; transition: max-height 0.4s ease; }
.mobile-menu.open { max-height: 500px; }
.pulse-ring { animation: pulse-ring 2s infinite; }
@keyframes pulse-ring { 0% { box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.5); } 70% { box-shadow: 0 0 0 15px rgba(220, 38, 38, 0); } 100% { box-shadow: 0 0 0 0 rgba(220, 38, 38, 0); } }
.nav-bg { background-color: #0a0a0a; }
.nav-bg-scrolled { background-color: #111111; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3); }
.group:hover > .nav-dropdown { opacity: 1 !important; visibility: visible !important; }
/* Mobile utility bar */
@media (max-width: 767px) {
    .utility-bar-inner { flex-direction: column; gap: 6px !important; }
    .utility-right { gap: 8px !important; font-size: 12px; }
    .utility-right .wa-text { display: none; }
    .utility-bar { padding: 6px 0 !important; }
    .desktop-nav { display: none !important; }
    .nav-logo-img { height: 50px !important; }
    .nav-logo-text { font-size: 1.25rem !important; }
    .nav-logo-sub { font-size: 9px !important; }
    .nav-bar-inner { height: 70px !important; }
}
@media (min-width: 1024px) {
    .desktop-nav { display: flex !important; }
}
</style>

{{-- UTILITY BAR - Social Media + Films Switcher --}}
<div class="utility-bar" style="position: fixed; width: 100%; z-index: 60; top: 0; background-color: #1f2937; color: white; padding: 8px 0;">
    <div class="utility-bar-inner" style="max-width: 80rem; margin: 0 auto; padding: 0 16px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px;">
        <div style="display: flex; align-items: center; gap: 20px;">
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
            <a href="{{ route('films.home') }}" style="display:inline-flex;align-items:center;gap:7px;font-family:'Inter',sans-serif;font-weight:700;font-size:12px;letter-spacing:0.12em;text-transform:uppercase;padding:6px 14px;border-radius:6px;background:rgba(124,58,237,0.25);border:1px solid rgba(139,92,246,0.5);color:#c4b5fd;text-decoration:none;transition:all 0.3s ease;white-space:nowrap;" onmouseover="this.style.background='rgba(124,58,237,0.5)';this.style.color='white';" onmouseout="this.style.background='rgba(124,58,237,0.25)';this.style.color='#c4b5fd';">🎬 Mukusho Films</a>
            <a href="https://wa.me/254743909457" target="_blank" style="color: white; text-decoration: none; display: flex; align-items: center; gap: 8px; font-size: 14px; transition: color 0.2s;" onmouseover="this.style.color='#ef4444'" onmouseout="this.style.color='white'">
                <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.489-1.761-1.662-2.06-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M2.004 22l1.352-4.968A9.892 9.892 0 011.95 11.95a9.96 9.96 0 1120.015 0 9.96 9.96 0 01-14.71 8.647L2.004 22zm5.446-2.583a8.172 8.172 0 109.916-12.8 8.17 8.17 0 00-11.416 1.492 8.118 8.118 0 00-1.085 4.39A8.106 8.106 0 005.12 17.1l-1.01 3.71 3.784-1.011z"/></svg>
                <span class="wa-text">Chat with us on WhatsApp</span>
            </a>
        </div>
    </div>
</div>

{{-- NAVBAR - Kenya Colors Gradient (JKA Style) --}}
<nav id="navbar" style="position: fixed; width: 100%; z-index: 50; top: 36px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3); background: #0a0a0a; border-bottom: 3px solid #B91C1C; transition: background 0.3s ease;">
    <div style="max-width: 80rem; margin: 0 auto; padding: 0 16px;">
        <div class="nav-bar-inner" style="display: flex; justify-content: space-between; align-items: center; height: 96px;">
            {{-- Logo & Brand --}}
            <a href="{{ route('karate.home') }}" style="display: flex; align-items: center; gap: 16px; flex-shrink: 0; text-decoration: none;">
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
                <a href="{{ route('films.home') }}" class="block text-purple-300 hover:text-purple-200 uppercase text-sm font-bold tracking-wide py-2 mobile-link">🎬 Mukusho Films</a>
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

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('mobile-toggle');
    const menu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    if (toggle && menu && menuIcon && closeIcon) {
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
    }

    window.addEventListener('scroll', () => {
        const nav = document.getElementById('navbar');
        if (nav) {
            if (window.scrollY > 50) {
                nav.classList.add('nav-bg-scrolled');
                nav.style.background = '#111111';
            } else {
                nav.classList.remove('nav-bg-scrolled');
                nav.style.background = '#0a0a0a';
            }
        }
    });
});
</script>
