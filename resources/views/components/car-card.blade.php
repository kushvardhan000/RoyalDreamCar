<div class="bg-white/5 backdrop-blur-sm rounded-2xl overflow-hidden border border-white/10 hover:border-white/20 transition-colors transform hover:-translate-y-1">
    <div class="relative">
        <!-- Image -->
        <x-image :path="$car->primaryImage?->image_path" />

        <!-- Featured and Sold badges -->
        <div class="absolute top-3 left-3 flex gap-2">
            @if($car->featured)
                <span class="px-2 py-1 bg-red-500 text-white text-xs font-medium rounded-full">Featured</span>
            @endif
            @if($car->sold)
                <span class="px-2 py-1 bg-gray-500 text-white text-xs font-medium rounded-full">Sold</span>
            @endif
        </div>
    </div>

    <div class="p-4">
        <div class="mb-2">
            <h3 class="text-xl font-semibold text-white hover:text-red-500 transition-colors">
                {{ $car->title }}
            </h3>
            <p class="text-white/60 mt-1">
                {{ $car->brand->name ?? '' }} {{ $car->model->name ?? '' }}
            </p>
        </div>

        <div class="mb-2 flex flex-col sm:flex-row sm:justify-between sm:items-center">
            <p class="text-amber-400 font-bold text-lg mb-1 sm:mb-0">
                {{ $car->price ? number_format($car->price, 0, ',', ',') : 'Price on Request' }}
            </p>
            <div class="text-white/50 text-sm flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="mb-1 sm:mb-0 sm:mr-4">
                    <span class="mr-1">📅</span> {{ $car->year }}
                </div>
                <div>
                    <span class="mr-1">🛣️</span> {{ number_format($car->mileage, 0) }} km
                </div>
            </div>
        </div>

        <div class="mt-2 flex flex-wrap gap-1">
            <span class="bg-white/10 text-white/80 px-2 py-0.5 rounded text-xs">{{ $car->fuel_type }}</span>
            <span class="bg-white/10 text-white/80 px-2 py-0.5 rounded text-xs">{{ $car->transmission }}</span>
        </div>

        <div class="mt-3">
            <a href="{{ route('cars.show', $car->slug) }}" class="w-full px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white font-medium rounded-lg transition-colors hover:shadow-lg">
                View Details
            </a>
        </div>
    </div>
</div>