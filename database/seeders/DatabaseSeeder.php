<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat user dengan role admin
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'roles' => 'admin', // Peran sebagai admin
            'password' => bcrypt('password'), // Password default
        ]);

        // Membuat user dengan role user
        User::factory()->create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'roles' => 'user', // Peran sebagai user
            'password' => bcrypt('password'), // Password default
        ]);
    }
}
