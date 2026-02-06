<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        $foods = [
            // Makanan
            [
                'name' => 'Nasi Goreng',
                'description' => 'Nasi goreng spesial dengan telur mata sapi',
                'price' => 25000,
                'category' => 'Makanan',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mie Goreng',
                'description' => 'Mie goreng pedas dengan sayuran',
                'price' => 20000,
                'category' => 'Makanan',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ayam Bakar',
                'description' => 'Ayam bakar dengan bumbu kecap',
                'price' => 35000,
                'category' => 'Makanan',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ayam Goreng',
                'description' => 'Ayam goreng crispy dengan nasi',
                'price' => 30000,
                'category' => 'Makanan',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sate Ayam',
                'description' => 'Sate ayam 10 tusuk dengan bumbu kacang',
                'price' => 28000,
                'category' => 'Makanan',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gado-Gado',
                'description' => 'Sayuran dengan bumbu kacang',
                'price' => 18000,
                'category' => 'Makanan',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Soto Ayam',
                'description' => 'Soto ayam dengan nasi dan kerupuk',
                'price' => 22000,
                'category' => 'Makanan',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nasi Uduk',
                'description' => 'Nasi uduk komplit dengan lauk',
                'price' => 23000,
                'category' => 'Makanan',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cap Cay',
                'description' => 'Tumis sayuran dengan saus spesial',
                'price' => 24000,
                'category' => 'Makanan',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ikan Bakar',
                'description' => 'Ikan bakar dengan sambal',
                'price' => 40000,
                'category' => 'Makanan',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Minuman
            [
                'name' => 'Es Teh Manis',
                'description' => 'Teh manis dingin',
                'price' => 5000,
                'category' => 'Minuman',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Jeruk',
                'description' => 'Jeruk peras segar',
                'price' => 8000,
                'category' => 'Minuman',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jus Alpukat',
                'description' => 'Jus alpukat segar',
                'price' => 12000,
                'category' => 'Minuman',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jus Mangga',
                'description' => 'Jus mangga segar',
                'price' => 12000,
                'category' => 'Minuman',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Kelapa Muda',
                'description' => 'Kelapa muda segar',
                'price' => 10000,
                'category' => 'Minuman',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kopi Hitam',
                'description' => 'Kopi hitam panas',
                'price' => 8000,
                'category' => 'Minuman',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kopi Susu',
                'description' => 'Kopi susu panas/dingin',
                'price' => 10000,
                'category' => 'Minuman',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cappuccino',
                'description' => 'Cappuccino premium',
                'price' => 15000,
                'category' => 'Minuman',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Air Mineral',
                'description' => 'Air mineral botol',
                'price' => 5000,
                'category' => 'Minuman',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teh Tarik',
                'description' => 'Teh susu tarik panas',
                'price' => 9000,
                'category' => 'Minuman',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('foods')->insert($foods);
    }
}