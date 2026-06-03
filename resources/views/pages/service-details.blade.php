@extends('layouts.app')

@section('title', $seo->meta_title ?? (($service) ? strtoupper($service->title) . ' - PLATFORM DOSSIER' : 'TECHNICAL MATRIX'))
@section('meta_description', $seo->meta_description ?? (($service) ? strip_tags($service->description) : ''))
@section('meta_keywords', $seo->meta_keywords ?? 'telemetry data, supercar parameters, technical allocation')

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

    .dossier-panel {
        background: rgba(10, 10, 10, 0.6);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.04);
    }
</style>

<div class="relative w-full min-h-screen bg-[#050505] cyber-grid overflow-hidden pt-12">
    @if($service)
        @php
            // Beautiful and Strict Rupee Metric Format Parsing Helper
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

        <div class="max-w-7xl mx-auto px-6 lg:px-8 mt-10 relative z-30">
            <nav class="inline-flex items-center gap-2 text-[10px] font-mono uppercase tracking-widest text-neutral-500 border-b border-white/5 pb-2 w-full">
                <a href="{{ url('/services') }}" class="hover:text-red-500 transition-colors">DIRECTORY</a>
                <span>//</span>
                <span class="text-neutral-300">CORE_PRTCL_{{ sprintf('%03d', $service->id) }}</span>
            </nav>
        </div>

        <section class="py-8 px-6 lg:px-8 max-w-7xl mx-auto relative z-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:items-start">
                
                <div class="lg:col-span-5 space-y-6 flex flex-col order-1">
                    
                    <div class="block">
                        <span class="text-xs font-mono text-red-500 tracking-[0.3em] uppercase block mb-1">DESTRUCTIVE TESTING MATRIX</span>
                        <h1 class="text-2xl md:text-4xl font-black uppercase tracking-tight text-white leading-tight">
                            {{ $service->title ?? 'SPECIFICATION SCHEDULER' }}
                        </h1>
                    </div>

                    <div class="w-full aspect-[16/10] bg-neutral-950 border border-white/5 relative rounded-sm overflow-hidden group shadow-2xl">
                        @if(!empty($service->image))
                            <img src="{{ asset('storage/' . $service->image) }}" 
                                 alt="{{ $service->title }}" 
                                 class="w-full h-full object-cover grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-80 transition-all duration-700 ease-in-out"
                                 onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1000&auto=format&fit=crop';">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-[#090909]">
                                <svg class="w-12 h-12 text-neutral-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                        <div class="absolute bottom-3 left-3 bg-black/90 text-red-500 font-mono text-xs px-3 py-1 border border-red-900/30 tracking-widest font-bold">
                            {{ $formattedPrice }}
                        </div>
                    </div>

                    <div class="dossier-panel p-5 rounded-sm border-t-2 border-t-red-600 space-y-3 shadow-xl">
                        <div class="text-[10px] text-neutral-400 font-mono uppercase tracking-wider mb-2 flex justify-between">
                            <span>ALLOCATION ENGINE</span>
                            <span class="text-red-500 font-bold">READY TO DEPLOY</span>
                        </div>
                        
                        <a href="{{ url('/book-service?protocol=' . ($service->slug ?? 'default')) }}" 
                           class="flex items-center justify-center w-full px-4 py-3.5 bg-red-600 text-white font-black uppercase text-xs tracking-[0.2em] rounded-sm transition-all duration-300 hover:bg-red-500 hover:shadow-[0_0_25px_rgba(220,38,38,0.3)]">
                            REQUEST ALLOCATION
                        </a>
                        
                        <a href="{{ url('/contact?ref=' . ($service->slug ?? 'general')) }}" 
                           class="flex items-center justify-center w-full px-4 py-3.5 border border-white/10 text-white font-bold uppercase text-xs tracking-[0.2em] rounded-sm transition-all duration-300 hover:bg-white hover:text-black hover:border-white">
                            CONSULT DESK
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-7 space-y-6 order-2">
                    
                    <div class="dossier-panel p-6 sm:p-8 rounded-sm relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-[1px] bg-red-600"></div>
                        <div class="absolute top-0 right-0 w-[1px] h-24 bg-red-600"></div>

                        <div class="inline-flex items-center gap-2 mb-4 font-mono text-[10px] text-neutral-400 tracking-widest uppercase">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full animate-ping"></span>
                            <span>FUNCTIONAL PARAMETERS DISCLOSURE</span>
                        </div>
                        
                        <div class="text-xs sm:text-sm text-neutral-300 leading-relaxed font-sans space-y-4 tracking-wide">
                            @if(!empty($service->description))
                                {!! nl2br(e($service->description)) !!}
                            @else
                                <p class="text-neutral-500 italic font-mono">No supplementary structural analysis documentation defined inside telemetry node repository.</p>
                            @endif
                        </div>
                    </div>

                    <div class="dossier-panel rounded-sm overflow-hidden shadow-xl">
                        <div class="bg-neutral-900/60 px-5 py-3 border-b border-white/5 font-mono text-[10px] text-red-500 font-bold tracking-wider uppercase">
                            SPECIFICATION SCHEDULER DATA ARRAY
                        </div>
                        <div class="divide-y divide-white/5 font-mono text-xs">
                            <div class="grid grid-cols-3 p-4 hover:bg-white/[0.01] transition-colors">
                                <div class="text-neutral-500 uppercase tracking-wider font-semibold">CORE PROTOCOL ID</div>
                                <div class="col-span-2 text-neutral-200 uppercase">SYS_RDC_{{ sprintf('%04d', $service->id) }}</div>
                            </div>
                            <div class="grid grid-cols-3 p-4 hover:bg-white/[0.01] transition-colors">
                                <div class="text-neutral-500 uppercase tracking-wider font-semibold">EQUIPMENT MATRICES</div>
                                <div class="col-span-2 text-neutral-200 uppercase">FACTORY OPTIMIZED LASER TELEMETRY FLUID APPARATUS</div>
                            </div>
                            <div class="grid grid-cols-3 p-4 hover:bg-white/[0.01] transition-colors">
                                <div class="text-neutral-500 uppercase tracking-wider font-semibold">CLEARANCE REQUIREMENT</div>
                                <div class="col-span-2 text-red-500 uppercase font-bold">LEVEL 4 HIGH-PERFORMANCE CLEARANCE GRANTED</div>
                            </div>
                            <div class="grid grid-cols-3 p-4 hover:bg-white/[0.01] transition-colors">
                                <div class="text-neutral-500 uppercase tracking-wider font-semibold">OPERATIONAL METRIC</div>
                                <div class="col-span-2 text-neutral-200 uppercase">PEAK CALIBRATION // STABLE OUTPUT TOLERANCE</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        @if($relatedServices && $relatedServices->isNotEmpty())
            <section class="py-16 px-6 lg:px-8 max-w-7xl mx-auto border-t border-white/5 mt-12 relative z-20">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                    <div>
                        <h2 class="text-xl font-black uppercase tracking-tight text-white">PARALLEL OPERATIONAL ARRAYS</h2>
                        <p class="text-[10px] text-neutral-500 font-mono uppercase tracking-widest mt-0.5">Cross-service synchronization options</p>
                    </div>
                    <a href="{{ url('/services') }}" class="text-[10px] font-bold font-mono uppercase tracking-widest text-red-500 hover:text-white transition-colors">
                        OPEN COMPLETE REGISTRY &rarr;
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    @foreach($relatedServices as $index => $related)
                        @php
                            $relatedPrice = 'PRICE ON REQUEST';
                            if (!empty($related->price)) {
                                $cleanPriceRelated = preg_replace('/[^\d.]/', '', $related->price);
                                if (is_numeric($cleanPriceRelated) && (float)$cleanPriceRelated > 0) {
                                    $relatedPrice = '₹' . number_format((float)$cleanPriceRelated, 0, '.', ',');
                                } else {
                                    $relatedPrice = strtoupper(trim($related->price));
                                }
                            }
                        @endphp
                        
                        <div class="dossier-panel p-5 rounded-sm hover:border-red-600/30 hover:bg-white/[0.01] transition-all duration-300 group flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between text-[10px] font-mono text-neutral-500 mb-2">
                                    <span>PRTCL_{{ sprintf('%02d', $related->id ?? $loop->index) }}</span>
                                    <span class="text-red-500 font-bold font-mono">{{ $relatedPrice }}</span>
                                </div>
                                <h3 class="text-sm font-black uppercase tracking-tight text-white group-hover:text-red-500 transition-colors line-clamp-1">
                                    {{ $related->title ?? 'UNREGISTERED DECK' }}
                                </h3>
                                <p class="text-neutral-400 font-mono text-[11px] mt-2 line-clamp-2 leading-relaxed">
                                    {{ $related->description ?? 'No tracking operational telemetry summary uploaded.' }}
                                </p>
                            </div>
                            
                            <div class="mt-4 pt-3 border-t border-white/5 flex items-center justify-end">
                                <a href="{{ route('service-details', $related->slug ?? '#') }}" class="text-[10px] font-bold font-mono uppercase tracking-wider text-neutral-300 hover:text-red-500 transition-colors">
                                    ANALYSIS VECTOR &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

    @else
        <section class="py-32 px-6 max-w-xl mx-auto text-center relative z-20">
            <div class="dossier-panel p-8 rounded-sm border border-red-900/40">
                <div class="w-12 h-12 bg-red-950/40 border border-red-800/40 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h1 class="text-lg font-black uppercase text-white tracking-widest mb-2">VECTOR MISSING</h1>
                <p class="text-xs font-mono text-neutral-400 uppercase max-w-sm mx-auto mb-6 leading-relaxed">
                    The requested data stream node coordinates are disconnected or restricted. Verification token error.
                </p>
                <a href="{{ url('/services') }}" class="inline-flex px-5 py-2.5 border border-red-600 text-red-500 font-bold font-mono text-xs tracking-widest rounded-sm hover:bg-red-600 hover:text-white transition-all shadow-lg">
                    RESET DIRECTORY PATHWAY
                </a>
            </div>
        </section>
    @endif
</div>
@endsection