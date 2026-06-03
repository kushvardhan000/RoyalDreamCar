<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarFeature;

class CarFeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            'Sunroof','ADAS','360 Camera','Apple CarPlay','Android Auto','Cruise Control','Wireless Charging','Ventilated Seats','Heads Up Display','Paddle Shifters'
        ];

        foreach ($features as $f) {
            CarFeature::updateOrCreate(['name' => $f], ['slug' => \Illuminate\Support\Str::slug($f), 'description' => $f]);
        }
    }
}
