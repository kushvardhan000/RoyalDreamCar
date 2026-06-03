<?php

namespace Database\Factories;

use App\Models\CarFeature;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarFeatureFactory extends Factory
{
    protected $model = CarFeature::class;

    public function definition(): array
    {
        $name = fake()->unique()->word();
        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => fake()->sentence(8),
        ];
    }
}
