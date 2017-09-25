<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('locations')->insert([            
            'name_location' => str_random(30),
            'adress' => str_random(30),
            'description' => str_random(30),            
        ]);
    }
}
