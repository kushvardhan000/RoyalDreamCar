<form method="GET" action="{{ url()->current() }}" class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <!-- Search -->
        <div>
            <label for="search" class="block text-white/80 mb-2">Search</label>
            <input type="text" name="search" id="search"
                   value="{{ $request->input('search') }}"
                   class="w-full px-4 py-2 bg-white/5 border border-white/10 rounded-lg focus:border-amber-500 focus:bg-white/10 text-white placeholder-white/50"
                   placeholder="Search cars...">
        </div>

        <!-- Brand -->
        <div>
            <label for="brand_id" class="block text-white/80 mb-2">Brand</label>
            <select name="brand_id" id="brand_id"
                    class="w-full px-4 py-2 bg-white/5 border border-white/10 rounded-lg focus:border-amber-500 focus:bg-white/10 text-white">
                <option value="">All Brands</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $request->input('brand_id') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Model -->
        <div>
            <label for="model_id" class="block text-white/80 mb-2">Model</label>
            <select name="model_id" id="model_id"
                    class="w-full px-4 py-2 bg-white/5 border border-white/10 rounded-lg focus:border-amber-500 focus:bg-white/10 text-white">
                <option value="">All Models</option>
                @foreach($models as $model)
                    <option value="{{ $model->id }}" {{ $request->input('model_id') == $model->id ? 'selected' : '' }}>
                        {{ $model->brand->name }} {{ $model->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Fuel Type -->
        <div>
            <label for="fuel_type" class="block text-white/80 mb-2">Fuel Type</label>
            <select name="fuel_type" id="fuel_type"
                    class="w-full px-4 py-2 bg-white/5 border border-white/10 rounded-lg focus:border-amber-500 focus:bg-white/10 text-white">
                <option value="">All Fuel Types</option>
                @foreach($fuelTypes as $fuelType)
                    <option value="{{ $fuelType }}" {{ $request->input('fuel_type') == $fuelType ? 'selected' : '' }}>
                        {{ ucfirst($fuelType) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Transmission -->
        <div>
            <label for="transmission" class="block text-white/80 mb-2">Transmission</label>
            <select name="transmission" id="transmission"
                    class="w-full px-4 py-2 bg-white/5 border border-white/10 rounded-lg focus:border-amber-500 focus:bg-white/10 text-white">
                <option value="">All Transmissions</option>
                @foreach($transmissions as $transmission)
                    <option value="{{ $transmission }}" {{ $request->input('transmission') == $transmission ? 'selected' : '' }}>
                        {{ ucfirst($transmission) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Year -->
        <div>
            <label for="year" class="block text-white/80 mb-2">Year</label>
            <select name="year" id="year"
                    class="w-full px-4 py-2 bg-white/5 border border-white/10 rounded-lg focus:border-amber-500 focus:bg-white/10 text-white">
                <option value="">All Years</option>
                @foreach($years as $year)
                    <option value="{{ $year }}" {{ $request->input('year') == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Ownership -->
        <div>
            <label for="ownership" class="block text-white/80 mb-2">Ownership</label>
            <select name="ownership" id="ownership"
                    class="w-full px-4 py-2 bg-white/5 border border-white/10 rounded-lg focus:border-amber-500 focus:bg-white/10 text-white">
                <option value="">All Ownership</option>
                @foreach($ownerships as $ownership)
                    <option value="{{ $ownership }}" {{ $request->input('ownership') == $ownership ? 'selected' : '' }}>
                        {{ ucfirst($ownership) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Price Min -->
        <div>
            <label for="price_min" class="block text-white/80 mb-2">Min Price</label>
            <input type="number" name="price_min" id="price_min"
                   value="{{ $request->input('price_min') }}"
                   class="w-full px-4 py-2 bg-white/5 border border-white/10 rounded-lg focus:border-amber-500 focus:bg-white/10 text-white placeholder-white/50"
                   placeholder="Min">
        </div>

        <!-- Price Max -->
        <div>
            <label for="price_max" class="block text-white/80 mb-2">Max Price</label>
            <input type="number" name="price_max" id="price_max"
                   value="{{ $request->input('price_max') }}"
                   class="w-full px-4 py-2 bg-white/5 border border-white/10 rounded-lg focus:border-amber-500 focus:bg-white/10 text-white placeholder-white/50"
                   placeholder="Max">
        </div>

        <!-- Sort -->
        <div>
            <label for="sort" class="block text-white/80 mb-2">Sort By</label>
            <select name="sort" id="sort"
                    class="w-full px-4 py-2 bg-white/5 border border-white/10 rounded-lg focus:border-amber-500 focus:bg-white/10 text-white">
                <option value="latest" {{ $request->input('sort', 'latest') == 'latest' ? 'selected' : '' }}>Latest</option>
                <option value="oldest" {{ $request->input('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                <option value="price_low" {{ $request->input('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_high" {{ $request->input('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                <option value="mileage_low" {{ $request->input('sort') == 'mileage_low' ? 'selected' : '' }}>Mileage: Low to High</option>
                <option value="mileage_high" {{ $request->input('sort') == 'mileage_high' ? 'selected' : '' }}>Mileage: High to Low</option>
                <option value="year_new" {{ $request->input('sort') == 'year_new' ? 'selected' : '' }}>Year: New to Old</option>
                <option value="year_old" {{ $request->input('sort') == 'year_old' ? 'selected' : '' }}>Year: Old to New</option>
            </select>
        </div>
    </div>

    <div class="mt-6 flex flex-col sm:flex-row sm:justify-between sm:items-center">
    <button type="reset" class="px-4 py-2 bg-white/10 text-white/80 border border-white/20 rounded-lg hover:bg-white/20 hover:text-white transition-colors">
        Reset Filters
    </button>
    <button type="submit" class="px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white font-medium rounded-lg transition-colors hover:shadow-lg">
        Apply Filters
    </button>
</div>
</form>