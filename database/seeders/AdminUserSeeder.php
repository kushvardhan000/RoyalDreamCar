<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => env('ADMIN_DASHBOARD_EMAIL')],
            [
                'name' => 'Super Admin',
                'password' => Hash::make(env('ADMIN_DASHBOARD_PASSWORD')),
                'role' => 'super_admin',
                'email_verified_at' => now(),
            ]
        );
    }
}
