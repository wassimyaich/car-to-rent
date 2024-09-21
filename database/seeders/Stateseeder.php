<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('states')->delete();
        $states = array(
            array('name' => "Aryanah", 'country_id' => 222),
            array('name' => "Bajah", 'country_id' => 222),
            array('name' => "Bin 'Arus", 'country_id' => 222),
            array('name' => "Binzart", 'country_id' => 222),
            array('name' => "Gouvernorat de Ariana", 'country_id' => 222),
            array('name' => "Gouvernorat de Nabeul", 'country_id' => 222),
            array('name' => "Gouvernorat de Sousse", 'country_id' => 222),
            array('name' => "Hammamet Yasmine", 'country_id' => 222),
            array('name' => "Jundubah", 'country_id' => 222),
            array('name' => "Madaniyin", 'country_id' => 222),
            array('name' => "Manubah", 'country_id' => 222),
            array('name' => "Monastir", 'country_id' => 222),
            array('name' => "Nabul", 'country_id' => 222),
            array('name' => "Qabis", 'country_id' => 222),
            array('name' => "Qafsah", 'country_id' => 222),
            array('name' => "Qibili", 'country_id' => 222),
            array('name' => "Safaqis", 'country_id' => 222),
            array('name' => "Sfax", 'country_id' => 222),
            array('name' => "Sidi Bu Zayd", 'country_id' => 222),
            array('name' => "Silyanah", 'country_id' => 222),
            array('name' => "Susah", 'country_id' => 222),
            array('name' => "Tatawin", 'country_id' => 222),
            array('name' => "Tawzar", 'country_id' => 222),
            array('name' => "Tunis", 'country_id' => 222),
            array('name' => "Zaghwan", 'country_id' => 222),
            array('name' => "al-Kaf", 'country_id' => 222),
            array('name' => "al-Mahdiyah", 'country_id' => 222),
            array('name' => "al-Munastir", 'country_id' => 222),
            array('name' => "al-Qasrayn", 'country_id' => 222),
            array('name' => "al-Qayrawan", 'country_id' => 222)
        );
        DB::table('states')->insert($states);
    }
}
