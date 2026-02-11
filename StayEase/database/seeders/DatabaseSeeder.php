<?php

namespace Database\Seeders;

use Database\Seeders\TagSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\RoomSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PropertySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $this->call([PropertySeeder::class]);
        $this->call([hotelsSeeder::class]);
        $this->call([TagSeeder::class]);
        $this->call([RoomSeeder::class]);
        $this->call([UserSeeder::class]);
    }
}
