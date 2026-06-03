<?php

namespace Database\Factories;

use App\Models\Testimonial;
use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'designation' => fake()->jobTitle(),
            'company' => fake()->company(),
            'photo' => ImageHelper::profile(),
            'rating' => fake()->numberBetween(3,5),
            'review' => fake()->paragraph(),
            'status' => 'published',
        ];
    }
}
