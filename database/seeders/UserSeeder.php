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

        User::updateOrCreate(
            ['email' => 'mamad@gmail.com'],
            [
                'name' => 'Mamad',
                'phone_number' => '081234567891',
                'password' => Hash::make('password'), // ganti di production
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
        User::updateOrCreate(
            ['email' => 'dwi@gmail.com'],
            [
                'name' => 'Dwi',
                'phone_number' => '081234567892',
                'password' => Hash::make('password'), // ganti di production
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
        User::updateOrCreate(
            ['email' => 'eka@gmail.com'],
            [
                'name' => 'Eka',
                'phone_number' => '081234567893',
                'password' => Hash::make('password'), // ganti di production
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
    }
}
