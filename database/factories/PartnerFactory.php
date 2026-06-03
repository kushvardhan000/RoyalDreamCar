<?php

namespace Database\Factories;

use App\Models\Partner;
use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
{
    protected $model = Partner::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'logo' => ImageHelper::logo(),
            'website' => fake()->url(),
            'sort_order' => 0,
            'status' => 'published',
        ];
    }
}
