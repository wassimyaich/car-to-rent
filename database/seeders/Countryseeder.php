<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Countryseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->delete();
        $countries = array(
            array('id' => 222, 'code' => 'TN', 'name' => "Tunisia", 'phonecode' => 216),
        );
        DB::table('countries')->insert($countries);
    
    }
}
