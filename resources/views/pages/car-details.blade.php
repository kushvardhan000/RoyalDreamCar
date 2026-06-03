@extends('layouts.app')

@section('title', $seo->meta_title ?? ($car->meta_title ?? ($car->title . ' - Royal Dream Car')))
@section('meta_description', $seo->meta_description ?? ($car->meta_description ?? $car->description))
@section('meta_keywords', $seo->meta_keywords ?? '')

@section('content')
<div class="min-h-screen bg-[#030303] text-neutral-100 antialiased font-sans selection:bg-[#dc2626]/40 selection:text-white overflow-x-hidden">
    
    {{-- Custom System Styling Matrix --}}
    <style>
        .hud-grid-subtle {
            background-size: 30px 30px;
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.008) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255, 255, 255, 0.008) 1px, transparent 1px);
        }
        .scrollbar-none::-webkit-scrollbar { display: none; }
        .scrollbar-none { -ms-overflow-style: none; scrollbar-width: none; }
        .mask-edge-fade {
            mask-image: linear-gradient(to right, transparent, #000 4%, #000 96%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, #000 4%, #000 96%, transparent);
        }
    </style>

    {{-- 1. BREADCRUMB TELEMETRY MATRIX --}}
    <nav class="border-b border-neutral-900 bg-neutral-950/40 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 text-xs font-mono text-neutral-500 flex items-center space-x-2">
            <a href="{{ url('/') }}" class="hover:text-[#dc2626] transition-colors tracking-widest">HOME</a>
            <span class="text-neutral-800">//</span>
            <a href="{{ url('/cars') }}" class="hover:text-[#dc2626] transition-colors tracking-widest">INVENTORY</a>
            <span class="text-neutral-800">//</span>
            <span class="text-neutral-300 truncate tracking-wide max-w-[180px] sm:max-w-none">{{ strtoupper($car->title) }}</span>
        </div>
    </nav>

    {{-- 2. MASTER LAYOUT INTEGRATION MATRIX --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 lg:py-12 hud-grid-subtle">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12 items-start">
            
            {{-- COLUMN A: MEDIA & PRIMARY DIAGNOSTIC DATA (Pushed to top on Mobile) --}}
            <div class="lg:col-span-3 space-y-6 lg:space-y-10 order-1">
                
                {{-- Master Cinematic Asset Viewer --}}
                <div class="relative border border-neutral-900 bg-neutral-950 overflow-hidden group shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent z-10 pointer-events-none"></div>
                    <div class="aspect-[16/10] w-full">
                        <img src="{{ $car->primaryImage?->image_path ? asset('storage/'.$car->primaryImage->image_path) : asset('images/placeholder.jpg') }}"
                             alt="{{ $car->title }}"
                             class="w-full h-full object-cover transform duration-1000 ease-out scale-100 group-hover:scale-[1.02]"
                             id="masterViewport"
                             onerror="this.src='{{ asset('images/placeholder.jpg') }}'">
                    </div>
                    <div class="absolute bottom-4 left-4 z-20 font-mono text-[9px] text-neutral-400 bg-black/70 backdrop-blur-md px-2 py-1 border border-neutral-800">
                        PRIMARY_VIEW // CAM_01
                    </div>
                </div>

                {{-- Mobile Interactive Identity Header (Renders only below lg threshold directly beneath image) --}}
                <div class="block lg:hidden space-y-4 border-b border-neutral-900 pb-6">
                    <div class="space-y-1">
                        <span class="text-xs font-mono text-[#dc2626] tracking-widest uppercase font-bold">
                            {{ $car->brand->name ?? 'Asset Class' }} // {{ $car->year ?? '2026' }}
                        </span>
                        <h1 class="text-2xl font-light text-white tracking-tight uppercase">
                            {{ $car->title }}
                        </h1>
                    </div>
                    
                    <div class="p-4 bg-neutral-950 border border-neutral-900 rounded-sm">
                        <span class="block font-mono text-[10px] text-neutral-500 tracking-widest uppercase mb-1">ACQUISITION VALUE</span>
                        <div class="text-3xl font-mono font-bold text-[#dc2626] tracking-tight">
                            {{ $car->price ? '₹' . number_format($car->price, 0, '.', ',') : 'Price on Request' }}
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <a href="#inquiry-terminal"
                           class="px-4 py-3 bg-[#dc2626] text-white text-center font-mono text-xs font-bold uppercase tracking-widest hover:bg-red-700 transition-colors shadow-lg shadow-red-950/20">
                            Initialize Secure Lock
                        </a>
                        <a href="tel:+91{{ $settings['phone'] ?? '' }}"
                           class="px-4 py-3 border border-neutral-800 bg-neutral-900/40 text-neutral-300 text-center font-mono text-xs font-bold uppercase tracking-widest hover:border-neutral-600 transition-colors">
                            Direct Concierge
                        </a>
                    </div>
                </div>

                {{-- Comprehensive Telemetry Matrix --}}
                <div class="border border-neutral-900 p-6 bg-neutral-950/40 backdrop-blur-sm relative">
                    <div class="absolute top-0 left-0 w-12 h-[1px] bg-[#dc2626]"></div>
                    <h2 class="text-xs font-mono tracking-[0.25em] text-neutral-400 mb-6 flex items-center">
                        <span class="inline-block w-1.5 h-1.5 bg-[#dc2626] mr-2.5 animate-pulse"></span>
                        TECHNICAL_SPECIFICATIONS
                    </h2>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-4 font-mono">
                        <div class="border-b border-neutral-900/60 pb-3 flex justify-between items-baseline">
                            <span class="text-neutral-500 text-xs">BRAND</span>
                            <span class="text-neutral-200 text-sm font-semibold uppercase">{{ $car->brand->name ?? 'N/A' }}</span>
                        </div>
                        <div class="border-b border-neutral-900/60 pb-3 flex justify-between items-baseline">
                            <span class="text-neutral-500 text-xs">MODEL</span>
                            <span class="text-neutral-200 text-sm font-semibold uppercase">{{ $car->model->name ?? 'N/A' }}</span>
                        </div>
                        <div class="border-b border-neutral-900/60 pb-3 flex justify-between items-baseline">
                            <span class="text-neutral-500 text-xs">PRODUCTION_YEAR</span>
                            <span class="text-neutral-200 text-sm font-semibold">{{ $car->year ?? 'N/A' }}</span>
                        </div>
                        <div class="border-b border-neutral-900/60 pb-3 flex justify-between items-baseline">
                            <span class="text-neutral-500 text-xs">LOGGED_MILEAGE</span>
                            <span class="text-neutral-200 text-sm font-semibold">{{ $car->mileage ? number_format($car->mileage, 0, '.', ',') . ' KM' : 'N/A' }}</span>
                        </div>
                        <div class="border-b border-neutral-900/60 pb-3 flex justify-between items-baseline">
                            <span class="text-neutral-500 text-xs">COMBUSTION_SYSTEM</span>
                            <span class="text-neutral-200 text-sm font-semibold uppercase">{{ $car->fuel_type ?? 'N/A' }}</span>
                        </div>
                        <div class="border-b border-neutral-900/60 pb-3 flex justify-between items-baseline">
                            <span class="text-neutral-500 text-xs">GEARBOX_LINKAGE</span>
                            <span class="text-neutral-200 text-sm font-semibold uppercase">{{ $car->transmission ?? 'N/A' }}</span>
                        </div>
                        <div class="border-b border-neutral-900/60 pb-3 flex justify-between items-baseline">
                            <span class="text-neutral-500 text-xs">REGISTRATION_TIER</span>
                            <span class="text-neutral-200 text-sm font-semibold uppercase">{{ $car->ownership ?? 'N/A' }}</span>
                        </div>
                        <div class="border-b border-neutral-900/60 pb-3 flex justify-between items-baseline">
                            <span class="text-neutral-500 text-xs">POWER_PLANT_UNIT</span>
                            <span class="text-neutral-200 text-sm font-semibold">
                                @if($car->engine_cc)
                                    {{ $car->engine_cc }}CC 
                                    @if($car->power) • {{ $car->power }}HP @endif
                                @else
                                    N/A
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Interactive Secondary Grid Array Asset Gallery --}}
                @if(!empty($car->images) && $car->images->isNotEmpty())
                    <div class="border border-neutral-900 p-5 bg-neutral-950/20">
                        <h3 class="text-xs font-mono tracking-widest text-neutral-400 mb-4 uppercase flex items-center">
                            OPTICAL_MATRICES // MULTI_ANGLE
                        </h3>
                        <div class="grid grid-cols-4 gap-3">
                            @foreach($car->images->take(12) as $image)
                                <div onclick="document.getElementById('masterViewport').src='{{ asset('storage/'.$image->image_path) }}'"
                                     class="aspect-square border border-neutral-800 bg-black overflow-hidden hover:border-[#dc2626] transition-all cursor-pointer group relative">
                                    <img src="{{ $image->image_path ? asset('storage/'.$image->image_path) : asset('images/placeholder.jpg') }}"
                                         alt="Perspective Array Block {{ $loop->index + 1 }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                         onerror="this.src='{{ asset('images/placeholder.jpg') }}'">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- COLUMN B: CONTROL PANEL STATION & SPECIFICATIONS READOUT (Desktop Sidebar) --}}
            <div class="lg:col-span-2 space-y-6 order-2 lg:sticky lg:top-20">
                
                {{-- Master Control Unit Layout Block --}}
                <div class="hidden lg:block border border-neutral-900 p-6 bg-neutral-950/80 backdrop-blur-lg relative shadow-2xl">
                    <div class="absolute top-0 right-0 w-[1px] h-12 bg-[#dc2626]"></div>
                    <div class="font-mono text-neutral-500 text-[10px] tracking-[0.3em] mb-1">SECURE_ACQUISITION_INTERFACE</div>
                    
                    <h1 class="text-3xl font-light text-white tracking-tight uppercase mb-4">
                        {{ $car->title }}
                    </h1>

                    <div class="font-mono text-xs text-neutral-400 border-b border-neutral-900 pb-4 mb-5 flex items-center justify-between">
                        <span>SYS_REF_ID // {{ str_pad($car->id, 6, '0', STR_PAD_LEFT) }}</span>
                        <span class="uppercase text-[#dc2626] font-bold">{{ $car->year }} MODEL</span>
                    </div>

                    <div class="mb-6 bg-neutral-900/40 p-4 border border-neutral-900">
                        <span class="block font-mono text-[10px] text-neutral-500 tracking-widest uppercase mb-1">VALUATION LEDGER</span>
                        <div class="font-mono text-4xl font-bold tracking-tight text-[#dc2626]">
                            {{ $car->price ? '₹' . number_format($car->price, 0, '.', ',') : 'Price on Request' }}
                        </div>
                    </div>

                    <div class="space-y-3">
                        <a href="#inquiry-terminal"
                           class="block w-full px-4 py-3.5 bg-[#dc2626] text-white text-center font-mono text-xs font-bold uppercase tracking-widest hover:bg-red-700 transition-all shadow-lg shadow-red-950/20 rounded-sm">
                            Initialize Secure Acquisition
                        </a>
                        <a href="tel:+91{{ $settings['phone'] ?? '' }}"
                           class="block w-full px-4 py-3.5 border border-neutral-800 text-neutral-300 text-center font-mono text-xs font-bold uppercase tracking-widest hover:border-neutral-500 hover:text-white bg-neutral-900/20 transition-all rounded-sm">
                            Route To Secure Concierge Line
                        </a>
                    </div>
                </div>

                {{-- Equipment Feature Metrics Array --}}
                @if(!empty($car->features) && $car->features->isNotEmpty())
                    <div class="border border-neutral-900 p-6 bg-neutral-950/40 backdrop-blur-sm">
                        <h3 class="text-xs font-mono tracking-widest text-neutral-400 mb-4 uppercase">INTEGRATED_EQUIPMENT_ARRAY</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($car->features as $feature)
                                <span class="text-[11px] font-mono px-3 py-1.5 border border-neutral-800 bg-neutral-950 text-neutral-300 rounded-sm hover:border-[#dc2626] hover:text-white transition-colors cursor-default">
                                    + {{ strtoupper($feature->name) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Core Structural Manifest Profile Text --}}
                @if(!empty($car->description))
                    <div class="border border-neutral-900 p-6 bg-neutral-950/40 backdrop-blur-sm">
                        <h3 class="text-xs font-mono tracking-widest text-neutral-400 mb-4 uppercase">MANIFEST_PROVENANCE_LOG</h3>
                        <p class="text-neutral-300 leading-relaxed text-xs font-mono whitespace-pre-line text-justify tracking-wide bg-black/20 p-3 border border-neutral-900/50">
                            {{ $car->description }}
                        </p>
                    </div>
                @endif
            </div>
        </div>

        {{-- 3. ULTRA-SMOOTH FRICTIONLESS DRAG PANNING RELATED ASSETS MATRIX --}}
        @if(!empty($relatedCars) && $relatedCars->isNotEmpty())
            <section class="mt-16 pt-12 border-t border-neutral-900/80 order-3">
                <div class="flex items-center justify-between mb-6 px-1">
                    <h2 class="text-xs font-mono tracking-[0.25em] text-neutral-400 flex items-center">
                        <span class="inline-block w-1.5 h-1.5 bg-[#dc2626] mr-2"></span>
                        SIMILAR_SECURE_ASSETS
                    </h2>
                    <span class="text-[10px] text-neutral-600 font-mono hidden sm:inline-block tracking-widest uppercase animate-pulse">
                        [ HOLD & SWIPE MATRIX TO EXPLORE ]
                    </span>
                </div>
                
                {{-- Horizontal Scroller Viewport with Gradient Fade Caps --}}
                <div class="relative w-full mask-edge-fade">
                    <div class="flex overflow-x-auto gap-5 pb-6 pt-2 snap-x snap-mandatory scrollbar-none select-none cursor-grab active:cursor-grabbing will-change-transform scroll-smooth" 
                         id="premiumDraggableMarquee"
                         style="-webkit-overflow-scrolling: touch;">
                        @foreach($relatedCars as $related)
                            <div class="snap-start shrink-0 w-[82%] sm:w-[45%] lg:w-[31%] group relative bg-[#09090c] border border-neutral-900 overflow-hidden transition-all duration-300 hover:border-neutral-600">
                                <a href="{{ route('cars.show', $related->slug) }}" class="block pointer-events-none group-active:pointer-events-none">
                                    <div class="aspect-[16/9] overflow-hidden relative border-b border-neutral-900 bg-neutral-950">
                                        <img src="{{ $related->primaryImage?->image_path ? asset('storage/'.$related->primaryImage->image_path) : asset('images/placeholder.jpg') }}"
                                             alt="{{ $related->title }}"
                                             class="w-full h-full object-cover transition-transform duration-700 scale-100 group-hover:scale-105"
                                             onerror="this.src='{{ asset('images/placeholder.jpg') }}'">
                                    </div>
                                    <div class="p-4 font-mono space-y-2">
                                        <div class="text-xs text-neutral-300 truncate font-light uppercase tracking-tight group-hover:text-[#dc2626] transition-colors">
                                            {{ $related->brand->name ?? '' }} {{ $related->model->name ?? '' }}
                                        </div>
                                        <div class="text-sm font-bold text-white tracking-tight flex justify-between items-center">
                                            <span class="text-[9px] text-neutral-600 uppercase font-normal">LEDGER_VAL</span>
                                            <span class="text-[#dc2626]">{{ $related->price ? '₹' . number_format($related->price, 0, '.', ',') : 'Request' }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- 4. DEDICATED INQUIRY TERMINAL MATRIX CONSOLE --}}
        <section id="inquiry-terminal" class="mt-16 pt-12 border-t border-neutral-900 order-4 scroll-mt-24">
            <div class="max-w-2xl mx-auto border border-neutral-900 bg-neutral-950/80 backdrop-blur-xl p-6 sm:p-10 shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-[#dc2626] to-transparent"></div>
                
                <h3 class="text-xs font-mono tracking-[0.3em] text-neutral-400 mb-8 flex items-center justify-center uppercase">
                    <span class="inline-block w-2 h-2 rounded-full bg-[#dc2626] mr-3 animate-ping"></span>
                    SECURE_INQUIRY_COMMUNICATION_LINK
                </h3>

                @if(session('success'))
                    <div class="mb-6 p-4 bg-emerald-950/30 text-emerald-400 text-xs border border-emerald-900 font-mono text-center tracking-wide">
                        ⚡ TRANSMISSION_SUCCESSFUL: {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('cars.inquiry.store', $car->slug) }}" class="space-y-5 font-mono text-xs">
                    @csrf
                    <div>
                        <input type="text" name="name" value="{{ old('name') }}"
                               placeholder="AUTHENTICATED APPLICANT NAME"
                               class="w-full px-4 py-3 bg-neutral-900/60 border border-neutral-800 text-white placeholder-neutral-600 focus:border-[#dc2626] focus:ring-1 focus:ring-[#dc2626]/30 outline-none transition-colors tracking-widest uppercase"
                               required maxlength="255">
                        @if($errors->has('name'))
                            <p class="mt-1 text-red-500 text-[10px] uppercase">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <input type="tel" name="phone" value="{{ old('phone') }}"
                                   placeholder="SECURE CONTACT NUMBER"
                                   class="w-full px-4 py-3 bg-neutral-900/60 border border-neutral-800 text-white placeholder-neutral-600 focus:border-[#dc2626] focus:ring-1 focus:ring-[#dc2626]/30 outline-none transition-colors tracking-widest"
                                   required maxlength="50">
                            @if($errors->has('phone'))
                                <p class="mt-1 text-red-500 text-[10px] uppercase">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                        <div>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   placeholder="ROUTING EMAIL (OPTIONAL)"
                                   class="w-full px-4 py-3 bg-neutral-900/60 border border-neutral-800 text-white placeholder-neutral-600 focus:border-[#dc2626] focus:ring-1 focus:ring-[#dc2626]/30 outline-none transition-colors tracking-widest"
                                   maxlength="255">
                            @if($errors->has('email'))
                                <p class="mt-1 text-red-500 text-[10px] uppercase">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>

                    <div>
                        <textarea name="message" rows="4"
                                  placeholder="MESSAGE / SYSTEM CONSTRAINTS OVERRIDE MATRIX"
                                  class="w-full px-4 py-3 bg-neutral-900/60 border border-neutral-800 text-white placeholder-neutral-600 focus:border-[#dc2626] focus:ring-1 focus:ring-[#dc2626]/30 outline-none transition-colors resize-none tracking-wider uppercase"
                                  required maxlength="5000">{{ old('message') ?? 'I am interested in exploring validation and procurement terms for this verified vehicle asset.' }}</textarea>
                        @if($errors->has('message'))
                            <p class="mt-1 text-red-500 text-[10px] uppercase">{{ $errors->first('message') }}</p>
                        @endif
                    </div>

                    <button type="submit"
                            class="w-full px-4 py-3.5 bg-[#dc2626] text-white font-mono text-xs uppercase tracking-[0.2em] font-bold hover:bg-red-700 active:scale-[0.99] transition-all shadow-xl shadow-red-950/30">
                        Deploy Encrypted Inquiry Signal
                    </button>
                </form>
            </div>
        </section>
    </main>
</div>

{{-- Frictionless Velocity Drag Architecture Engine --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const marquee = document.getElementById('premiumDraggableMarquee');
        if (!marquee) return;

        let isDragging = false;
        let startX;
        let initialScrollLeft;
        let velocityX = 0;
        let animationFrameId;
        let lastTimestamp;
        let lastX;

        marquee.addEventListener('mousedown', (e) => {
            isDragging = true;
            marquee.classList.remove('scroll-smooth');
            startX = e.pageX - marquee.offsetLeft;
            initialScrollLeft = marquee.scrollLeft;
            velocityX = 0;
            lastX = e.pageX;
            lastTimestamp = performance.now();
            cancelAnimationFrame(animationFrameId);
        });

        marquee.addEventListener('mouseleave', () => { if (isDragging) smoothRelease(); });
        marquee.addEventListener('mouseup', () => { if (isDragging) smoothRelease(); });

        marquee.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            e.preventDefault();

            const currentX = e.pageX - marquee.offsetLeft;
            const deltaX = (e.pageX - startX) * 1.5; // Fine-tuned drag multiplier
            marquee.scrollLeft = initialScrollLeft - deltaX;

            // Tracking velocity parameters for inertial scrolling
            const currentTimestamp = performance.now();
            const elapsed = currentTimestamp - lastTimestamp;
            if (elapsed > 0) {
                velocityX = (e.pageX - lastX) / elapsed;
            }

            lastX = e.pageX;
            lastTimestamp = currentTimestamp;
        });

        function smoothRelease() {
            isDragging = false;
            // Momentum scroll integration loop
            const momentumScroll = () => {
                if (Math.abs(velocityX) < 0.05) return;
                marquee.scrollLeft -= velocityX * 16; // Project delta scale across frame steps
                velocityX *= 0.92; // Friction vector coefficient 
                animationFrameId = requestAnimationFrame(momentumScroll);
            };
            animationFrameId = requestAnimationFrame(momentumScroll);
        }

        // Intercept inner anchor dynamic tracking configurations to prevent breaks on mouse drags
        const sliderAnchors = marquee.querySelectorAll('a');
        sliderAnchors.forEach(anchor => {
            let dragThresholdFlag = false;
            anchor.parentNode.addEventListener('mousedown', () => dragThresholdFlag = false);
            anchor.parentNode.addEventListener('mousemove', () => dragThresholdFlag = true);
            anchor.parentNode.addEventListener('mouseup', (e) => {
                if (!dragThresholdFlag) {
                    window.location.href = anchor.getAttribute('href');
                }
            });
        });
    });
</script>
@endsection