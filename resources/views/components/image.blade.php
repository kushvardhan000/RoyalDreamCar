@php
    $imagePath = $path ?? '';
    $url = \App\Helpers\ImageHelper::resolve($imagePath);
    $loading = $loading ?? 'lazy';
@endphp

<img
    src="{{ $url }}"
    alt="{{ $alt ?? 'Car image' }}"
    class="{{ $class ?? '' }}"
    loading="{{ $loading }}"
    @if($loading === 'lazy') decoding="async" @endif
    onerror="this.onerror=null;this.src='{{ \App\Helpers\ImageHelper::fallback('car') }}';this.classList.add('fallback-loaded');"
>