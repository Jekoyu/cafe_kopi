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
                'name' => 'Signature',
                'slug' => 'signature',
                'description' => 'Menu andalan Kopi 1815 dengan racikan khas.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Coffee Based',
                'slug' => 'coffee-based',
                'description' => 'Minuman kopi klasik: espresso, latte, cappuccino, dll.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Non Coffee',
                'slug' => 'non-coffee',
                'description' => 'Minuman selain kopi untuk semua kalangan.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
