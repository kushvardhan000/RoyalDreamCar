<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inquiry;
use App\Models\Car;

class InquirySeeder extends Seeder
{
    public function run(): void
    {
        $cars = Car::all();
        $sources = ['website','phone','walk-in','facebook','instagram','ads'];
        for ($i = 0; $i < 50; $i++) {
            $car = $cars->random();
            Inquiry::create([
                'car_id' => $car->id,
                'name' => fake()->name(),
                'phone' => fake()->phoneNumber(),
                'email' => fake()->safeEmail(),
                'message' => fake()->sentence(12),
                'status' => fake()->randomElement([
    'new',
    'contacted',
    'closed',
]),
                'source' => $sources[array_rand($sources)],
            ]);
        }
    }
}
