<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'Daily Living',
                'description' => 'A collection of products for everyday use.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tea Collections',
                'description' => 'Teas and accessories for tea rituals.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Home Decor',
                'description' => 'Decorative pieces for homes.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Studio Ghibli Collections',
                'description' => 'Lifestyle and decorative pieces inspired by Studio Ghibli.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Funkos',
                'description' => 'Collectible figures and character-based items.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gift Sets',
                'description' => 'Collection of gift sets designed for thoughtful and meaningful occasions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}