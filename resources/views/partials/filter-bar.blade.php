@php
    use App\Helpers\ImageHelper;
@endphp

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <form method="GET" action="{{ url()->current() }}" id="filter-form" class="flex flex-col lg:flex-row gap-4 items-stretch lg:items-center">

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:flex lg:flex-wrap items-center gap-3 flex-1">
            <div class="relative col-span-2 sm:col-span-3 md:col-span-2 lg:w-60">
                <input type="text" name="search" value="{{ $request->input('search') }}" placeholder="Search portfolio..."
                       class="w-full pl-9 pr-4 py-2.5 bg-neutral-900 border border-neutral-700 hover:border-neutral-600 rounded-md text-white placeholder-neutral-500 focus:border-[#dc2626] focus:ring-1 focus:ring-[#dc2626] transition-all outline-none text-xs font-mono">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-neutral-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <div class="relative">
                <select name="brand_id" class="premium-select w-full pr-8 pl-3 py-2.5 bg-neutral-900 border border-neutral-700 text-white font-mono text-xs rounded-md focus:border-[#dc2626] focus:ring-1 focus:ring-[#dc2626] outline-none cursor-pointer transition-colors hover:bg-neutral-800">
                    <option value="">[ BRAND ]</option>
                    @foreach(($brands ?? collect()) as $brand)
                        <option value="{{ $brand->id }}" {{ $request->input('brand_id') == $brand->id ? 'selected' : '' }}>
                            {{ strtoupper($brand->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="relative">
                <select name="model_id" class="premium-select w-full pr-8 pl-3 py-2.5 bg-neutral-900 border border-neutral-700 text-white font-mono text-xs rounded-md focus:border-[#dc2626] focus:ring-1 focus:ring-[#dc2626] outline-none cursor-pointer transition-colors hover:bg-neutral-800">
                    <option value="">[ MODEL ]</option>
                    @foreach(($models ?? collect()) as $model)
                        <option value="{{ $model->id }}" {{ $request->input('model_id') == $model->id ? 'selected' : '' }}>
                            {{ strtoupper($model->brand->name ?? '') }} {{ strtoupper($model->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="relative">
                <select name="fuel_type" class="premium-select w-full pr-8 pl-3 py-2.5 bg-neutral-900 border border-neutral-700 text-white font-mono text-xs rounded-md focus:border-[#dc2626] focus:ring-1 focus:ring-[#dc2626] outline-none cursor-pointer transition-colors hover:bg-neutral-800">
                    <option value="">[ FUEL ]</option>
                    @foreach(($fuelTypes ?? collect()) as $fuelType)
                        <option value="{{ $fuelType }}" {{ $request->input('fuel_type') == $fuelType ? 'selected' : '' }}>
                            {{ strtoupper($fuelType) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="relative">
                <select name="transmission" class="premium-select w-full pr-8 pl-3 py-2.5 bg-neutral-900 border border-neutral-700 text-white font-mono text-xs rounded-md focus:border-[#dc2626] focus:ring-1 focus:ring-[#dc2626] outline-none cursor-pointer transition-colors hover:bg-neutral-800">
                    <option value="">[ GEARS ]</option>
                    @foreach(($transmissions ?? collect()) as $transmission)
                        <option value="{{ $transmission }}" {{ $request->input('transmission') == $transmission ? 'selected' : '' }}>
                            {{ strtoupper($transmission) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="relative">
                <select name="year" class="premium-select w-full pr-8 pl-3 py-2.5 bg-neutral-900 border border-neutral-700 text-white font-mono text-xs rounded-md focus:border-[#dc2626] focus:ring-1 focus:ring-[#dc2626] outline-none cursor-pointer transition-colors hover:bg-neutral-800">
                    <option value="">[ YEAR ]</option>
                    @foreach(($years ?? collect()) as $year)
                        <option value="{{ $year }}" {{ $request->input('year') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="relative">
                <select name="ownership" class="premium-select w-full pr-8 pl-3 py-2.5 bg-neutral-900 border border-neutral-700 text-white font-mono text-xs rounded-md focus:border-[#dc2626] focus:ring-1 focus:ring-[#dc2626] outline-none cursor-pointer transition-colors hover:bg-neutral-800">
                    <option value="">[ OWNER ]</option>
                    @foreach(($ownerships ?? collect()) as $ownership)
                        <option value="{{ $ownership }}" {{ $request->input('ownership') == $ownership ? 'selected' : '' }}>
                            {{ strtoupper($ownership) }}
                        </option>
                    @endforeach
                </select>
            </div>

            @if($request->anyFilled(['search', 'brand_id', 'model_id', 'fuel_type', 'transmission', 'year', 'ownership']))
                <button type="button" onclick="resetFilters()" class="inline-flex items-center justify-center px-4 py-2 text-xs font-mono uppercase tracking-wider text-neutral-400 hover:text-[#dc2626] transition-colors border border-dashed border-neutral-800 hover:border-[#dc2626]/30 rounded-md w-full lg:w-auto">
                    Clear Filters
                </button>
            @endif
        </div>

        <div class="flex items-center gap-2 border-t border-neutral-800 lg:border-t-0 pt-3 lg:pt-0">
            <select name="sort" class="premium-select w-full lg:w-40 pr-8 pl-3 py-2.5 bg-neutral-900/60 border border-neutral-800 text-neutral-300 font-mono text-xs rounded-md focus:border-[#dc2626] outline-none cursor-pointer">
                <option value="latest" {{ $request->input('sort', 'latest') == 'latest' ? 'selected' : '' }}>SORT // LATEST</option>
                <option value="oldest" {{ $request->input('sort') == 'oldest' ? 'selected' : '' }}>SORT // CHRONO</option>
                <option value="price_low" {{ $request->input('sort') == 'price_low' ? 'selected' : '' }}>PRICE // MIN</option>
                <option value="price_high" {{ $request->input('sort') == 'price_high' ? 'selected' : '' }}>PRICE // MAX</option>
                <option value="mileage_low" {{ $request->input('sort') == 'mileage_low' ? 'selected' : '' }}>MILEAGE // LOW</option>
                <option value="mileage_high" {{ $request->input('sort') == 'mileage_high' ? 'selected' : '' }}>MILEAGE // HIGH</option>
                <option value="year_new" {{ $request->input('sort') == 'year_new' ? 'selected' : '' }}>YEAR // NEW</option>
                <option value="year_old" {{ $request->input('sort') == 'year_old' ? 'selected' : '' }}>YEAR // OLD</option>
            </select>

            <button type="submit" class="px-5 py-2.5 bg-[#dc2626] text-white text-xs font-mono uppercase tracking-widest rounded-md hover:bg-red-700 font-bold shadow-lg shadow-red-950/20 transition-all duration-200">
                Execute
            </button>
        </div>
    </form>
</div>