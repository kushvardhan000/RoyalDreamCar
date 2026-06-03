<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        // Create 100 cars
        Car::factory(100)->create();

        // Attach some random features
        $features = \App\Models\CarFeature::all();
        Car::all()->each(function ($car) use ($features) {
            $car->features()->sync($features->random(rand(2,5))->pluck('id')->toArray());
        });
    }
}
