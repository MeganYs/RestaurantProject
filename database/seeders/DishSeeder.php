<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dish::create([
            'name' => 'Grilled Salmon',
            'description' => 'A classic delicacy grilled to perfection.',
            'price' => 12.99,
            'image' => 'grilled.jpg',
        ]);
    
        Dish::create([
            'name' => 'Seafood Platter',
            'description' => 'A mix of the ocean\'s finest treasures.',
            'price' => 25.99,
            'image' => 'seafoodplatter.jpg',
        ]);

        Dish::create([
            'name' => 'Shrimp Cocktail',
            'description' => 'A refreshing starter with a zesty twist.',
            'price' => 14.95,
            'image' => 'shrimpcock.jpg',
        ]);

        Dish::create([
            'name' => 'Lobster Thermidor',
            'description' => 'A luxurious lobster dish with a creamy sauce and cheesy crust.',
            'price' => 29.99,
            'image' => 'lobster.jpg',
        ]);

        Dish::create([
            'name' => 'Garlic Butter Shrimp',
            'description' => 'Juicy shrimp in a savory garlic butter sauce, perfect with bread or rice.',
            'price' => 12.99,
            'image' => 'garlicshirmp.jpg',
        ]);

        Dish::create([
            'name' => 'Crab Cakes',
            'description' => 'Crispy crab cakes with fresh herbs and a zesty dipping sauce.',
            'price' => 16.95,
            'image' => 'crabcakes.jpg',
        ]);
    }
}
