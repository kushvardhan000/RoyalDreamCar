<?php

namespace Database\Factories;

use App\Models\CarImage;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarImageFactory extends Factory
{
    protected $model = CarImage::class;

    public function definition(): array
    {
        return [
            'car_id' => Car::factory(),
            'image_path' => 'cars/' . fake()->lexify('image_????') . '.jpg',
            'image_type' => fake()->randomElement(['main','gallery','interior','exterior','engine','document']),
            'sort_order' => fake()->numberBetween(0,10),
        ];
    }
}
