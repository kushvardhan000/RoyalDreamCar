<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Car;
use App\Models\CarFeature;
use App\Models\CarModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_index_returns_successful_response(): void
    {
        $car = Car::factory()->create(['status' => 'published']);

        $response = $this->get('/cars');

        $response->assertStatus(200);
        $response->assertViewHas('cars');
    }

    public function test_index_filters_by_brand(): void
    {
        $brand = Brand::factory()->create();
        $model = CarModel::factory()->create(['brand_id' => $brand->id]);
        $car = Car::factory()->create(['brand_id' => $brand->id, 'model_id' => $model->id, 'status' => 'published']);

        $response = $this->get('/cars?brand_id=' . $brand->id);

        $response->assertStatus(200);
        $response->assertViewHas('cars', function ($cars) use ($car) {
            return $cars->contains($car);
        });
    }

    public function test_index_filters_by_fuel_type(): void
    {
        $car = Car::factory()->create(['fuel_type' => 'petrol', 'status' => 'published']);

        $response = $this->get('/cars?fuel_type=petrol');

        $response->assertStatus(200);
        $response->assertViewHas('cars', function ($cars) use ($car) {
            return $cars->contains($car);
        });
    }

    public function test_index_ajax_returns_json(): void
    {
        $car = Car::factory()->create(['status' => 'published']);

        $response = $this->getJson('/cars?ajax=1');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'html',
                     'filter_html',
                     'total',
                     'page',
                     'last_page',
                 ]);
    }

    public function test_show_returns_successful_response(): void
    {
        $car = Car::factory()->create(['status' => 'published']);

        $response = $this->get('/cars/' . $car->slug);

        $response->assertStatus(200);
        $response->assertViewHas('car');
    }

    public function test_show_increments_views(): void
    {
        $car = Car::factory()->create(['status' => 'published', 'views' => 0]);

        $this->get('/cars/' . $car->slug);

        $this->assertDatabaseHas('cars', [
            'id' => $car->id,
            'views' => 1,
        ]);
    }

    public function test_show_returns_404_for_unpublished_car(): void
    {
        $car = Car::factory()->create(['status' => 'draft']);

        $this->get('/cars/' . $car->slug)
             ->assertStatus(404);
    }

    public function test_related_cars_share_brand(): void
    {
        $brand = Brand::factory()->create();
        $model = CarModel::factory()->create(['brand_id' => $brand->id]);
        $feature = CarFeature::factory()->create();

        $car = Car::factory()->create([
            'brand_id' => $brand->id,
            'model_id' => $model->id,
            'status' => 'published',
            'sold' => false,
            'price' => 1000000,
        ]);
        $car->features()->attach($feature->id);

        $relatedCar = Car::factory()->create([
            'brand_id' => $brand->id,
            'model_id' => $model->id,
            'status' => 'published',
            'sold' => false,
            'price' => 1100000,
        ]);
        $relatedCar->features()->attach($feature->id);

        $response = $this->get('/cars/' . $car->slug);

        $response->assertStatus(200);
        $response->assertViewHas('relatedCars', function ($relatedCars) use ($relatedCar) {
            return $relatedCars->contains($relatedCar);
        });
    }

    public function test_index_sorts_by_price_low(): void
    {
        $cheap = Car::factory()->create(['price' => 500000, 'status' => 'published']);
        $expensive = Car::factory()->create(['price' => 1500000, 'status' => 'published']);

        $response = $this->get('/cars?sort=price_low');

        $response->assertStatus(200);
        $response->assertViewHas('cars', function ($cars) use ($cheap, $expensive) {
            return $cars->first()->id === $cheap->id && $cars->last()->id === $expensive->id;
        });
    }

    public function test_index_preserves_query_string(): void
    {
        $car = Car::factory()->create(['status' => 'published']);

        $response = $this->get('/cars?brand_id=1&sort=price_low');

        $response->assertStatus(200);
        $response->assertSee('brand_id=1');
        $response->assertSee('sort=price_low');
    }

    public function test_inquiry_store_requires_validation(): void
    {
        $car = Car::factory()->create(['status' => 'published']);

        $response = $this->post('/cars/' . $car->slug . '/inquiry', []);

        $response->assertSessionHasErrors(['name', 'phone']);
    }

    public function test_inquiry_store_succeeds(): void
    {
        $car = Car::factory()->create(['status' => 'published']);

        $response = $this->post('/cars/' . $car->slug . '/inquiry', [
            'name' => 'John Doe',
            'phone' => '9876543210',
            'email' => 'john@example.com',
            'message' => 'Interested in this car',
        ]);

        $response->assertSessionHas('success');
    }
}
