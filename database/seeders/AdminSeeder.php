<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'name' => 'Admin',
            'email' => 'rana@gmail.com',
            'password' => Hash::make('rana12'),
            'role' => 'admin',
            'status' => 'active'
        ]);
    }
}
