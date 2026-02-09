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
                'image_url' => 'https://images.unsplash.com/photo-1567620832903-9fc6debc209f?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mozzarella Sticks',
                'description' => 'Golden fried mozzarella with marinara sauce',
                'price' => 9.99,
                'category' => 'Appetizers',
                'image_url' => 'https://images.unsplash.com/photo-1531749668029-2db88e4276c7?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Spinach Artichoke Dip',
                'description' => 'Creamy dip served with tortilla chips',
                'price' => 11.99,
                'category' => 'Appetizers',
                'image_url' => 'https://images.unsplash.com/photo-1576515652031-fc429bab6503?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Loaded Nachos',
                'description' => 'Tortilla chips topped with melted cheese, jalapeños, and beef',
                'price' => 13.50,
                'category' => 'Appetizers',
                'image_url' => 'https://images.unsplash.com/photo-1513456852971-30c0b8199d4d?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // --- Salads ---
            [
                'name' => 'Caesar Salad',
                'description' => 'Fresh romaine lettuce, parmesan cheese, croutons',
                'price' => 12.99,
                'category' => 'Salads',
                'image_url' => 'https://images.unsplash.com/photo-1550304943-4f24f54ddde9?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Greek Salad',
                'description' => 'Cucumbers, tomatoes, olives, and feta cheese with olive oil',
                'price' => 11.50,
                'category' => 'Salads',
                'image_url' => 'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // --- Main Course ---
            [
                'name' => 'Grilled Salmon',
                'description' => 'Fresh atlantic salmon served with asparagus and lemon butter',
                'price' => 24.00,
                'category' => 'Main Course',
                'image_url' => 'https://images.unsplash.com/photo-1485921325833-c519f76c4974?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ribeye Steak',
                'description' => '10oz premium beef steak served with mashed potatoes',
                'price' => 32.99,
                'category' => 'Main Course',
                'image_url' => 'https://images.unsplash.com/photo-1600891964092-4316c288032e?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Classic Cheeseburger',
                'description' => 'Juicy beef patty, cheddar cheese, lettuce, tomato, and fries',
                'price' => 16.50,
                'category' => 'Main Course',
                'image_url' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chicken Alfredo Pasta',
                'description' => 'Fettuccine pasta in creamy alfredo sauce with grilled chicken',
                'price' => 18.00,
                'category' => 'Main Course',
                'image_url' => 'https://images.unsplash.com/photo-1645112411341-6c4fd023714a?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Margherita Pizza',
                'description' => 'Classic pizza with tomato sauce, fresh mozzarella, and basil',
                'price' => 15.00,
                'category' => 'Main Course',
                'image_url' => 'https://images.unsplash.com/photo-1574071318508-1cdbab80d002?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // --- Desserts ---
            [
                'name' => 'New York Cheesecake',
                'description' => 'Classic cheesecake with a graham cracker crust',
                'price' => 8.50,
                'category' => 'Desserts',
                'image_url' => 'https://images.unsplash.com/photo-1533134242443-d4fd215305ad?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chocolate Lava Cake',
                'description' => 'Warm chocolate cake with a molten center, served with ice cream',
                'price' => 9.50,
                'category' => 'Desserts',
                'image_url' => 'https://images.unsplash.com/photo-1563805042-7684c019e1cb?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tiramisu',
                'description' => 'Coffee-flavored Italian dessert with mascarpone cheese',
                'price' => 9.00,
                'category' => 'Desserts',
                'image_url' => 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // --- Beverages ---
            [
                'name' => 'Iced Lemon Tea',
                'description' => 'Freshly brewed tea with lemon slices and ice',
                'price' => 3.50,
                'category' => 'Beverages',
                'image_url' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fresh Orange Juice',
                'description' => '100% squeezed orange juice',
                'price' => 5.00,
                'category' => 'Beverages',
                'image_url' => 'https://images.unsplash.com/photo-1613478223719-2ab802602423?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cappuccino',
                'description' => 'Espresso with steamed milk and foam',
                'price' => 4.50,
                'category' => 'Beverages',
                'image_url' => 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mineral Water',
                'description' => 'Premium bottled still water',
                'price' => 2.50,
                'category' => 'Beverages',
                'image_url' => 'https://images.unsplash.com/photo-1560614382-33353781c275?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cola',
                'description' => 'Chilled carbonated soft drink',
                'price' => 2.50,
                'category' => 'Beverages',
                'image_url' => 'https://images.unsplash.com/photo-1622483767028-3f66f32aef97?q=80&w=800&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('foods')->insert($foods);
    }
}