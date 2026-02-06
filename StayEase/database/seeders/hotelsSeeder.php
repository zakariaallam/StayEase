<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class hotelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Hotel = Hotel::create([
            'nom' => "rahma",
            'adresse' => "hay rahma",
            'image' => "oidjf/dfd/.png",
            'description' => 'Hotel standard confortable',
        ]);
        $Hotel = Hotel::create([
            'nom' => "rahma",
            'adresse' => "hay rahma",
            'image' => "oidjf/dfd/.png",
            'description' => 'Hotel standard confortable',
        ]);
        $Hotel = Hotel::create([
            'nom' => "rahma",
            'adresse' => "hay rahma",
            'image' => "oidjf/dfd/.png",
            'description' => 'Hotel standard confortable',
        ]);
    }
}
