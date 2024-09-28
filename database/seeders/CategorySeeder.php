<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Sports car',
            'Convertible',
            'Minivan',
            'Coupe',
            'Hatchback',
            'Sedan',
            'SUV',
            'Pickup truck',
            'Crossover',
            'Luxury car',
            'Sport Utility vehicles',
            'Station Wagon',
            'Van', 
            'Truck',
            'Family car',
            
            'Off-road vehicle',
            'Electric vehicle',
            'Hybrid',
            
            'City car',
            'Estates',
            'Hot hatch',
            'Jeep',
            'Limousine',
            'Microcar',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert(['name' => $category]);
        }
    }
}
