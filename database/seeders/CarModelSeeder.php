<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\CarModel;

class CarModelSeeder extends Seeder
{
    public function run(): void
    {
        $brands = Brand::all();

        foreach ($brands as $brand) {
            for ($i = 0; $i < 4; $i++) {
                CarModel::factory()->create(['brand_id' => $brand->id]);
            }
        }
    }
}
