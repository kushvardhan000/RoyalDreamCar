<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'designation' => fake()->jobTitle(),
            'photo' => null,
            'bio' => fake()->paragraph(),
            'linkedin_url' => null,
            'sort_order' => 0,
            'status' => 'published',
        ];
    }
}
