@php
    use App\Helpers\ImageHelper;
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="car-grid">
    @if(!empty($cars) && $cars->isNotEmpty())
        @foreach($cars as $car)
            <a href="{{ route('cars.show', $car->slug) }}" class="group block relative bg-white/5 border border-white/10 rounded-lg overflow-hidden transition-all duration-300 hover:border-[#dc2626]/50">
                <div class="aspect-[16/9] overflow-hidden bg-neutral-900">
                    <img
                        src="{{ ImageHelper::resolve($car->primaryImage?->image_path) }}"
                        alt="{{ $car->title }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105 opacity-0"
                        loading="lazy"
                        onload="this.style.opacity='1'"
                        onerror="this.onerror=null;this.src='{{ ImageHelper::fallback('car') }}';this.style.opacity='1';"
                    />
                    <div class="skeleton-img absolute inset-0 -z-10"></div>
                </div>

                <div class="p-4 space-y-3">
                    <div>
                        <h3 class="font-bold text-lg text-white group-hover:text-[#dc2626] transition-colors">
                            {{ $car->brand->name ?? 'Unknown Brand' }} {{ $car->model->name ?? 'Unknown Model' }}
                        </h3>
                        <p class="text-white/60 text-sm">{{ $car->title }}</p>
                    </div>

                    <div class="font-mono text-xl text-[#dc2626]">
                        {{ $car->price ? '₹' . number_format($car->price, 0, '.', ',') : 'Price on Request' }}
                    </div>

                    <div class="flex items-center justify-between text-xs text-white/50 font-mono">
                        <span>{{ $car->year ?? 'N/A' }}</span>
                        <span>{{ $car->mileage ? number_format($car->mileage, 0, '.', ',') . ' km' : 'N/A' }}</span>
                        <span class="px-2 py-0.5 border border-white/20 rounded">{{ ucfirst($car->fuel_type ?? 'N/A') }}</span>
                    </div>
                </div>
            </a>
        @endforeach

        @if(method_exists($cars, 'links') && $cars->hasPages())
            <div class="col-span-full mt-8" id="pagination-links">
                {{ $cars->appends(request()->except('page', 'ajax'))->links() }}
            </div>
        @endif
    @else
        <div class="col-span-full text-center py-20">
            <div class="font-mono text-white/60 space-y-2">
                <div class="text-6xl text-[#dc2626]/30">404</div>
                <div class="text-xl">No assets match current parameters</div>
            </div>
            <button onclick="resetFilters()" class="inline-block mt-6 px-6 py-2 border border-[#dc2626] text-[#dc2626] rounded hover:bg-[#dc2626] hover:text-white transition-all">
                Reset Configuration
            </button>
        </div>
    @endif
</div>