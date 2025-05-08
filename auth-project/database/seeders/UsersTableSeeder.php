<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'is_admin' => true,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'is_admin' => false,
        ]);
    }
}
