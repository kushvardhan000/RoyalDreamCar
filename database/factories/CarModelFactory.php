<?php

namespace Database\Factories;

use App\Models\CarModel;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarModelFactory extends Factory
{
    protected $model = CarModel::class;

    public function definition(): array
    {
        $name = fake()->unique()->word();
        return [
            'brand_id' => Brand::factory(),
            'name' => ucfirst($name),
            'slug' => Str::slug($name . '-' . fake()->numberBetween(1,999)),
            'description' => fake()->sentence(10),
        ];
    }
}
