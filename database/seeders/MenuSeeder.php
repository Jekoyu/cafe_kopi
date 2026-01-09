<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $signature   = Category::where('name', 'Signature')->first();
        $coffeeBased = Category::where('name', 'Coffee Based')->first();
        $nonCoffee   = Category::where('name', 'Non Coffee')->first();

        Menu::insert([
            // Signature
            [
                'category_id' => $signature->id,
                'name' => 'Kopi 1815',
                'price' => 18000,
                'description' => 'Signature coffee khas Kopi 1815.',
                'image' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $signature->id,
                'name' => 'Karamelu',
                'price' => 23000,
                'description' => 'Kopi dengan sentuhan caramel.',
                'image' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $signature->id,
                'name' => 'Double Booster',
                'price' => 23000,
                'description' => 'Boost energi dengan double espresso.',
                'image' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Coffee Based
            [
                'category_id' => $coffeeBased->id,
                'name' => 'Americano',
                'price' => 20000,
                'description' => 'Espresso + air, bold & clean.',
                'image' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $coffeeBased->id,
                'name' => 'Latte',
                'price' => 27000,
                'description' => 'Espresso + susu, creamy.',
                'image' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $coffeeBased->id,
                'name' => 'Cappuccino',
                'price' => 27000,
                'description' => 'Espresso + foam susu.',
                'image' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Non Coffee
            [
                'category_id' => $nonCoffee->id,
                'name' => 'Chocolate',
                'price' => 23000,
                'description' => 'Cokelat rich & smooth.',
                'image' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $nonCoffee->id,
                'name' => 'Matcha',
                'price' => 23000,
                'description' => 'Matcha creamy dan wangi.',
                'image' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $nonCoffee->id,
                'name' => 'Lemon Tea',
                'price' => 23000,
                'description' => 'Teh segar dengan lemon.',
                'image' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
