<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceRequest;
use App\Models\CarModel;

class ServiceRequestSeeder extends Seeder
{
    public function run(): void
    {
        $models = CarModel::all();
        $locations = ['Showroom A','Showroom B','Customer Location','Service Center'];

        for ($i = 0; $i < 40; $i++) {
            $model = $models->random();
            $scheduled = now()->addDays(rand(1,60))->setTime(rand(8,17), [0,15,30,45][array_rand([0,1,2,3])]);
            ServiceRequest::create([
                'name' => fake()->name(),
                'phone' => fake()->phoneNumber(),
                'email' => fake()->safeEmail(),
                'selected_car_model' => $model->name,
                'service_location' => $locations[array_rand($locations)],
                'scheduled_datetime' => $scheduled,
                'message' => fake()->sentence(12),
                'status' => fake()->randomElement(
    ServiceRequest::STATUSES
),
            ]);
        }
    }
}
