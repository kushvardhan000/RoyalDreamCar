<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\SeoMeta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    private function buildCarQuery(Request $request)
    {
        $query = Car::query()
            ->where('status', 'published')
            ->with(['brand', 'model', 'primaryImage', 'features']);

        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->input('search').'%');
        }

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->input('brand_id'));
        }

        if ($request->filled('model_id')) {
            $query->where('model_id', $request->input('model_id'));
        }

        if ($request->filled('fuel_type')) {
            $query->where('fuel_type', $request->input('fuel_type'));
        }

        if ($request->filled('transmission')) {
            $query->where('transmission', $request->input('transmission'));
        }

        if ($request->filled('year')) {
            $query->where('year', $request->input('year'));
        }

        if ($request->filled('ownership')) {
            $query->where('ownership', $request->input('ownership'));
        }

        if ($request->has('featured')) {
            $query->where('featured', $request->input('featured') === 'true');
        }

        if ($request->has('sold')) {
            $query->where('sold', $request->input('sold') === 'true');
        }

        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->input('price_min'));
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->input('price_max'));
        }

        $sort = $request->input('sort', 'latest');

        $query->when($sort === 'oldest', fn ($q) => $q->orderBy('created_at', 'asc'))
            ->when($sort === 'price_low', fn ($q) => $q->orderBy('price', 'asc'))
            ->when($sort === 'price_high', fn ($q) => $q->orderBy('price', 'desc'))
            ->when($sort === 'mileage_low', fn ($q) => $q->orderBy('mileage', 'asc'))
            ->when($sort === 'mileage_high', fn ($q) => $q->orderBy('mileage', 'desc'))
            ->when($sort === 'year_new', fn ($q) => $q->orderBy('year', 'desc'))
            ->when($sort === 'year_old', fn ($q) => $q->orderBy('year', 'asc'))
            ->when($sort === 'latest' || $sort === null, fn ($q) => $q->orderBy('created_at', 'desc'));

        return $query;
    }

    private function buildRelatedQuery(Car $car): Builder
    {
        $relatedQuery = Car::query()
            ->with(['brand', 'model', 'primaryImage', 'features'])
            ->where('status', 'published')
            ->where('sold', false)
            ->where('id', '!=', $car->id);

        $relatedQuery->where(function ($query) use ($car) {
            $query->where('brand_id', $car->brand_id)
                ->orWhere('model_id', $car->model_id);

            if ($car->features && $car->features->isNotEmpty()) {
                $query->orWhereHas('features', function ($query) use ($car) {
                    $query->whereIn('feature_id', $car->features->pluck('id')->toArray());
                });
            }

            if ($car->price && $car->price > 0) {
                $query->orWhereBetween('price', [$car->price * 0.8, $car->price * 1.2]);
            }
        });

        return $relatedQuery;
    }

    public function index(Request $request)
    {
        try {
            $query = $this->buildCarQuery($request);
            $cars = $query->paginate(12)->appends($request->except(['page', 'ajax']));

            $brands = Brand::orderBy('name')->get(['id', 'name', 'slug']);
            $models = CarModel::with('brand:id,name,slug')->orderBy('name')->get(['id', 'brand_id', 'name', 'slug']);
            $fuelTypes = Car::distinct()
                ->whereNotNull('fuel_type')
                ->where('fuel_type', '!=', '')
                ->where('status', 'published')
                ->pluck('fuel_type')
                ->sort()
                ->values();
            $transmissions = Car::distinct()
                ->whereNotNull('transmission')
                ->where('transmission', '!=', '')
                ->where('status', 'published')
                ->pluck('transmission')
                ->sort()
                ->values();
            $years = Car::distinct()
                ->whereNotNull('year')
                ->where('status', 'published')
                ->orderByDesc('year')
                ->pluck('year')
                ->filter()
                ->sortDesc()
                ->values();
            $ownerships = Car::distinct()
                ->whereNotNull('ownership')
                ->where('ownership', '!=', '')
                ->where('status', 'published')
                ->pluck('ownership')
                ->sort()
                ->values();

            $seo = SeoMeta::where('page_key', 'car-listing')->first(['meta_title', 'meta_description', 'meta_keywords']);

            if ($request->ajax()) {
                $html = view('partials.car-grid', compact('cars'))->render();
                $filterHtml = view('partials.filter-bar', compact('brands', 'models', 'fuelTypes', 'transmissions', 'years', 'ownerships', 'request'))->render();

                return response()->json([
                    'html' => $html,
                    'filter_html' => $filterHtml,
                    'total' => $cars->total(),
                    'page' => $cars->currentPage(),
                    'last_page' => $cars->lastPage(),
                ]);
            }

            return view('pages.cars', compact(
                'cars',
                'brands',
                'models',
                'fuelTypes',
                'transmissions',
                'years',
                'ownerships',
                'request',
                'seo'
            ));
        } catch (\Throwable $e) {
            Log::error('Error in CarController@index: '.$e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            $cars = collect();
            $brands = collect();
            $models = collect();
            $fuelTypes = collect();
            $transmissions = collect();
            $years = collect();
            $ownerships = collect();
            $seo = null;

            if ($request->ajax()) {
                return response()->json([
                    'html' => '<div class="col-span-full text-center py-20 text-red-400">Failed to load inventory. Please try again.</div>',
                    'total' => 0,
                    'page' => 1,
                    'last_page' => 1,
                ], 500);
            }

            return view('pages.cars', compact(
                'cars',
                'brands',
                'models',
                'fuelTypes',
                'transmissions',
                'years',
                'ownerships',
                'request',
                'seo'
            ))->with('error', 'An error occurred while loading the cars.');
        }
    }

    public function show(Car $car)
    {
        try {
            $car->load(['brand:id,name,slug', 'model:id,name,slug,brand_id', 'images', 'features:id,name', 'primaryImage']);
            $car->increment('views');

            $seo = SeoMeta::where('page_key', 'car-show')->first(['meta_title', 'meta_description', 'meta_keywords']);

            $savedFilters = request()->query();
            $relatedCars = collect();

            if ($car->id) {
                $relatedQuery = $this->buildRelatedQuery($car);
                $relatedCars = $relatedQuery->limit(6)->get();

                if ($relatedCars->count() < 4) {
                    $featuredCars = Car::query()
                        ->with(['brand:id,name,slug', 'model:id,name,slug,brand_id', 'primaryImage'])
                        ->where('status', 'published')
                        ->where('sold', false)
                        ->where('id', '!=', $car->id)
                        ->where('featured', true)
                        ->limit(6 - $relatedCars->count())
                        ->get();

                    $relatedCars = $relatedCars->concat($featuredCars)->unique('id')->take(6);
                }

                $relatedCars = $relatedCars->take(6);
            }

            return view('pages.car-show', compact('car', 'relatedCars', 'seo', 'savedFilters'));
        } catch (\Throwable $e) {
            Log::error('Error in CarController@show for car ID '.($car->id ?? 'unknown').': '.$e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            if ($e instanceof ModelNotFoundException) {
                throw $e;
            }

            return redirect()->route('cars.index')->with('error', 'An error occurred while loading the car details.');
        }
    }
}
