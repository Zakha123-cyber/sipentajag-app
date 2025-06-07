<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Jagung',
            'email' => 'admin@jagungku.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Petani Jagung',
            'email' => 'petani@jagungku.com',
            'password' => Hash::make('password'),
            'role' => 'user'
        ]);
    }
}
