<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarImage;
use App\Models\Car;
use App\Helpers\ImageHelper;

class CarImageSeeder extends Seeder
{
    public function run(): void
    {
        $cars = Car::all();
        foreach ($cars as $car) {
            $brand = optional($car->brand)->name;

            // 1 main
            CarImage::create([
                'car_id' => $car->id,
                'image_path' => ImageHelper::car(),
                'image_type' => 'main',
                'sort_order' => 0,
            ]);

            // 5 gallery
            for ($i = 1; $i <= 5; $i++) {
                CarImage::create([
                    'car_id' => $car->id,
                    'image_path' => ImageHelper::car(),
                    'image_type' => 'gallery',
                    'sort_order' => $i,
                ]);
            }

            // 2 interior
            for ($i = 1; $i <= 2; $i++) {
                CarImage::create([
                    'car_id' => $car->id,
                    'image_path' => ImageHelper::interior(),
                    'image_type' => 'interior',
                    'sort_order' => 10 + $i,
                ]);
            }

            // 2 exterior
            for ($i = 1; $i <= 2; $i++) {
                CarImage::create([
                    'car_id' => $car->id,
                    'image_path' => ImageHelper::exterior(),
                    'image_type' => 'exterior',
                    'sort_order' => 20 + $i,
                ]);
            }

            // 1 engine
            CarImage::create([
                'car_id' => $car->id,
                'image_path' => ImageHelper::engine(),
                'image_type' => 'engine',
                'sort_order' => 30,
            ]);
        }
    }
}
