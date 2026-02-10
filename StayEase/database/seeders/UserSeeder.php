<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(100)->create();
        User::factory()->create([
            'name' => 'Soufyan el omrani',
            'email' => 'admin@stayease.com',
            'password' => Hash::make('password'),
        ]);
    }
}