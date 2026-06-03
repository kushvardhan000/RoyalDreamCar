
<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Basic Meta --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- SEO --}}
    <title>@yield('title', $settings['site_name'] ?? 'Royal Dream Car')</title>

    <meta
        name="description"
        content="@yield('meta_description', $settings['meta_description'] ?? 'Royal Dream Car - Premium Luxury Automobile Dealership')"
    >

    <meta
        name="keywords"
        content="@yield('meta_keywords', 'Luxury Cars, BMW, Mercedes-Benz, Audi, Porsche, Royal Dream Car')"
    >

    <meta name="author" content="Royal Dream Car">
    <meta name="robots" content="index, follow">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', $settings['site_name'] ?? 'Royal Dream Car')">
    <meta property="og:description" content="@yield('meta_description', $settings['meta_description'] ?? '')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', $settings['site_name'] ?? 'Royal Dream Car')">
    <meta name="twitter:description" content="@yield('meta_description', $settings['meta_description'] ?? '')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-image.jpg'))">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="min-h-screen bg-black text-white antialiased">

    {{-- Luxury Background Elements --}}
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-black via-zinc-950 to-black"></div>

        <div
            class="absolute top-0 left-1/2 h-[500px] w-[500px] -translate-x-1/2 rounded-full bg-amber-500/5 blur-3xl">
        </div>
    </div>

    {{-- Navigation --}}
    @include('partials.navbar')

    {{-- Main Content --}}
    <main class="relative overflow-hidden">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    @stack('scripts')

</body>
</html>
