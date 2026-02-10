<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    public function run(): void
    {
        $tables = [];
        
        for ($i = 1; $i <= 24; $i++) {
            $tables[] = [
                'table_number' => $i,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('tables')->insert($tables);
    }
}