<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('locations')->insert([            
            'name_location' => str_random(30),
            'adress' => str_random(30),
            'description' => str_random(30),            
        ]);
    }
}
