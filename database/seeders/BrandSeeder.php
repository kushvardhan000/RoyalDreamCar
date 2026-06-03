<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            'BMW','Audi','Mercedes-Benz','Porsche','Land Rover','Volvo','Jaguar','Mini','Lexus','Toyota'
        ];

        foreach ($brands as $b) {
            Brand::updateOrCreate(['name' => $b], ['slug' => \Illuminate\Support\Str::slug($b), 'description' => $b . ' vehicles']);
        }
    }
}
