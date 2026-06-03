@extends('layouts.app')

@section('title', $seo->meta_title ?? 'About Us - Royal Dream Car')
@section('meta_description', $seo->meta_description ?? '')
@section('meta_keywords', $seo->meta_keywords ?? '')

@section('content')



{{-- Professional UI/UX Interaction & Luxury Design Tokens --}}
<style>
    body {
        background-color: #050505;
        color: #F5F5F7;
        overflow-x: hidden;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        -webkit-font-smoothing: antialiased;
    }

    /* Premium Hardware-Accelerated Scroll Engine */
    .ux-reveal {
        opacity: 0;
        transform: translateY(40px);
        will-change: transform, opacity;
        transition: opacity 1.4s cubic-bezier(0.16, 1, 0.3, 1), 
                    transform 1.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .ux-reveal.active {
        opacity: 1;
        transform: translateY(0);
    }

    /* Cinematic Micro-Delays */
    .stagger-1 { transition-delay: 100ms; }
    .stagger-2 { transition-delay: 200ms; }
    .stagger-3 { transition-delay: 300ms; }

    /* Technical Luxury Blueprint Overlay */
    .luxury-blueprint {
        background-size: 50px 50px;
        background-image: linear-gradient(to right, rgba(255, 255, 255, 0.01) 1px, transparent 1px),
                          linear-gradient(to bottom, rgba(255, 255, 255, 0.01) 1px, transparent 1px);
    }

    /* Custom Hide Scrollbar Engine */
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* Premium Interactive Shimmer Effect */
    .shimmer-hover {
        position: relative;
        overflow: hidden;
    }
    .shimmer-hover::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.05), transparent);
        transition: left 0.7s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .shimmer-hover:hover::after {
        left: 100%;
    }
</style>

{{-- SECTION 1. THE HERO COCKPIT: Balanced Height Architecture (65vh) --}}
<section class="relative w-full h-[65vh] flex items-center justify-center bg-[#050505] overflow-hidden border-b border-neutral-900/40">
    {{-- High-Gloss Visual Canvas: Restored Image Clarity --}}
    <div class="absolute inset-0 w-full h-full z-0">
        @if($about && $about->hero_image)
            <img src="{{ asset('storage/'.$about->hero_image) }}" alt="{{ $about->hero_title ?? 'About Us' }}" class="w-full h-full object-cover object-center brightness-[0.95] scale-100 transition-transform duration-[10s]">
        @else
            <img src="https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?auto=format&fit=crop&w=1920&q=80" alt="Royal Dream Car Showroom" class="w-full h-full object-cover object-center brightness-110">
        @endif
    </div>
    
    {{-- Professional Cinematic Scrim Overlay: Shields Text while Unveiling the Image --}}
    <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-black/10 to-black/50 z-10"></div>
    
    {{-- Ultra-Subtle Blueprint Matrix: No longer muddying up the imagery --}}
    <div class="absolute inset-0 luxury-blueprint opacity-5 z-10 pointer-events-none"></div>

    {{-- Content Frame --}}
    <div class="relative z-20 w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-20 text-center flex flex-col items-center">
        <span class="text-[11px] font-bold uppercase tracking-[0.6em] text-[#E31837] mb-4 block animate-pulse">
            // HISTORIC COGNIZANCE
        </span>
        <h1 class="text-4xl sm:text-6xl md:text-7xl font-black tracking-tighter text-white uppercase leading-[0.95] max-w-5xl mb-6 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)]">
            {{ $about->hero_title ?? 'Luxury Cars, Exceptional Service' }}<span class="text-[#E31837]">.</span>
        </h1>
        <p class="text-sm sm:text-base md:text-lg text-neutral-300 font-normal max-w-2xl leading-relaxed tracking-wide drop-shadow-[0_2px_8px_rgba(0,0,0,0.6)]">
            {{ $about->hero_subtitle ?? 'Experience the pinnacle of automotive excellence at Royal Dream Car.' }}
        </p>
    </div>
</section>

{{-- SECTION 2. HISTORIC OUTLOOK: Proportional Bento Grid Redesign (Perfect UX Balance) --}}
@if($about && $about->company_story)
<section class="relative py-24 lg:py-32 bg-[#09090A] overflow-hidden">
    <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-20">
        
        {{-- Section Subheading Line --}}
        <div class="mb-12 lg:mb-16 ux-reveal">
            <span class="text-xs font-mono tracking-widest text-neutral-500 uppercase block mb-2">01 / GENESIS PROFILE</span>
            <div class="w-12 h-[2px] bg-[#E31837]"></div>
        </div>

        {{-- Dynamic Asymmetric Canvas Layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-stretch">
            
            {{-- Left Column: Refined Editorial Typography (7 Grid Tracks) --}}
            <div class="lg:col-span-7 flex flex-col justify-center space-y-6 ux-reveal">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight uppercase leading-[1.05]">
                    WE DO NOT MERELY DISTRIBUTE PLANES OF METAL. WE CURATE MOMENTS<span class="text-[#E31837]">.</span>
                </h2>
                
                {{-- Clean Multi-Column Editorial Text Layout - Balances Text Height Automatically --}}
                <div class="text-neutral-400 font-light text-sm sm:text-base leading-relaxed tracking-wide space-y-4 md:columns-1 gap-8 pt-2 border-t border-neutral-900">
                    {!! nl2br(e($about->company_story)) !!}
                </div>
            </div>

            {{-- Right Column: Balanced Asymmetric Bento Matrix (5 Grid Tracks) --}}
            <div class="lg:col-span-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 h-full ux-reveal stagger-1">
                
                {{-- Metric Card 1: Experience (Spans Full Width on Desktop for Layout Contrast) --}}
                @if($about->years_experience)
                <div class="sm:col-span-2 bg-[#111113] border border-neutral-900/60 p-8 rounded-lg flex flex-col justify-between shimmer-hover hover:border-neutral-800 transition-colors duration-300">
                    <span class="text-xs font-mono text-neutral-600 uppercase tracking-widest">// PARAMETER_01</span>
                    <div class="mt-8">
                        <span class="text-5xl lg:text-6xl font-black tracking-tighter font-mono text-white block leading-none text-glow">
                            {{ $about->years_experience }}<span class="text-[#E31837]">+</span>
                        </span>
                        <span class="text-xs font-bold uppercase tracking-wider text-neutral-400 block mt-2">Years of Market Dominance</span>
                    </div>
                </div>
                @endif

                {{-- Metric Card 2: High Caliber Sales --}}
                @if($about->cars_sold)
                <div class="bg-[#111113] border border-neutral-900/60 p-6 rounded-lg flex flex-col justify-between shimmer-hover hover:border-neutral-800 transition-colors duration-300">
                    <span class="text-[10px] font-mono text-neutral-600 uppercase tracking-widest">// PARAMETER_02</span>
                    <div class="mt-6">
                        <span class="text-3xl lg:text-4xl font-black tracking-tighter font-mono text-white block leading-none">
                            {{ $about->cars_sold }}
                        </span>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-neutral-400 block mt-2">Vehicles Commissioned</span>
                    </div>
                </div>
                @endif

                {{-- Metric Card 3: Global Sovereign Trust --}}
                @if($about->happy_customers)
                <div class="bg-[#111113] border border-neutral-900/60 p-6 rounded-lg flex flex-col justify-between shimmer-hover hover:border-neutral-800 transition-colors duration-300">
                    <span class="text-[10px] font-mono text-neutral-600 uppercase tracking-widest">// PARAMETER_03</span>
                    <div class="mt-6">
                        <span class="text-3xl lg:text-4xl font-black tracking-tighter font-mono text-white block leading-none">
                            {{ $about->happy_customers }}
                        </span>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-neutral-400 block mt-2">Sovereign Global Clients</span>
                    </div>
                </div>
                @endif

            </div>

        </div>
    </div>
</section>
@endif

{{-- SECTION 3. OPERATIONAL FRAMEWORK: High-Contrast Minimal Split Panels --}}
@if($about && ($about->mission_description || $about->vision_description))
<section class="relative py-20 bg-[#050505] border-t border-neutral-950">
    <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 items-stretch">
            
            {{-- Mission Architecture Card --}}
            @if($about->mission_description)
            <div class="relative bg-[#0D0D0F]/40 border border-neutral-900 p-8 sm:p-10 rounded-lg flex flex-col justify-between ux-reveal hover:border-neutral-800 transition-all duration-300 group">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-2 h-2 rounded-full bg-[#E31837]"></span>
                        <span class="text-[10px] font-mono tracking-widest text-neutral-500 uppercase">// APEX MISSION</span>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold uppercase tracking-tight text-white mb-3 group-hover:text-[#E31837] transition-colors">
                        {{ $about->mission_title ?? 'Our Mission' }}
                    </h3>
                    <p class="text-sm text-neutral-400 font-light leading-relaxed tracking-wide">
                        {{ $about->mission_description ?? 'To provide an unparalleled luxury car buying experience, combining exceptional service with the finest automobiles.' }}
                    </p>
                </div>
            </div>
            @endif

            {{-- Vision Architecture Card --}}
            @if($about->vision_description)
            <div class="relative bg-[#0D0D0F]/40 border border-neutral-900 p-8 sm:p-10 rounded-lg flex flex-col justify-between ux-reveal stagger-1 hover:border-neutral-800 transition-all duration-300 group">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-2 h-2 rounded-full bg-neutral-600"></span>
                        <span class="text-[10px] font-mono tracking-widest text-neutral-500 uppercase">// FUTURE LOG</span>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold uppercase tracking-tight text-white mb-3 group-hover:text-white transition-colors">
                        {{ $about->vision_title ?? 'Our Vision' }}
                    </h3>
                    <p class="text-sm text-neutral-400 font-light leading-relaxed tracking-wide">
                        {{ $about->vision_description ?? 'To be the most trusted and sought-after luxury car dealership, known for integrity, expertise, and passion.' }}
                    </p>
                </div>
            </div>
            @endif

        </div>
    </div>
</section>
@endif

{{-- SECTION 4. WHY CHOOSE US: Space-Saving Interactive Kinetic Slide Deck --}}
@php
    $whyChooseUs = [];
    if($about && $about->why_choose_us) {
        $decoded = json_decode($about->why_choose_us, true);
        if(is_array($decoded)) { $whyChooseUs = $decoded; }
    }
@endphp

@if(count($whyChooseUs) > 0)
<section class="relative py-24 bg-[#09090A] overflow-hidden border-t border-neutral-900/40">
    <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-20">
        
        {{-- Section Interface Controls --}}
        <div class="flex flex-row items-end justify-between mb-12 ux-reveal">
            <div>
                <span class="text-xs font-mono tracking-widest text-[#E31837] block mb-2">02 / OPERATIONAL STANDARDS</span>
                <h2 class="text-2xl sm:text-4xl font-black tracking-tight text-white uppercase leading-none">THE PROTOCOLS<span class="text-[#E31837]">.</span></h2>
            </div>
            {{-- Technical Swipe Signifier Indicator --}}
            <div class="flex items-center gap-3 text-[11px] font-mono text-neutral-500 uppercase tracking-widest">
                <span class="hidden sm:inline">Kinetic Track Swipe</span>
                <div class="flex gap-1">
                    <button id="track-prev" class="w-8 h-8 rounded border border-neutral-800 hover:border-neutral-700 flex items-center justify-center text-white transition-colors">←</button>
                    <button id="track-next" class="w-8 h-8 rounded border border-neutral-800 hover:border-neutral-700 flex items-center justify-center text-white transition-colors">→</button>
                </div>
            </div>
        </div>

        {{-- Kinetic Horizontal Slider Component --}}
        <div id="kinetic-slider" class="flex overflow-x-auto snap-x snap-mandatory gap-6 pb-6 -mx-6 px-6 sm:mx-0 sm:px-0 hide-scrollbar scroll-smooth">
            @foreach($whyChooseUs as $index => $item)
                <div class="snap-start shrink-0 w-[85vw] sm:w-[380px] md:w-[410px] bg-[#050506] border border-neutral-900/80 p-8 rounded-lg flex flex-col justify-between hover:border-neutral-700 transition-all duration-300 ux-reveal {{ 'stagger-'.(($index % 3) * 100) }}">
                    <div>
                        <span class="text-[10px] font-mono text-neutral-600 block mb-10">SYS_RESERVE // 0{{ $index + 1 }}</span>
                        <h3 class="text-lg font-bold uppercase tracking-wide text-white mb-3">
                            {{ $item['title'] ?? '' }}
                        </h3>
                        <p class="text-sm text-neutral-400 font-light leading-relaxed tracking-wide">
                            {{ $item['description'] ?? '' }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
@endif

{{-- SECTION 5. TEAM ARCHITECTURE: Elegant High-Fashion Editorial Grid Layout --}}
@if($teams->count() > 0 || (isset($about) && $about->team_heading))
<section class="relative py-24 md:py-32 bg-[#050505] border-t border-neutral-900/40">
    <div class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-20">
        
        <div class="mb-16 ux-reveal">
            <span class="text-xs font-mono tracking-widest text-neutral-500 block mb-2">03 / ADVISORY COUNCIL</span>
            <h2 class="text-2xl sm:text-4xl font-black tracking-tight text-white uppercase leading-none">
                {{ $about->team_heading ?? 'Our Expert Team' }}<span class="text-[#E31837]">.</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
            @foreach($teams->take(6) as $index => $member)
                <div class="group flex flex-col bg-transparent ux-reveal {{ 'stagger-'.(($index % 3) * 100) }}">
                    
                    {{-- Portrait Wrap Architecture --}}
                    <div class="relative aspect-[4/5] w-full overflow-hidden bg-[#0D0D0F] border border-neutral-900 rounded-lg mb-4 group-hover:border-neutral-700 transition-colors duration-500">
                        @if($member->photo)
                            <img src="{{ asset('storage/'.$member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover object-center scale-100 group-hover:scale-[1.015] transition-transform duration-700 ease-out">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-neutral-900/30">
                                <svg class="w-10 h-10 text-neutral-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        @endif
                        
                        {{-- Interactive Bio Drawer Mechanism --}}
                        <div class="absolute inset-0 bg-[#050506]/95 p-6 flex flex-col justify-between opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out z-20 translate-y-4 group-hover:translate-y-0">
                            <div>
                                <span class="text-[9px] font-mono tracking-widest text-[#E31837] block mb-3 uppercase">// DISCIPLINE</span>
                                <p class="text-sm text-neutral-400 font-light leading-relaxed tracking-wide line-clamp-custom">
                                    {{ $member->bio ?? 'Luxury automotive advisor specializing in elite asset acquisition configuration.' }}
                                </p>
                            </div>
                            
                            @if($member->linkedin_url)
                                <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-[10px] font-mono tracking-widest uppercase text-white hover:text-[#E31837] transition-colors self-start">
                                    <span>CONNECT MATRIX</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- Identity Display Details --}}
                    <div class="flex flex-col px-1">
                        <h3 class="text-lg font-bold text-white uppercase tracking-wide group-hover:text-[#E31837] transition-colors duration-300">
                            {{ $member->name }}
                        </h3>
                        <p class="text-xs text-neutral-500 font-light tracking-widest uppercase mt-0.5">
                            {{ $member->designation }}
                        </p>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
@endif

{{-- SECTION 6. TERMINAL SYSTEM CALL TO ACTION: High Luxury Finish --}}
<section class="relative py-28 sm:py-36 bg-[#050505] text-center overflow-hidden border-t border-neutral-900">
    <div class="absolute inset-0 luxury-blueprint opacity-30 pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-[#E31837]/5 rounded-full blur-[140px] pointer-events-none"></div>
    
    <div class="relative z-10 w-full max-w-4xl mx-auto px-6 flex flex-col items-center">
        <span class="text-xs font-mono tracking-[0.4em] text-[#E31837] mb-4 uppercase block">SECURE ACQUISITION FRAMEWORK</span>
        <h2 class="text-3xl sm:text-5xl md:text-6xl font-black tracking-tight text-white uppercase max-w-3xl leading-[1.05] mb-6 ux-reveal">
            READY TO EXPERIENCE POWER & PERFECTION?
        </h2>
        <p class="text-sm sm:text-base text-neutral-400 font-light max-w-xl leading-relaxed tracking-wide mb-10 ux-reveal stagger-1">
            Engage with our consultants to coordinate a private display or curate your prospective fleet architecture.
        </p>
        
        <div class="w-full sm:w-auto flex flex-col sm:flex-row gap-4 justify-center items-stretch sm:items-center ux-reveal stagger-2">
            <a href="{{ url('/inventory') }}" class="shimmer-hover inline-flex items-center justify-center px-10 py-4 bg-[#E31837] text-xs font-bold uppercase tracking-[0.25em] text-white rounded shadow-xl shadow-[#E31837]/10 hover:shadow-[#E31837]/20 transition-transform duration-300 hover:-translate-y-0.5">
                Browse Collection
            </a>
            <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center border border-neutral-800 bg-[#0B0B0D]/60 backdrop-blur-md px-10 py-4 text-xs font-bold uppercase tracking-[0.25em] text-neutral-300 rounded transition-all duration-300 hover:bg-white hover:text-[#050505] hover:border-white hover:-translate-y-0.5">
                Contact Advisory
            </a>
        </div>
    </div>
</section>

{{-- High Performance Interaction Architecture Scripts --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        
        // 1. Fluid Custom Scroll Trigger Intersection Observer Engine
        const revealElements = document.querySelectorAll(".ux-reveal");
        if ("IntersectionObserver" in window) {
            const observerOptions = {
                root: null,
                threshold: 0.05,
                rootMargin: "0px 0px -30px 0px"
            };

            const observer = new IntersectionObserver(function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("active");
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            revealElements.forEach(function (el) {
                observer.observe(el);
            });
        } else {
            revealElements.forEach(function (el) { el.classList.add("active"); });
        }

        // 2. Technical Kinetic Slider Navigation Controller
        const slider = document.getElementById('kinetic-slider');
        const nextBtn = document.getElementById('track-next');
        const prevBtn = document.getElementById('track-prev');
        
        if(slider && nextBtn && prevBtn) {
            nextBtn.addEventListener('click', () => {
                slider.scrollLeft += 340;
            });
            prevBtn.addEventListener('click', () => {
                slider.scrollLeft -= 340;
            });
        }
    });
</script>

@endsection