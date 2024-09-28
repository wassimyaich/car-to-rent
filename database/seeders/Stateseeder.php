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
            array('name' => "Ariana", 'country_id' => 222),
            array('name' => "Béja", 'country_id' => 222),
            array('name' => "Ben Arous", 'country_id' => 222),
            array('name' => "Bizerte", 'country_id' => 222),
            array('name' => "Gabès", 'country_id' => 222),
            array('name' => "Gafsa", 'country_id' => 222),
            array('name' => "Jendouba", 'country_id' => 222),
            array('name' => "Kairouan", 'country_id' => 222),
            array('name' => "Kasserine", 'country_id' => 222),
            array('name' => "Kebili", 'country_id' => 222),
            array('name' => "Kef", 'country_id' => 222),
            array('name' => "Mahdia", 'country_id' => 222),
            array('name' => "Manouba", 'country_id' => 222),
            array('name' => "Medenine", 'country_id' => 222),
            array('name' => "Monastir", 'country_id' => 222),
            array('name' => "Nabeul", 'country_id' => 222),
            array('name' => "Sfax", 'country_id' => 222),
            array('name' => "Sidi Bou Zid", 'country_id' => 222),
            array('name' => "Siliana", 'country_id' => 222),
            array('name' => "Sousse", 'country_id' => 222),
            array('name' => "Tataouine", 'country_id' => 222),
            array('name' => "Tunis", 'country_id' => 222),
            array('name' => "Zaghouan", 'country_id' => 222),
            array('name' => "Mahdia", 'country_id' => 222),
            //this is the list of aerport
            array('name' => "Monastir Habib Bourguiba International Airport", 'country_id' => 222),
            array('name' => "Djerba–Zarzis international Airport", 'country_id' => 222),
            array('name' => "Sfax-Thyna International Airport", 'country_id' => 222),
            array('name' => "Tozeur–Nefta International Airport", 'country_id' => 222),
            array('name' => "Enfidha-Hammamet International Airport", 'country_id' => 222),
            array('name' => "Gafsa-Ksar International Airport", 'country_id' => 222),
            array('name' => "Tabarka–Aïn Draham International Airport", 'country_id' => 222),
            array('name' => "Remada Airport", 'country_id' => 222),
            array('name' => "Tunis-Carthage International Airport", 'country_id' => 222),
            array('name' => "Gabès–Matmata International Airport", 'country_id' => 222),


        );
        DB::table('states')->insert($states);
    }
}
