<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;
use App\Helpers\ImageHelper;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['title' => 'Drive Your Dream Today', 'subtitle' => 'Find premium luxury cars curated for you', 'button_text' => 'Browse Cars', 'button_link' => '/cars'],
            ['title' => 'Luxury Redefined', 'subtitle' => 'Exceptional vehicles & unrivaled service', 'button_text' => 'Explore Now', 'button_link' => '/cars'],
            ['title' => 'Premium Cars, Exceptional Experience', 'subtitle' => 'From showroom to driveway', 'button_text' => 'View Inventory', 'button_link' => '/cars'],
            ['title' => 'Exclusive Collections', 'subtitle' => 'Handpicked luxury vehicles for connoisseurs', 'button_text' => 'See Collections', 'button_link' => '/cars'],
            ['title' => 'Your Next Luxury Ride Awaits', 'subtitle' => 'Schedule a test drive today', 'button_text' => 'Contact Us', 'button_link' => '/contact'],
        ];

        $i = 1;
        foreach ($items as $it) {
            Slider::create([
                'title' => $it['title'],
                'subtitle' => $it['subtitle'],
                'button_text' => $it['button_text'],
                'button_link' => $it['button_link'],
                'image' => ImageHelper::hero(),
                'sort_order' => $i++,
                'status' => 'published',
            ]);
        }
    }
}
