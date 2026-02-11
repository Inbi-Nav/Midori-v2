<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Midori',
            'email' => 'admin@midori.com',
            'role' => 'admin',
            'password' => Hash::make('midori2026'),
            'email_verified_at' => now(),
        ]);
    }
}