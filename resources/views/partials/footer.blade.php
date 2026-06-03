<footer class="relative bg-[#050505] text-white border-t border-white/10 overflow-hidden pt-24 pb-12">

    {{-- Vector High-Speed Laser Accent Decals --}}
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-[#E31837]/60 to-transparent"></div>
    <div class="absolute inset-x-0 top-[1px] h-[4px] bg-gradient-to-r from-transparent via-[#E31837]/10 to-transparent blur-sm"></div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">

            {{-- Column One: Executive Monolith Declaration --}}
            <div class="space-y-6">
                <div class="flex flex-col">
                    <h3 class="text-xl font-black tracking-[0.25em] uppercase text-white">
                        ROYAL<span class="text-[#E31837]">DREAM</span>CAR
                    </h3>
                    <span class="font-mono text-[9px] tracking-[0.5em] text-gray-500 mt-1">AUTOMOTIVE MONOLITH</span>
                </div>
                <p class="text-sm font-normal leading-relaxed text-gray-400 font-sans">
                    Curating architectural masterpieces of speed, legacy, and design execution. We specialize in the structural allocation of rare hypercars, competitive collection portfolio management, and global white-glove concierge procurement.
                </p>
            </div>

            {{-- Column Two: Operational Portals --}}
            <div>
                <h4 class="font-mono text-xs font-bold tracking-[0.35em] text-[#E31837] mb-8 flex items-center gap-2">
                    <span class="h-1 w-3 bg-[#E31837]"></span> SYSTEM PORTALS
                </h4>
                <ul class="space-y-4 font-mono text-xs font-bold tracking-widest uppercase">
                    @foreach([
                        'Showroom Center' => route('home'),
                        'Corporate Dossier' => route('about'),
                        'Exclusive Fleet' => route('cars.index'),
                        'Tailored Provisions' => route('services.index'),
                        'Secure Comms Hub' => route('contact')
                    ] as $name => $link)
                        <li>
                            <a href="{{ $link }}" class="text-gray-400 transition-all duration-300 hover:text-white flex items-center gap-2 group">
                                <span class="text-[#E31837] transition-transform duration-300 group-hover:translate-x-1">//</span>
                                <span class="transition-colors duration-300">{{ $name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Column Three: Professional Asset Management Portfolio --}}
            <div>
                <h4 class="font-mono text-xs font-bold tracking-[0.35em] text-[#E31837] mb-8 flex items-center gap-2">
                    <span class="h-1 w-3 bg-[#E31837]"></span> PROVISIONS
                </h4>
                <ul class="space-y-4 text-sm text-gray-400 font-sans font-normal">
                    <li class="hover:text-white transition-colors duration-300 flex items-center gap-3">
                        <span class="h-1 w-1 bg-white/20 rounded-full"></span>Exotic Vehicle Investment Brokerage
                    </li>
                    <li class="hover:text-white transition-colors duration-300 flex items-center gap-3">
                        <span class="h-1 w-1 bg-white/20 rounded-full"></span>High-Net-Worth Allocation Matrix
                    </li>
                    <li class="hover:text-white transition-colors duration-300 flex items-center gap-3">
                        <span class="h-1 w-1 bg-white/20 rounded-full"></span>Global Circuit & Track Logistics
                    </li>
                    <li class="hover:text-white transition-colors duration-300 flex items-center gap-3">
                        <span class="h-1 w-1 bg-white/20 rounded-full"></span>Multi-Point Diagnostic Flight Testing
                    </li>
                    <li class="hover:text-white transition-colors duration-300 flex items-center gap-3">
                        <span class="h-1 w-1 bg-white/20 rounded-full"></span>Asset Portfolio Advisory Concierge
                    </li>
                </ul>
            </div>

            {{-- Column Four: Physical Footprint & Secure Channels --}}
            <div class="space-y-6">
                <h4 class="font-mono text-xs font-bold tracking-[0.35em] text-[#E31837] mb-8 flex items-center gap-2">
                    <span class="h-1 w-3 bg-[#E31837]"></span> DISTRIBUTION
                </h4>
                <div class="space-y-4 text-sm font-sans text-gray-400 leading-relaxed">
                    <div>
                        <p class="text-white font-bold tracking-wide">Royal Dream Gallery Complex</p>
                        <p class="font-normal mt-0.5">Ranchi, Jharkhand, India</p>
                    </div>
                    <div class="pt-2 border-t border-white/5 space-y-1.5 font-mono text-xs">
                        <p>
                            <span class="text-gray-600">TEL:</span> 
                            <a href="tel:+919999999999" class="text-white hover:text-[#E31837] transition-colors font-bold ml-1">+91 99999 99999</a>
                        </p>
                        <p>
                            <span class="text-gray-600">MAIL:</span> 
                            <a href="mailto:info@royaldreamcar.com" class="text-white hover:text-[#E31837] transition-colors font-bold ml-1">info@royaldreamcar.com</a>
                        </p>
                    </div>
                </div>

                {{-- Social Media Matrix Anchors --}}
                <div class="flex items-center gap-2.5 pt-2">
                    @foreach(['facebook', 'instagram', 'youtube', 'linkedin'] as $platform)
                        <a href="#" class="flex h-10 w-10 items-center justify-center border border-white/10 bg-white/[0.02] text-gray-400 transition-all duration-300 hover:border-[#E31837] hover:bg-[#E31837] hover:text-white hover:-translate-y-0.5" aria-label="Visit {{ ucfirst($platform) }} profile">
                            @if($platform == 'facebook')
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12a10 10 0 10-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.51 1.49-3.89 3.78-3.89 1.1 0 2.25.2 2.25.2v2.46h-1.27c-1.25 0-1.64.78-1.64 1.58V12h2.79l-.45 2.89h-2.34v6.99A10 10 0 0022 12z"/></svg>
                            @elseif($platform == 'instagram')
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5a4.25 4.25 0 004.25-4.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5zm8.88 1.12a1.13 1.13 0 110 2.26 1.13 1.13 0 010-2.26zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5A3.5 3.5 0 1015.5 12 3.5 3.5 0 0012 8.5z"/></svg>
                            @elseif($platform == 'youtube')
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.5 6.2a3 3 0 00-2.1-2.12C19.56 3.5 12 3.5 12 3.5s-7.56 0-9.4.58A3 3 0 00.5 6.2 31.6 31.6 0 000 12a31.6 31.6 0 00.5 5.8 3 3 0 002.1 2.12c1.84.58 9.4.58 9.4.58s7.56 0 9.4-.58a3 3 0 002.1-2.12A31.6 31.6 0 0024 12a31.6 31.6 0 00-.5-5.8zM9.75 15.5v-7L16 12l-6.25 3.5z"/></svg>
                            @elseif($platform == 'linkedin')
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5A2.48 2.48 0 012.5 5.98 2.48 2.48 0 010 3.5 2.48 2.48 0 012.5 1 2.48 2.48 0 014.98 3.5zM.5 8h4V24h-4V8zm7 0h3.83v2.18h.05c.53-1.01 1.84-2.08 3.79-2.08 4.05 0 4.8 2.67 4.8 6.14V24h-4v-7.07c0-1.69-.03-3.87-2.36-3.87-2.37 0-2.73 1.85-2.73 3.75V24h-4V8z"/></svg>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- Legal Architecture Ledger & Engineering Credit Line --}}
        <div class="mt-20 pt-8 border-t border-white/5 flex flex-col md:flex-row items-center justify-between gap-4 font-mono text-[10px] text-gray-500 uppercase tracking-[0.2em]">
            <p class="text-center md:text-left">
                &copy; {{ date('Y') }} <span class="text-white font-bold">Royal Dream Car</span>. All Operational Rights Reserved.
            </p>
            
            <p class="text-center md:text-right text-gray-600 tracking-widest">
                ARCHITECTED BY 
                <a href="https://www.hitcs.in/" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-[#E31837] transition-colors duration-300 underline underline-offset-4 decoration-white/10 hover:decoration-[#E31837]">
                    HITCS
                </a>
            </p>
        </div>
    </div>
</footer>