<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Tamu Sekolah',
            'email' => 'guest@gmail.com',
            'password' => bcrypt('guest123'),
            'role' => 'guest'
        ]);
    }
}