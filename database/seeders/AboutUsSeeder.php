<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUs;

class AboutUsSeeder extends Seeder
{
    public function run(): void
    {
        AboutUs::truncate();

        AboutUs::create([
            'hero_title' => 'India\'s Premier Luxury Car Destination',

            'hero_subtitle' => 'Discover a curated collection of world-class luxury automobiles, where prestige, performance, and excellence come together.',

            'hero_image' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70',

            'company_story' => '
Royal Dream Car Private Limited was founded with a vision to redefine the luxury automobile buying experience in India. Established in the year 2002, Royal Dream Car Private Limited in Ranchi has grown to become a top player and one of the most trusted, leading names in the second-hand car dealers industry. 

Centrally located at H B Road, Near Prabhat Khabar (Kokar Industrial Area) in Kokar, Ranchi, this well-known establishment acts as a premium one-stop destination serving automotive enthusiasts both locally and from across the country. Over the course of our journey, we have established a firm foothold by believing that customer satisfaction is just as important as the quality of our vehicles. 

Our curated collection includes carefully selected luxury sedans, performance sports cars, executive SUVs, and pristine pre-owned masterpieces from globally renowned manufacturers, alongside trusted mainstream brands like Maruti Suzuki, Hyundai, Tata, Renault, and Fiat. From detailed consultations to specialized car repair and maintenance services, our dedicated team puts in immense effort to ensure complete transparency, trust, and exceptional service at every step. 

Today, Royal Dream Car Private Limited proudly continues to expand its products and services, helping a growing base of clients turn their dream cars into reality.
            ',

            'mission_title' => 'Our Mission',

            'mission_description' => '
To provide every customer with access to the world’s finest automobiles while delivering unmatched service, transparency, and trust throughout the ownership journey.
            ',

            'vision_title' => 'Our Vision',

            'vision_description' => '
To become India’s most respected luxury automotive brand by creating exceptional experiences, expanding our client base, and setting new standards in premium vehicle retail.
            ',

            'years_experience' => 24, // Updated automatically based on the 2002 establishment year

            'cars_sold' => 3200,

            'happy_customers' => 2800,

            'team_heading' => 'Meet Our Automotive Experts',

            'why_choose_us' => json_encode([
                [
                    'title' => 'Premium Inventory',
                    'description' => 'Hand-picked collection of luxury, performance, and multi-brand pre-owned vehicles.'
                ],
                [
                    'title' => 'Verified Vehicles',
                    'description' => 'Every vehicle undergoes thorough quality inspection and certification.'
                ],
                [
                    'title' => 'Transparent Pricing',
                    'description' => 'Honest evaluations for second-hand buyers and sellers with no hidden costs.'
                ],
                [
                    'title' => 'Expert Car Care',
                    'description' => 'Comprehensive repair and services for brands like Maruti Suzuki, Hyundai, Tata, and more.'
                ],
                [
                    'title' => 'Prime & Accessible Location',
                    'description' => 'Conveniently situated at H B Road, Kokar Industrial Area, Ranchi.'
                ],
                [
                    'title' => 'Dedicated Consultants',
                    'description' => 'Experienced advisors focused on customer satisfaction and long-term support.'
                ]
            ]),

            'status' => 'published',
        ]);
    }
}
