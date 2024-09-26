<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->delete();
        $brands = array(
          array('name' => 'Toyota', 'country_id' => 109),
            array('name' => 'Ford', 'country_id' => 231),
            array('name' => 'BMW', 'country_id' => 82),
            array('name' => 'Audi', 'country_id' => 82),
            array('name' => 'Hyundai', 'country_id' => 116),
            array('name' => 'Volkswagen', 'country_id' => 82),
            array('name' => 'Honda', 'country_id' => 109),
            array('name' => 'Chevrolet', 'country_id' => 231),
            array('name' => 'Nissan', 'country_id' => 109),
            array('name' => 'Kia', 'country_id' => 116)
        );

        DB::table('brands')->insert($brands);
    }
}
