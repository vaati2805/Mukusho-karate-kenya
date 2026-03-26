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
                    <li><a href="{{ route('karate.home') }}#about" class="text-white hover:text-green-300 font-medium transition-colors text-sm">About Us</a></li>
                    <li><a href="{{ route('karate.home') }}#events" class="text-white hover:text-green-300 font-medium transition-colors text-sm">Events</a></li>
                    <li><a href="{{ route('karate.home') }}#programs" class="text-white hover:text-green-300 font-medium transition-colors text-sm">Programs</a></li>
                    <li><a href="{{ route('karate.home') }}#gallery" class="text-white hover:text-green-300 font-medium transition-colors text-sm">Gallery</a></li>
                    <li><a href="{{ route('karate.home') }}#instructor" class="text-white hover:text-green-300 font-medium transition-colors text-sm">Our Team</a></li>
                    <li><a href="{{ route('karate.home') }}#schedule" class="text-white hover:text-green-300 font-medium transition-colors text-sm">Schedule</a></li>
                    <li><a href="{{ route('karate.home') }}#achievements" class="text-white hover:text-green-300 font-medium transition-colors text-sm">Achievements</a></li>
                    <li><a href="{{ route('karate.home') }}#faq" class="text-white hover:text-green-300 font-medium transition-colors text-sm">FAQ</a></li>
                    <li><a href="{{ route('films.home') }}" class="text-purple-300 hover:text-purple-200 font-medium transition-colors text-sm">🎬 Mukusho Films</a></li>
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
                        <svg class="w-5 h-5 text-red-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
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
