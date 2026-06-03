<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Brand;
use App\Models\CarModel as ModelModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        $brand = Brand::inRandomOrder()->first() ?? Brand::factory()->create();
        $model = ModelModel::where('brand_id', $brand->id)->inRandomOrder()->first() ?? ModelModel::factory()->create(['brand_id' => $brand->id]);

        $title = $brand->name . ' ' . $model->name . ' ' . fake()->numberBetween(2015, 2024);
        $price = fake()->numberBetween(5000000, 20000000);

        return [
            'brand_id' => $brand->id,
            'model_id' => $model->id,
            'title' => $title,
            'slug' => Str::slug($title . '-' . fake()->unique()->numberBetween(1,99999)),
            'price' => $price,
            'discount_price' => (fake()->boolean(20) ? $price - fake()->numberBetween(50000, 500000) : null),
            'year' => fake()->numberBetween(2010, 2024),
            'registration_year' => fake()->numberBetween(2010, 2024),
            'fuel_type' => fake()->randomElement(['petrol','diesel','hybrid','electric']),
            'transmission' => fake()->randomElement(['manual','automatic']),
            'ownership' => fake()->randomElement(['First','Second','Third']),
            'color' => fake()->safeColorName(),
            'mileage' => fake()->numberBetween(10000,200000),
            'engine_cc' => (string) fake()->numberBetween(1000,5000),
            'power' => fake()->numberBetween(70,600) . ' HP',
            'torque' => fake()->numberBetween(100,800) . ' Nm',
            'seating_capacity' => fake()->numberBetween(2,7),
            'insurance_valid_till' => now()->addMonths(fake()->numberBetween(1,24)),
            'registration_state' => fake()->state(),
            'registration_city' => fake()->city(),
            'vin_number' => Str::upper(Str::random(17)),
            'stock_number' => 'RD' . fake()->unique()->numberBetween(1000,9999),
            'short_description' => fake()->sentence(10),
            'description' => fake()->paragraphs(3, true),
            'meta_title' => null,
            'meta_description' => null,
            'featured' => fake()->boolean(10),
            'sold' => fake()->boolean(5),
            'status' => 'published',
            'views' => fake()->numberBetween(0,5000),
        ];
    }
}
