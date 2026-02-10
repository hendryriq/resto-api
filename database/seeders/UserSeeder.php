<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Pelayan',
                'email' => 'pelayan@resto.com',
                'password' => Hash::make('password'),
                'role' => 'pelayan',
            ],
            [
                'name' => 'Kasir',
                'email' => 'kasir@resto.com',
                'password' => Hash::make('password'),
                'role' => 'kasir',
            ],
            [
                'name' => 'Pelayan 2',
                'email' => 'pelayan2@resto.com',
                'password' => Hash::make('password'),
                'role' => 'pelayan',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}