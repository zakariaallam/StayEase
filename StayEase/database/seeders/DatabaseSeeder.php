<?php

namespace Database\Seeders;

use App\Models\User;
<<<<<<< HEAD
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;
=======
use Database\Seeders\TagSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\RoomSeeder;

use Database\Seeders\PropertySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
>>>>>>> 4bf11cc0dce6c5f82c6215d1f01651307b497497

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // // User::factory(10)->create();


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Hotel::factory()->create([
            'nom' => 'Hotel5',
            'adresse' => 'youssofia1',
            'description' => 'The best one',
        ]);
        User::factory()->create([
            'name' => 'Soufyane el omrani',
            'email' => 'soufyane@example.com',
            'password' => '1234'
        ]);
    }
=======
        // User::factory(10)->create();

        
        $this->call([PropertySeeder::class]);
        $this->call([hotelsSeeder::class]);
        $this->call([TagSeeder::class]);
        $this->call([RoomSeeder::class]);

        
    }   
>>>>>>> 4bf11cc0dce6c5f82c6215d1f01651307b497497
}
