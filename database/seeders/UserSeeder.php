<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'phone_number' => '081234567890',
                'password' => Hash::make('password'), // ganti di production
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // User biasa
        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'User',
                'phone_number' => '',
                'password' => Hash::make('password'), // ganti di production
                'role' => 'user',
                'email_verified_at' => now(),
            ]
        );
    }
}
