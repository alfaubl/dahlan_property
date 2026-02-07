<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'phone' => '081234567890',
            'address' => 'Jl. Admin No. 1, Jakarta',
            'city' => 'Jakarta',
            'postal_code' => '12345',
            'email_verified_at' => now(),
        ]);

        // User biasa untuk testing
        User::create([
            'name' => 'John Customer',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '081298765432',
            'address' => 'Jl. Customer No. 2, Bandung',
            'city' => 'Bandung',
            'postal_code' => '67890',
            'email_verified_at' => now(),
        ]);
    }
}