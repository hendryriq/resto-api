<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        $foods = [
            [
                'name' => 'Buffalo Wings',
                'description' => 'Crispy chicken wings with buffalo sauce and blue cheese',
                'price' => 14.99,
                'category' => 'Appetizers',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mozzarella Sticks',
                'description' => 'Golden fried mozzarella with marinara sauce',
                'price' => 9.99,
                'category' => 'Appetizers',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Spinach Artichoke Dip',
                'description' => 'Creamy dip served with tortilla chips',
                'price' => 11.99,
                'category' => 'Appetizers',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Loaded Nachos',
                'description' => 'Tortilla chips topped with melted cheese, jalapeños, and beef',
                'price' => 13.50,
                'category' => 'Appetizers',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // --- Salads (From Image & Additionals) ---
            [
                'name' => 'Caesar Salad',
                'description' => 'Fresh romaine lettuce, parmesan cheese, croutons',
                'price' => 12.99,
                'category' => 'Salads',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Greek Salad',
                'description' => 'Cucumbers, tomatoes, olives, and feta cheese with olive oil',
                'price' => 11.50,
                'category' => 'Salads',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // --- Main Course ---
            [
                'name' => 'Grilled Salmon',
                'description' => 'Fresh atlantic salmon served with asparagus and lemon butter',
                'price' => 24.00,
                'category' => 'Main Course',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ribeye Steak',
                'description' => '10oz premium beef steak served with mashed potatoes',
                'price' => 32.99,
                'category' => 'Main Course',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Classic Cheeseburger',
                'description' => 'Juicy beef patty, cheddar cheese, lettuce, tomato, and fries',
                'price' => 16.50,
                'category' => 'Main Course',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chicken Alfredo Pasta',
                'description' => 'Fettuccine pasta in creamy alfredo sauce with grilled chicken',
                'price' => 18.00,
                'category' => 'Main Course',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Margherita Pizza',
                'description' => 'Classic pizza with tomato sauce, fresh mozzarella, and basil',
                'price' => 15.00,
                'category' => 'Main Course',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // --- Desserts ---
            [
                'name' => 'New York Cheesecake',
                'description' => 'Classic cheesecake with a graham cracker crust',
                'price' => 8.50,
                'category' => 'Desserts',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chocolate Lava Cake',
                'description' => 'Warm chocolate cake with a molten center, served with ice cream',
                'price' => 9.50,
                'category' => 'Desserts',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tiramisu',
                'description' => 'Coffee-flavored Italian dessert with mascarpone cheese',
                'price' => 9.00,
                'category' => 'Desserts',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // --- Beverages ---
            [
                'name' => 'Iced Lemon Tea',
                'description' => 'Freshly brewed tea with lemon slices and ice',
                'price' => 3.50,
                'category' => 'Beverages',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fresh Orange Juice',
                'description' => '100% squeezed orange juice',
                'price' => 5.00,
                'category' => 'Beverages',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cappuccino',
                'description' => 'Espresso with steamed milk and foam',
                'price' => 4.50,
                'category' => 'Beverages',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mineral Water',
                'description' => 'Premium bottled still water',
                'price' => 2.50,
                'category' => 'Beverages',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cola',
                'description' => 'Chilled carbonated soft drink',
                'price' => 2.50,
                'category' => 'Beverages',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('foods')->insert($foods);
    }
}