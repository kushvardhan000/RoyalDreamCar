<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SeoMeta;

class SeoSeeder extends Seeder
{
    public function run(): void
    {
        $pages = ['home','about','services','contact','cars'];
        foreach ($pages as $p) {
            SeoMeta::updateOrCreate(['page_key' => $p], ['meta_title' => ucfirst($p) . ' - Royal Dream Car', 'meta_description' => 'Royal Dream Car ' . $p]);
        }
    }
}
