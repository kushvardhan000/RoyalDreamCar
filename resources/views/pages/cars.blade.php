@extends('layouts.app')

@section('title', $seo->meta_title ?? 'Cars - Royal Dream Car')
@section('meta_description', $seo->meta_description ?? '')
@section('meta_keywords', $seo->meta_keywords ?? '')

@push('styles')
<style>
.skeleton-grid {display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:1rem}
.skeleton-card {background:#1a1a1a;border:1px solid #27272a;border-radius:0.5rem;overflow:hidden}
.skeleton-img {aspect-ratio:16/9;background:linear-gradient(90deg,#27272a 25%,#1a1a1a 50%,#27272a 75%);background-size:200% 100%;animation:skeletonPulse 1.5s infinite}
.skeleton-line {height:1rem;background:linear-gradient(90deg,#27272a 25%,#1a1a1a 50%,#27272a 75%);background-size:200% 100%;animation:skeletonPulse 1.5s infinite;margin:0.5rem 0;border-radius:0.25rem}
@keyframes skeletonPulse{0%{background-position:200% 0}100%{background-position:-200% 0}}
#car-grid-anchor.opacity-40{transition:opacity 150ms ease-in-out}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-[#050505] text-white font-mono">
    <section class="relative w-full h-[65vh] min-h-[450px] flex items-center justify-center overflow-hidden border-b border-neutral-900 hud-grid">
        <div class="absolute inset-0">
            <img
                src="{{ \App\Helpers\ImageHelper::hero() }}"
                alt="Luxury Car"
                class="w-full h-full object-cover scale-105"
                onerror="this.onerror=null;this.src='{{ \App\Helpers\ImageHelper::fallback('car') }}';"
                loading="eager"
            />
        </div>
        <div class="absolute inset-0 bg-black/65"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/45 to-[#030303]/95"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,transparent_20%,rgba(0,0,0,0.65)_100%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(220,38,38,0.08)_0%,transparent_70%)]"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1200px] h-[1px] bg-gradient-to-r from-transparent via-neutral-700 to-transparent"></div>
        <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-[#03030333] to-transparent"></div>

        <div class="relative z-20 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-black/50 border border-neutral-700 rounded-full backdrop-blur-md">
                <span class="w-1.5 h-1.5 rounded-full bg-[#dc2626] glowing-pulse"></span>
                <span class="text-[10px] font-mono tracking-[0.3em] uppercase text-neutral-300">
                    SECURE LOGISTICS INTERFACE
                </span>
            </div>

            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extralight tracking-tighter text-white uppercase leading-none drop-shadow-2xl">
                AVAILABLE
                <span class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-white via-neutral-200 to-neutral-500">
                    ASSETS
                </span>
                <span class="text-[#dc2626]">.</span>
            </h1>

            <p class="text-xs sm:text-sm font-mono text-neutral-300 max-w-xl mx-auto tracking-wide leading-relaxed">
                Vault Status:
                <span class="text-white font-bold">
                    {{ $cars->total() ?? 0 }} Units Ready
                </span>
            </p>
        </div>
    </section>

    <div id="filter-anchor" class="sticky top-0 z-40 bg-[#030303]/90 backdrop-blur-xl border-b border-neutral-800/80 shadow-2xl transition-all duration-300">
        <div id="filter-container">
            @include('partials.filter-bar', [
                'brands' => $brands ?? collect(),
                'models' => $models ?? collect(),
                'fuelTypes' => $fuelTypes ?? collect(),
                'transmissions' => $transmissions ?? collect(),
                'years' => $years ?? collect(),
                'ownerships' => $ownerships ?? collect(),
                'request' => $request,
            ])
        </div>
    </div>

    <div id="car-grid-anchor" class="max-w-7xl mx-auto px-6 py-8 transition-opacity duration-300">
        <div id="car-grid-wrapper">
            @include('partials.car-grid', ['cars' => $cars ?? collect()])
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/car-filter.js') }}"></script>
@endpush