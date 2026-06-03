<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            'company_name' => 'Royal Dream Car',
            'company_phone' => '+1234567890',
            'company_email' => 'info@royaldreamcar.com',
            'company_address' => '123 Luxury Ave, Dream City',
            'google_map_embed' => null,
            'facebook_url' => null,
            'instagram_url' => null,
            'youtube_url' => null,
            'linkedin_url' => null,
            'whatsapp_number' => null,
        ];

        foreach ($items as $k => $v) {
            Setting::updateOrCreate(['key' => $k], ['value' => $v]);
        }
    }
}
