@extends('layouts.app')

@section('title', $seo->meta_title ?? 'OPERATIONAL DIRECTORY - ROYAL DREAM CAR')
@section('meta_description', $seo->meta_description ?? 'Access premium hypercar calibration, telemetry synchronization, and mechanical restoration protocols.')
@section('meta_keywords', $seo->meta_keywords ?? 'supercar service, hypercar tuning, telemetry diagnostics')

@section('content')
<style>
    :root {
        --rdc-onyx: #050505;
        --rdc-laser-red: #dc2626;
        --rdc-titanium: #ffffff;
    }

    body {
        background-color: var(--rdc-onyx) !important;
        color: var(--rdc-titanium);
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    }

    .cyber-grid {
        background-image: radial-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 0);
        background-size: 20px 20px;
    }

    .tech-plate {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.01) 0%, rgba(255, 255, 255, 0.03) 100%);
        border: 1px solid rgba(255, 255, 255, 0.04);
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .tech-plate:hover {
        border-color: rgba(220, 38, 38, 0.4);
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.02) 0%, rgba(220, 38, 38, 0.02) 100%);
        box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.7), 0 0 30px rgba(220, 38, 38, 0.05);
    }

    .bracket {
        position: absolute;
        width: 6px;
        height: 6px;
        border-color: var(--rdc-laser-red);
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .tech-plate:hover .bracket {
        opacity: 1;
    }

    .tech-plate:hover .bracket-tl { top: 12px; left: 12px; border-top-width: 1.5px; border-left-width: 1.5px; }
    .tech-plate:hover .bracket-tr { top: 12px; right: 12px; border-top-width: 1.5px; border-right-width: 1.5px; }
    .tech-plate:hover .bracket-bl { bottom: 12px; left: 12px; border-bottom-width: 1.5px; border-left-width: 1.5px; }
    .tech-plate:hover .bracket-br { bottom: 12px; right: 12px; border-bottom-width: 1.5px; border-right-width: 1.5px; }

    .line-sweep {
        position: relative;
        overflow: hidden;
    }
    .line-sweep::after {
        content: '';
        position: absolute;
        top: 0; left: -100%; width: 50%; hieght: 100%;
        background: linear-gradient(to right, transparent, rgba(220, 38, 38, 0.05), transparent);
        transform: skewX(-25deg);
    }
    .tech-plate:hover .line-sweep::after {
        animation: sweep 1.5s ease-in-out infinite;
    }
    @keyframes sweep {
        100% { left: 200%; }
    }
</style>

<div class="relative w-full min-h-screen bg-[#050505] cyber-grid overflow-hidden pt-12">
    
    <section class="relative w-full h-[40vh] min-h-[320px] flex items-center border-b border-white/5 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat desaturate opacity-25 scale-105" 
             style="background-image: url('https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?q=80&w=1920&auto=format&fit=crop');">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#05050598] via-[#050505]/90 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#05050531] to-transparent"></div>
        
        <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-8">
            <div class="inline-flex items-center gap-2 mb-3 bg-red-950/30 border border-red-900/40 px-3 py-1 rounded-sm">
                <span class="w-1.5 h-1.5 bg-red-600 animate-pulse rounded-full"></span>
                <span class="text-[10px] uppercase font-mono tracking-[0.4em] text-red-500 font-bold">SYSTEM STATUS: OPERATIONAL</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tighter text-white">
                LABORATORY <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-neutral-400">PROTOCOLS</span>
            </h1>
            <p class="text-xs md:text-sm text-neutral-400 font-mono tracking-wide max-w-xl mt-2 uppercase border-l border-red-600 pl-4">
                Deploying advanced diagnostic frameworks and instrumentation matrixing for elite baseline supercar specifications.
            </p>
        </div>
        
        <div class="absolute right-8 bottom-4 hidden lg:block text-right text-[9px] font-mono text-neutral-600 select-none pointer-events-none">
            <div>SYS.LOC // GRID_ALPHA_2026</div>
            <div>LATENCY // 0.002ms // SECURE</div>
        </div>
    </section>

    <section class="py-16 px-6 lg:px-8 max-w-7xl mx-auto relative z-20">
        @if($services && $services->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($services as $index => $service)
                    @php
                        // Sophisticated Currency Extraction Logic Fallback
                        $formattedPrice = 'PRICE ON REQUEST';
                        if (!empty($service->price)) {
                            $cleanPrice = preg_replace('/[^\d.]/', '', $service->price);
                            if (is_numeric($cleanPrice) && (float)$cleanPrice > 0) {
                                $formattedPrice = '₹' . number_format((float)$cleanPrice, 0, '.', ',');
                            } else {
                                $formattedPrice = strtoupper(trim($service->price));
                            }
                        }
                    @endphp
                    
                    <div class="tech-plate relative group rounded-sm overflow-hidden flex flex-col sm:flex-row aspect-none sm:aspect-[16/7] md:aspect-[16/8] lg:aspect-[16/7] line-sweep">
                        <div class="bracket bracket-tl"></div>
                        <div class="bracket bracket-tr"></div>
                        <div class="bracket bracket-bl"></div>
                        <div class="bracket bracket-br"></div>

                        <div class="w-full sm:w-5/12 relative h-48 sm:h-full border-b sm:border-b-0 sm:border-r border-white/5 bg-neutral-950 overflow-hidden shrink-0">
                            @if(!empty($service->image))
                                <img src="{{ asset('storage/' . $service->image) }}" 
                                     alt="{{ $service->title }}" 
                                     class="w-full h-full object-cover grayscale opacity-40 group-hover:grayscale-0 group-hover:opacity-80 group-hover:scale-105 transition-all duration-700 ease-out"
                                     loading="lazy"
                                     onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?q=80&w=600&auto=format&fit=crop';">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center p-4 bg-gradient-to-b from-neutral-900 to-[#090909]">
                                    <svg class="w-8 h-8 text-neutral-700 group-hover:text-red-600/40 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 5h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2z" />
                                    </svg>
                                    <span class="text-[9px] font-mono text-neutral-600 mt-2 tracking-widest uppercase">NO IMAGE RAW</span>
                                </div>
                            @endif
                            <div class="absolute top-3 left-3 bg-black/80 backdrop-blur-md px-2 py-0.5 border border-white/10 text-[9px] text-neutral-400 font-mono">
                                TRK_ID_{{ sprintf('%03d', $service->id ?? $loop->index) }}
                            </div>
                        </div>

                        <div class="p-6 flex flex-col justify-between flex-grow bg-[#080808]/40 sm:bg-transparent">
                            <div>
                                <div class="flex items-center justify-between gap-2 mb-1">
                                    <span class="text-[10px] font-mono text-red-500 font-bold tracking-widest">METRIC DIAGNOSTIC</span>
                                    <span class="text-[11px] font-mono text-white/90 font-semibold bg-white/5 px-2 py-0.5 rounded-sm border border-white/5 shadow-sm">
                                        {{ $formattedPrice }}
                                    </span>
                                </div>
                                <h3 class="text-lg font-black uppercase text-white tracking-tight group-hover:text-red-500 transition-colors duration-300 line-clamp-1">
                                    {{ $service->title ?? 'UNNAMED PROTOCOL' }}
                                </h3>
                                
                                <p class="text-neutral-400 font-mono text-xs mt-3 leading-relaxed line-clamp-2 sm:line-clamp-3 group-hover:text-neutral-200 transition-colors duration-300">
                                    {{ $service->description ?? 'No structured dossier details present for the selected mechanical procedure framework.' }}
                                </p>
                            </div>

                            <div class="mt-4 pt-4 border-t border-white/5 flex items-center justify-between">
                                <span class="text-[9px] font-mono text-neutral-500 uppercase tracking-wider">CLEARANCE Lvl_1</span>
                                <a href="{{ route('service-details', $service->slug ?? '#') }}" 
                                   class="inline-flex items-center gap-2 text-[11px] font-bold uppercase tracking-widest text-white group/link hover:text-red-500 transition-colors">
                                    <span>ENGAGE ENGINE</span>
                                    <svg class="w-3 h-3 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if(method_exists($services, 'links'))
                <div class="mt-16 flex justify-center">
                    <div class="bg-neutral-950 px-4 py-2 border border-white/5 rounded-sm font-mono text-xs">
                        {{ $services->links() }}
                    </div>
                </div>
            @endif
        @else
            <div class="text-center py-24 border border-dashed border-red-900/30 bg-[#0a0a0a] max-w-xl mx-auto rounded-sm">
                <div class="w-12 h-12 rounded-full bg-red-950/50 border border-red-800/40 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="text-base font-bold uppercase tracking-widest text-white mb-2">DIRECTORY VECTOR EMPTY</h3>
                <p class="text-xs text-neutral-500 font-mono max-w-sm mx-auto mb-6 px-4 uppercase">
                    Central database execution yielded zero published operational arrays. Emergency routing required.
                </p>
                <a href="{{ url('/contact') }}" class="inline-flex px-5 py-2.5 bg-red-600 text-white font-bold font-mono uppercase text-xs tracking-widest rounded-sm hover:bg-red-500 transition-colors shadow-lg shadow-red-950/40">
                    ESTABLISH LINK
                </a>
            </div>
        @endif
    </section>
</div>
@endsection