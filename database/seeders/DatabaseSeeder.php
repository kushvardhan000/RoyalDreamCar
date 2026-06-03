<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Database\Seeders\AdminUserSeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\CarFeatureSeeder;
use Database\Seeders\CarModelSeeder;
use Database\Seeders\CarSeeder;
use Database\Seeders\CarImageSeeder;
use Database\Seeders\TestimonialSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\TeamSeeder;
use Database\Seeders\PartnerSeeder;
use Database\Seeders\SettingsSeeder;
use Database\Seeders\SeoSeeder;
use Database\Seeders\SliderSeeder;
use Database\Seeders\InquirySeeder;
use Database\Seeders\ServiceRequestSeeder;
use Database\Seeders\ContactMessageSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            AboutUsSeeder::class,
            BrandSeeder::class,
            CarFeatureSeeder::class,
            CarModelSeeder::class,
            CarSeeder::class,
            CarImageSeeder::class,
            SliderSeeder::class,
            TestimonialSeeder::class,
            ServiceSeeder::class,
            TeamSeeder::class,
            PartnerSeeder::class,
            InquirySeeder::class,
            ServiceRequestSeeder::class,
            ContactMessageSeeder::class,
            SettingsSeeder::class,
            SeoSeeder::class,
            
        ]);
    }
}
