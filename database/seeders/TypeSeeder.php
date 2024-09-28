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
            'gasoline',
            'diesel',
            'hybrid',
            'electric',
            'Sedan',
            'Hydrogen ',
            
        ];

        foreach ($types as $type) {
            DB::table('types')->insert(['name' => $type]);
        }
    }
}
