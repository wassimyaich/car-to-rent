<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'SUV',
            'Convertible',
            'Hatchback',
            'Coupe',
            'Sedan',
            'Sports car',
            'Station wagon',
            'Minivan',
            'Crossover',
            'Truck',
            'Family car',
            'Luxury car',
            'Off-road vehicle',
            'Electric vehicle',
            'Hybrid',
            'Van',
            'City car',
            'Estates',
            'Hot hatch',
            'Jeep',
            'Limousine',
            'Microcar',
        ];

        foreach ($types as $type) {
            DB::table('types')->insert(['name' => $type]);
        }
    }
}
