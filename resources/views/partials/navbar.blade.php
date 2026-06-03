@php
$mobileMenuItems = [
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'About', 'url' => route('about')],
    ['label' => 'Cars', 'url' => route('cars.index')],
    ['label' => 'Services', 'url' => route('services.index')],
    ['label' => 'Contact', 'url' => route('contact')],
];
@endphp

<nav
    x-data="{
        mobileMenuOpen: false
    }"
    x-init="$watch('mobileMenuOpen', value => document.body.style.overflow = value ? 'hidden' : '')"
    @keydown.escape.window="mobileMenuOpen = false"
    class="fixed top-0 left-0 right-0 z-50 bg-[#0A0A0A] border-b border-white/5 shadow-xl"
>
    <div class="mx-auto max-w-[1920px] px-4 sm:px-6 lg:px-12">
        <div class="flex items-center justify-between h-24">

            {{-- Brand Logo --}}
            <a href="{{ route('home') }}" class="group relative flex items-center">
                <h1 class="text-xl md:text-2xl font-light tracking-[0.25em] text-[#FFFFFF] uppercase">
                    Royal
                    <span class="font-bold text-[#E31837] ml-2 transition-colors duration-300 group-hover:text-white">
                        Dream Car
                    </span>
                </h1>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex items-center space-x-10">
                @foreach([
                    'Home' => route('home'),
                    'About' => route('about'),
                    'Cars' => route('cars.index'),
                    'Services' => route('services.index'),
                    'Contact' => route('contact')
                ] as $label => $url)

                    <a
                        href="{{ $url }}"
                        class="relative text-xs font-semibold uppercase tracking-[0.15em] text-[#B3B3B3] transition-colors duration-300 hover:text-[#FFFFFF] py-2 group"
                    >
                        {{ $label }}

                        <span class="absolute bottom-0 left-0 w-0 h-[2px] bg-[#E31837] transition-all duration-500 ease-out group-hover:w-full"></span>
                    </a>

                @endforeach
            </div>

            {{-- Desktop CTA --}}
            <div class="hidden lg:flex items-center space-x-8">

                <a
                    href="tel:+919999999999"
                    class="text-xs font-semibold tracking-[0.15em] text-[#B3B3B3] transition-colors duration-300 hover:text-[#E31837]"
                >
                    +91 99999 99999
                </a>

                <a
                    href="{{ route('cars.index') }}"
                    class="inline-flex items-center justify-center px-8 py-3 text-xs font-bold uppercase tracking-[0.2em] text-[#FFFFFF] bg-[#E31837] transition-all duration-300 hover:bg-white hover:text-black hover:shadow-[0_0_25px_rgba(227,24,55,0.3)]"
                >
                    View Collection
                </a>

            </div>

            {{-- Mobile Toggle Button --}}
            <button
                @click="mobileMenuOpen = !mobileMenuOpen"
                class="lg:hidden relative z-[60] flex h-11 w-11 flex-col items-center justify-center border border-white/10 bg-white/5 text-white transition-all duration-300 hover:bg-white/10 focus:outline-none"
                aria-label="Toggle Menu"
            >
                <div class="flex flex-col justify-between w-5 h-3.5 relative">
                    <span
                        class="block h-0.5 w-full bg-white transform transition-all duration-300 ease-in-out origin-left"
                        :class="{ 'rotate-45 translate-x-[2px] -translate-y-[1px]': mobileMenuOpen }"
                    ></span>

                    <span
                        class="block h-0.5 w-full bg-white transition-all duration-200 ease-in-out"
                        :class="{ 'opacity-0 scale-x-0': mobileMenuOpen }"
                    ></span>

                    <span
                        class="block h-0.5 w-full bg-white transform transition-all duration-300 ease-in-out origin-left"
                        :class="{ '-rotate-45 translate-x-[2px] translate-y-[1px]': mobileMenuOpen }"
                    ></span>
                </div>
            </button>

        </div>
    </div>

    {{-- Overlay Background Backdrop --}}
    <div
        x-show="mobileMenuOpen"
        x-transition.opacity.duration.300ms
        @click="mobileMenuOpen = false"
        class="fixed inset-0 bg-black/80 backdrop-blur-md z-40 lg:hidden"
        style="display:none;"
    ></div>

    {{-- Mobile Sidebar Drawer Panel --}}
    <div
        x-show="mobileMenuOpen"
        x-transition:enter="transform transition ease-in-out duration-500"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in-out duration-500"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed top-0 right-0 z-50 h-screen w-full max-w-sm bg-[#121212] border-l border-white/5 shadow-2xl lg:hidden"
        style="display:none;"
        @click.stop
    >

        <div class="flex h-full flex-col px-8 pt-32 pb-10">

            <nav class="space-y-8">

                @foreach($mobileMenuItems as $index => $item)

                    <div
                        x-show="mobileMenuOpen"
                        x-transition.opacity.duration.500ms
                        style="transition-delay: {{ $index * 80 }}ms"
                    >
                        <a
                            href="{{ $item['url'] }}"
                            @click="mobileMenuOpen = false"
                            class="block text-2xl font-light uppercase tracking-[0.15em] text-white hover:text-[#E31837] transition-colors duration-300"
                        >
                            {{ $item['label'] }}
                        </a>
                    </div>

                @endforeach

            </nav>

            <div class="mt-auto border-t border-white/10 pt-8 space-y-6">

                <a
                    href="tel:+919999999999"
                    class="block text-sm font-semibold tracking-[0.15em] text-[#B3B3B3] hover:text-[#E31837] transition-colors"
                >
                    CALL: +91 99999 99999
                </a>

                <a
                    href="{{ route('cars.index') }}"
                    class="inline-flex w-full items-center justify-center px-8 py-4 text-sm font-bold uppercase tracking-[0.2em] text-white bg-[#E31837] transition-all duration-300 hover:bg-white hover:text-black"
                >
                    View Collection
                </a>

            </div>

        </div>

    </div>
</nav>

<div class="h-18"></div>