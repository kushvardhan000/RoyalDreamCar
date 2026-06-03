@extends('layouts.app')

@section('title', 'Royal Dream Car | Luxury Car Dealership')
@section('meta_description', 'Discover premium luxury vehicles at Royal Dream Car.')

@section('content')

<!-- Swiper.js CDN for the Premium Hero Slider -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<style>
    /* Premium Ultra-Black Background Overrides */
    body {
        background-color: #080808;
        color: #f5f5f5;
    }
    
    /* Bulletproof Custom Animation Tracks */
    @keyframes techMarquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
    }

    
    .animate-tech-track {
        display: flex;
        white-space: nowrap;
        animation: techMarquee 28s linear infinite;
    }

    /* Laser Grid Blueprint Texture */
    .bg-laser-grid {
        background-size: 30px 30px;
        background-image: 
            linear-gradient(to right, rgba(253, 29, 29, 0.02) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(253, 29, 29, 0.02) 1px, transparent 1px);
    }

    @keyframes marquee-forward {
        0% { transform: translateX(0%); }
        100% { transform: translateX(-50%); }
    }
    @keyframes marquee-backward {
        0% { transform: translateX(-50%); }
        100% { transform: translateX(0%); }
    }
    .animate-marquee-forward {
        display: flex;
        width: max-content;
        animation: marquee-forward 20s linear infinite;
    }
    .animate-marquee-backward {
        display: flex;
        width: max-content;
        animation: marquee-backward 30s linear infinite;
    }
    .animate-marquee-fast {
        display: flex;
        width: max-content;
        animation: marquee-forward 20s linear infinite;
    }
    .swiper-pagination-bullet-active {
        background: #E31837 !important;
        width: 24px !important;
        border-radius: 4px !important;
    }
    .swiper-pagination-bullet {
        background: #ffffff;
        opacity: 0.5;
    }
</style>

{{-- Hero Slider Section --}}
<section id="hero-slider" class="relative w-full h-screen bg-[#080808] overflow-hidden select-none user-select-none">
    
    <!-- Swiper Main Viewport -->
    <div class="swiper heroSwiper w-full h-full absolute inset-0 z-0">
        <div class="swiper-wrapper">
            @php
                // Safe structural fallback collection if dynamic data isn't passed from controller
                $slides = isset($sliders) && $sliders->count() > 0 ? $sliders : collect([
                    (object)[
                        'title' => 'RAW PERFORMANCE UNLEASHED', 
                        'subtitle' => 'FERRARI SF90 STRADALE', 
                        'image' => 'https://images.unsplash.com/photo-1583121274602-3e2820c69888?q=80&w=1920&auto=format&fit=crop',
                        'button_text' => 'SCHEDULE TEST DRIVE',
                        'button_link' => '#'
                    ],
                    (object)[
                        'title' => 'SHAPED BY THE WIND', 
                        'subtitle' => 'PORSCHE 911 GT3 RS', 
                        'image' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?q=80&w=1920&auto=format&fit=crop',
                        'button_text' => 'EXPLORE COLLECTION',
                        'button_link' => '#'
                    ],
                    (object)[
                        'title' => 'THE PURSUIT OF PERFECTION', 
                        'subtitle' => 'LAMBORGHINI REVUELTO', 
                        'image' => 'https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?q=80&w=1920&auto=format&fit=crop',
                        'button_text' => 'RESERVE COMMISSION',
                        'button_link' => '#'
                    ]
                ]);
            @endphp

            @foreach ($slides as $index => $slider)
                <div class="swiper-slide relative w-full h-full flex items-end md:items-center bg-[#080808]">
                    {{-- Cinematic Background Layer --}}
                    <div class="absolute inset-0 w-full h-full overflow-hidden">
                        <img
                            src="{{ $slider->image }}"
                            alt="{{ $slider->title }}"
                            class="hero-bg-img w-full h-full object-cover origin-center"
                            loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                            onerror="this.onerror=null; this.src=getLuxuryFallback({{ $index }});"
                        />
                    </div>

                    {{-- Sophisticated Low-Light Lighting Matrix --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-[#080808] via-[#080808]/40 to-transparent z-10"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-[#080808]/90 via-[#080808]/30 to-transparent z-10"></div>
                    <div class="absolute inset-0 radial-vignette z-10 pointer-events-none"></div>

                    {{-- Responsive Slide Content Container --}}
                    <div class="relative z-20 w-full max-w-[1920px] mx-auto h-full px-5 sm:px-10 lg:px-20 flex flex-col justify-end md:justify-center">
                        {{-- Bottom dynamic padding creates an absolute physical barrier preventing layout collisions --}}
                        <div class="hero-content max-w-[850px] pb-28 sm:pb-32 md:pb-0 text-left">
                            
                            {{-- Minimalist Badge Tagline --}}
                            @if($slider->subtitle)
                                <div class="reveal-item-1 mb-3 sm:mb-5 inline-flex items-center gap-2.5 border-l-2 border-[#E31837] bg-white/[0.02] backdrop-blur-md pl-3 pr-4 py-1.5">
                                    <span class="text-[9px] sm:text-xs font-bold uppercase tracking-[0.3em] text-white/90">
                                        {{ $slider->subtitle }}
                                    </span>
                                </div>
                            @endif

                            {{-- Clean Scaled Typography --}}
                            <h1 class="reveal-item-2 mb-4 sm:mb-6 text-2xl sm:text-4xl md:text-6xl lg:text-7xl xl:text-8xl font-black tracking-tight text-white uppercase leading-[1.05] md:leading-[0.95]">
                                {{ $slider->title }}<span class="text-[#E31837]">.</span>
                            </h1>

                            {{-- Minimalist Description Block --}}
                            <p class="reveal-item-3 mb-6 sm:mb-8 text-[11px] sm:text-xs md:text-base text-gray-400 font-light max-w-md md:max-w-xl leading-relaxed tracking-wide">
                                Experience uncompromised luxury, tailored performance, and elite prestige with our handpicked automotive gallery.
                            </p>

                            {{-- Premium Action Buttons --}}
                            <div class="reveal-item-4 flex flex-col sm:flex-row gap-3 sm:gap-4 items-stretch sm:items-center">
                                <a
                                    href="{{ $slider->button_link ?? '#' }}"
                                    class="luxury-btn-primary group relative inline-flex items-center justify-center bg-[#E31837] px-6 sm:px-8 py-3.5 sm:py-4 text-[10px] sm:text-[11px] font-bold uppercase tracking-[0.25em] text-white transition-all duration-500 overflow-hidden"
                                bag>
                                    <span class="relative z-10">{{ $slider->button_text ?? 'SCHEDULE TEST DRIVE' }}</span>
                                    <div class="absolute top-0 -left-[100%] w-[50%] h-full bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-[-25deg] transition-all duration-1000 group-hover:left-[200%]"></div>
                                </a>

                                <a
                                    href="#"
                                    class="inline-flex items-center justify-center border border-white/10 bg-white/[0.01] backdrop-blur-md px-6 sm:px-8 py-3.5 sm:py-4 text-[10px] sm:text-[11px] font-bold uppercase tracking-[0.25em] text-white transition-all duration-300 hover:bg-white hover:text-[#080808] hover:border-white"
                                >
                                    EXPLORE COLLECTION
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- 
        Global Static Control & Interface Layer
        Anchored cleanly at the base, completely responsive and visually decoupled from text layers.
    --}}
    <div class="absolute bottom-0 left-0 w-full z-30 pointer-events-none pb-6 sm:pb-8 lg:pb-12">
        <div class="w-full max-w-[1920px] mx-auto px-5 sm:px-10 lg:px-20">
            <div class="flex flex-row items-center justify-between w-full pointer-events-auto">
                
                {{-- Left Symmetrical Metric (Hidden on small mobile viewports to ensure extreme cleanliness) --}}
                <div class="hidden sm:flex items-center gap-6 md:gap-8 border-l border-white/15 pl-4 md:pl-6">
                    <div class="flex flex-col">
                        <span class="text-sm md:text-base font-bold text-white tracking-tight leading-none mb-1">500+</span>
                        <span class="text-[8px] font-medium uppercase tracking-[0.15em] text-gray-500">Fleet</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm md:text-base font-bold text-white tracking-tight leading-none mb-1">10 Yrs</span>
                        <span class="text-[8px] font-medium uppercase tracking-[0.15em] text-gray-500">Legacy</span>
                    </div>
                </div>

                {{-- Center Dynamic Scroll Flag (Exclusively visible on wide desktop viewports) --}}
                <div class="hidden lg:flex items-center justify-center absolute left-1/2 bottom-0 -translate-x-1/2">
                    <div class="flex flex-col items-center gap-2">
                        <span class="text-[8px] font-bold uppercase tracking-[0.3em] text-gray-500">Scroll Down</span>
                        <div class="w-[1px] h-6 bg-gradient-to-b from-[#E31837] to-transparent relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-full h-1/2 bg-white animate-scroll-drop"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</section>

{{-- Specialized Structural Styles for Responsive Component Distribution --}}
<style>
    #hero-slider * {
        -webkit-tap-highlight-color: transparent;
        outline: none !important;
    }

    .radial-vignette {
        background: radial-gradient(circle, rgba(0,0,0,0) 40%, rgba(8,8,8,0.9) 100%);
    }

    /* Cinematic Panoramic Ken Burns Transition Animation */
    .hero-bg-img {
        transform: scale(1.03);
        transition: transform 7.5s cubic-bezier(0.16, 1, 0.3, 1);
        will-change: transform;
    }
    .swiper-slide-active .hero-bg-img {
        transform: scale(1.09);
    }

    /* Precision Motion Reveal Stagger Timers */
    .hero-content > * {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.75s cubic-bezier(0.215, 0.610, 0.355, 1), transform 0.75s cubic-bezier(0.215, 0.610, 0.355, 1);
        will-change: transform, opacity;
    }
    .swiper-slide-active .reveal-item-1 { transition-delay: 0.1s; opacity: 1; transform: translateY(0); }
    .swiper-slide-active .reveal-item-2 { transition-delay: 0.2s; opacity: 1; transform: translateY(0); }
    .swiper-slide-active .reveal-item-3 { transition-delay: 0.3s; opacity: 1; transform: translateY(0); }
    .swiper-slide-active .reveal-item-4 { transition-delay: 0.4s; opacity: 1; transform: translateY(0); }

    /* Performance Glow CTA Styling */
    .luxury-btn-primary { box-shadow: 0 0 0 rgba(227, 24, 55, 0); }
    .luxury-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px -5px rgba(227, 24, 55, 0.45);
    }

    /* Micro-Engineered Progress Line Elements */
    .luxury-pagination-wrapper {
        display: flex;
        gap: 6px;
    }
    .luxury-pagination-wrapper .swiper-pagination-bullet {
        flex: 1;
        height: 2px !important;
        background: rgba(255, 255, 255, 0.12) !important;
        border-radius: 0 !important;
        opacity: 1 !important;
        margin: 0 !important;
        position: relative;
        overflow: hidden;
    }
    .luxury-pagination-wrapper .swiper-pagination-bullet::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 0%;
        background: #E31837;
    }
    .luxury-pagination-wrapper .swiper-pagination-bullet-active::after {
        animation: activeProgressFill 6s linear forwards;
    }
    @keyframes activeProgressFill {
        0% { width: 0%; }
        100% { width: 100%; }
    }

    /* Interactive Drop Mechanics */
    @keyframes scrollDropAnimation {
        0% { transform: translateY(-100%); opacity: 0; }
        30% { transform: translateY(0%); opacity: 1; }
        60% { transform: translateY(100%); opacity: 0; }
        100% { transform: translateY(100%); opacity: 0; }
    }
    .animate-scroll-drop {
        animation: scrollDropAnimation 2s cubic-bezier(0.4, 0, 0.2, 1) infinite;
    }
</style>

{{-- Engine Configuration --}}
<script>
    const fallbackAutomotiveImages = [
        'https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?q=80&w=1920&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1583121274602-3e2820c69888?q=80&w=1920&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?q=80&w=1920&auto=format&fit=crop'
    ];

    function getLuxuryFallback(index) {
        return fallbackAutomotiveImages[index % fallbackAutomotiveImages.length];
    }

    document.addEventListener('DOMContentLoaded', function() {
        const heroSwiper = new Swiper('.heroSwiper', {
            effect: 'fade',
            fadeEffect: { crossFade: true },
            speed: 800,
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            pagination: {
                el: '.luxury-pagination-wrapper',
                clickable: true,
            },
            keyboard: { enabled: true },
            simulateTouch: true,
            grabCursor: false,
            on: {
                init: function () {
                    updateGlobalDisplayCounter(this.realIndex);
                },
                slideChange: function () {
                    updateGlobalDisplayCounter(this.realIndex);
                }
            }
        });

        function updateGlobalDisplayCounter(activeIndex) {
            const currentElement = document.getElementById('counter-current');
            if (currentElement) {
                currentElement.innerText = String(activeIndex + 1).padStart(2, '0');
            }
        }
    });
</script>


{{-- Featured Cars Section --}}
<section id="featured-cars" class="py-16 md:py-20 relative bg-[#080808] overflow-hidden">
    <div class="absolute top-0 right-0 w-72 h-72 bg-[#E31837]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 max-w-7xl">

        {{-- Header --}}
        <header class="mb-10 flex flex-col sm:flex-row sm:items-end justify-between gap-4 border-b border-white/5 pb-6">
            <div>
                <span class="text-[10px] font-bold tracking-[0.35em] text-[#E31837] uppercase block mb-2">
                    // FLEET SHOWCASE
                </span>

                <h2 class="text-3xl md:text-5xl font-black text-white uppercase tracking-tight">
                    Featured
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-gray-400 to-white">
                        Vehicles
                    </span>
                </h2>
            </div>

            <a
                href="{{ route('cars.index') }}"
                class="inline-flex items-center gap-2 text-[11px] font-bold uppercase tracking-[0.2em] text-white hover:text-[#E31837] transition-colors"
            >
                Explore Inventory →
            </a>
        </header>

        @if($featuredCars->count())

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">

                @foreach($featuredCars as $car)

                    <div
                        class="group bg-[#111111] border border-white/5 rounded-xl overflow-hidden
                               transition-all duration-300
                               hover:border-[#E31837]/30
                               hover:-translate-y-1
                               hover:shadow-xl"
                    >

                        {{-- Image --}}
                        <div class="relative aspect-[16/8] overflow-hidden bg-[#161616]">

                            <img
                                src="{{ $car->primaryImage?->image_path ?? 'https://placehold.co/1200x800?text=Royal+Dream+Car' }}"
                                alt="{{ $car->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                onerror="this.src='https://placehold.co/1200x800?text=Royal+Dream+Car'"
                            >

                            <div class="absolute top-3 left-3">
                                <span class="bg-[#E31837] text-white text-[8px] font-black tracking-[0.2em] uppercase px-2 py-1 rounded">
                                    EXCLUSIVE
                                </span>
                            </div>

                        </div>

                        {{-- Content --}}
                        <div class="p-4">

                            {{-- Title --}}
                            <h3 class="text-lg font-bold text-white uppercase tracking-tight line-clamp-1 group-hover:text-[#E31837] transition-colors">
                                {{ $car->title }}
                            </h3>

                            {{-- Description --}}
                            <p class="text-gray-400 text-xs leading-relaxed mt-2 line-clamp-1">
                                {{ $car->short_description ?? $car->description }}
                            </p>

                            {{-- Specs --}}
                            <div class="grid grid-cols-3 mt-4 border border-white/5 bg-black/30 rounded-lg overflow-hidden">

                                <div class="py-2 text-center">
                                    <div class="text-[9px] text-gray-500 uppercase">
                                        Gear
                                    </div>
                                    <div class="text-[11px] text-white font-semibold">
                                        Auto
                                    </div>
                                </div>

                                <div class="py-2 text-center border-x border-white/5">
                                    <div class="text-[9px] text-gray-500 uppercase">
                                        Engine
                                    </div>
                                    <div class="text-[11px] text-white font-semibold">
                                        V8
                                    </div>
                                </div>

                                <div class="py-2 text-center">
                                    <div class="text-[9px] text-gray-500 uppercase">
                                        Class
                                    </div>
                                    <div class="text-[11px] text-white font-semibold">
                                        Luxury
                                    </div>
                                </div>

                            </div>

                            {{-- Footer --}}
                            <div class="flex items-center justify-between mt-4 pt-3 border-t border-white/5">

                                <div>
                                    <div class="text-[9px] uppercase tracking-widest text-gray-500 font-bold">
                                        Investment
                                    </div>

                                    <div class="text-lg font-black text-white">
                                        ${{ number_format($car->price) }}
                                    </div>
                                </div>

                                <a
                                    href="{{ route('cars.show', $car->slug) }}"
                                    class="inline-flex items-center justify-center
                                           bg-white text-black
                                           hover:bg-[#E31837]
                                           hover:text-white
                                           px-3 py-2
                                           rounded-md
                                           text-[10px]
                                           font-bold
                                           uppercase
                                           tracking-widest
                                           transition-all duration-300"
                                >
                                    View Spec →
                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="border border-white/5 bg-[#111111] rounded-xl p-10 text-center">
                <p class="text-gray-500 text-xs uppercase tracking-[0.25em]">
                    No featured vehicles available right now.
                </p>
            </div>

        @endif

    </div>
</section>



{{-- Why Choose Us Section --}}
<section id="why-choose-us" class="py-24 bg-black relative border-y border-white/5">
    <div class="absolute inset-0 bg-[radial-gradient(#1a1a1a_1px,transparent_1px)] [background-size:16px_16px] opacity-30"></div>
    <div class="container mx-auto px-4 max-w-7xl relative z-10">
        <header class="mb-16 text-center">
            <span class="text-xs font-bold tracking-[0.4em] text-[#E31837] uppercase block mb-2">// ELITE STANDARDS</span>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-black text-white uppercase tracking-tight">
                The Royal Dream <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-gray-400 to-white">Experience</span>
            </h2>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Feature Card 1 --}}
            <div class="bg-[#0b0b0b] border border-white/5 p-8 relative group transition-all duration-300 hover:border-[#E31837]/40">
                <div class="absolute top-0 left-0 w-1 h-0 bg-[#E31837] group-hover:h-full transition-all duration-300"></div>
                <div class="text-3xl mb-6 text-[#E31837] font-light">01/</div>
                <h3 class="text-xl font-bold uppercase tracking-tight text-white mb-3">Vetted Collection</h3>
                <p class="text-gray-400 text-xs sm:text-sm font-light leading-relaxed">
                    Every piece within our exotic showroom undergoes exhaustive multi-point dynamic testing and historical background verification.
                </p>
            </div>
            {{-- Feature Card 2 --}}
            <div class="bg-[#0b0b0b] border border-white/5 p-8 relative group transition-all duration-300 hover:border-[#E31837]/40">
                <div class="absolute top-0 left-0 w-1 h-0 bg-[#E31837] group-hover:h-full transition-all duration-300"></div>
                <div class="text-3xl mb-6 text-[#E31837] font-light">02/</div>
                <h3 class="text-xl font-bold uppercase tracking-tight text-white mb-3">Tailored Financing</h3>
                <p class="text-gray-400 text-xs sm:text-sm font-light leading-relaxed">
                    Access tier-one discrete asset allocation and customized high-net-worth vehicle asset structural options perfectly aligned with your preferences.
                </p>
            </div>
            {{-- Feature Card 3 --}}
            <div class="bg-[#0b0b0b] border border-white/5 p-8 relative group transition-all duration-300 hover:border-[#E31837]/40">
                <div class="absolute top-0 left-0 w-1 h-0 bg-[#E31837] group-hover:h-full transition-all duration-300"></div>
                <div class="text-3xl mb-6 text-[#E31837] font-light">03/</div>
                <h3 class="text-xl font-bold uppercase tracking-tight text-white mb-3">24/7 Global Concierge</h3>
                <p class="text-gray-400 text-xs sm:text-sm font-light leading-relaxed">
                    Our dynamic master technicians and dedicated elite client managers remain explicitly on-call round the clock worldwide.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Services Section --}}
<section id="services" class="py-24 bg-[#080808]">
    <div class="container mx-auto px-4 max-w-7xl">
        <header class="mb-16 text-center md:text-left">
            <span class="text-xs font-bold tracking-[0.4em] text-[#E31837] uppercase block mb-2">// TAILORED PROVISIONS</span>
            <h2 class="text-3xl sm:text-4xl font-black text-white uppercase tracking-tight">
                White-Glove <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-500">Automotive Services</span>
            </h2>
        </header>

        @if($services->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($services as $service)
                    <div class="bg-[#111111] border border-white/5 p-8 hover:bg-black hover:border-[#E31837]/50 group transition-all duration-300 flex flex-col justify-between">
                        <div>
                            @if($service->image)
                                <div class="w-12 h-12 mb-6 bg-white/5 p-2 flex items-center justify-center group-hover:bg-[#E31837]/10 transition-colors">
                                    <img src="{{ $service->image }}" alt="{{ $service->title }}" class="w-full h-full object-contain filter invert group-hover:hue-rotate-180" onerror="this.src='https://placehold.co/100x100?text=Service'">
                                </div>
                            @endif
                            <h3 class="text-lg font-bold text-white uppercase tracking-tight mb-3 group-hover:text-[#E31837] transition-colors">
                                {{ $service->title }}
                            </h3>
                            <p class="text-gray-400 text-xs font-light leading-relaxed">
                                {{ $service->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="border border-white/5 p-12 text-center text-gray-500 bg-[#111111] tracking-widest uppercase text-xs">
                Service parameters currently updating.
            </div>
        @endif
    </div>
</section>

{{-- Reviews Infinite Marquee Section --}}
<section id="testimonials" class="py-24 bg-black overflow-hidden border-t border-white/5">
    <div class="container mx-auto px-4 max-w-7xl mb-12">
        <header class="text-center">
            <span class="text-xs font-bold tracking-[0.4em] text-[#E31837] uppercase block mb-2">// WORLD CLASS TESTIMONIALS</span>
            <h2 class="text-3xl sm:text-4xl font-black text-white uppercase tracking-tight">
                Verified Client <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-500">Endorsements</span>
            </h2>
        </header>
    </div>

    @if($testimonials->count() > 0)
        {{-- Marquee Forward Row --}}
        <div class="w-full flex overflow-x-hidden relative mask-gradient mb-6">
            <div class="animate-marquee-forward flex gap-6 whitespace-nowrap">
                @foreach($testimonials->merge($testimonials) as $testimonial) {{-- Double loop for seamless effect --}}
                    <div class="w-[300px] sm:w-[400px] inline-block whitespace-normal bg-[#0c0c0c] border border-white/5 p-6 sm:p-8 flex flex-col justify-between mx-3">
                        <p class="text-gray-300 italic text-xs sm:text-sm font-light leading-relaxed mb-6">
                            "{!! nl2br(e($testimonial->review)) !!}"
                        </p>
                        <div class="flex items-center gap-4">
                            @if($testimonial->photo)
                                <img src="{{ $testimonial->photo }}" alt="{{ $testimonial->name }}" class="w-10 h-10 rounded-full object-cover grayscale" onerror="this.src='https://placehold.co/50x50?text=Profile'">
                            @else
                                <div class="w-10 h-10 rounded-full bg-[#E31837] flex items-center justify-center font-black text-xs text-white">
                                    {{ substr($testimonial->name, 0, 1) }}
                                </div>
                            @endif
                            <div>
                                <h4 class="font-bold text-white text-xs sm:text-sm uppercase tracking-wider">{{ $testimonial->name }}</h4>
                                <span class="text-[10px] font-bold tracking-widest uppercase text-[#E31837]">{{ $testimonial->designation ?? 'Collector' }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="border-y border-white/5 py-8 text-center text-gray-500 bg-[#111111] uppercase tracking-widest text-xs">
            Awaiting elite client feedback configurations.
        </div>
    @endif
</section>

{{-- Call To Action Section --}}
<section id="call-to-action" class="py-28 relative overflow-hidden bg-black flex items-center justify-center">
    {{-- Decorative Aesthetic Accents --}}
    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#E31837] to-transparent"></div>
    <div class="absolute inset-0 bg-[#E31837]/5 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-[#E31837]/10 via-transparent to-transparent opacity-60"></div>

    <div class="container mx-auto px-4 max-w-5xl relative z-10 text-center">
        <span class="text-xs font-bold tracking-[0.5em] text-[#E31837] uppercase block mb-4">// COMMENCE ACQUISITION</span>
        <h2 class="text-4xl sm:text-5xl md:text-6xl font-black text-white uppercase tracking-tight mb-6 leading-none">
            Command Your <br class="hidden sm:inline" /><span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-gray-300 to-gray-600">Automotive Destiny</span>
        </h2>
        <p class="text-sm sm:text-base md:text-lg text-gray-400 mb-10 max-w-2xl mx-auto font-light leading-relaxed">
            Connect directly with elite dynamic auto-brokers or schedule a discrete walkthrough within our secure local physical storage environments.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('cars.index') }}" class="w-full sm:w-auto px-8 py-4 bg-[#E31837] text-white font-bold text-xs uppercase tracking-[0.2em] transition-all duration-300 hover:bg-white hover:text-black">
                Browse Full Fleet
            </a>
            <a href="{{ route('contact') }}" class="w-full sm:w-auto px-8 py-4 bg-transparent border border-white/20 text-white font-bold text-xs uppercase tracking-[0.2em] transition-all duration-300 hover:bg-white/5 hover:border-white">
                Contact Commissionaires
            </a>
        </div>
    </div>
</section>

{{-- Initialize Premium Slider Script Block --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const heroSwiper = new Swiper('.heroSwiper', {
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            }
        });
    });
</script>

@endsection