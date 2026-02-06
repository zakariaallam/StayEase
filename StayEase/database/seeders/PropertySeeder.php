<?php

namespace Database\Seeders;


use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Property = ['HUY', 'WIFI', 'Eco', 'FRD', 'TV'];
        foreach ($Property as $Propert) {
            Property::create([
                'name' => $Propert,
                'icon' => "LOL",
            ]);
        }
    }
}
