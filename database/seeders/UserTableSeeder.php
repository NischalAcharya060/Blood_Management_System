<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Nischal Acharya',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Nischal@#060'),
            'role' => 'admin',
        ]);
    }
}

