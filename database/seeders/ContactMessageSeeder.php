<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactMessage;

class ContactMessageSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'General inquiry',
            'Partnership request',
            'Vehicle sourcing',
            'Corporate fleet inquiry',
            'Other'
        ];

        for ($i = 0; $i < 30; $i++) {
            ContactMessage::create([
                'name' => fake()->name(),
                'phone' => fake()->phoneNumber(),
                'email' => fake()->safeEmail(),
                'message' => $types[array_rand($types)] . ' - ' . fake()->sentence(10),
                'status' => fake()->randomElement(['new','read','archived']),
            ]);
        }
    }
}
