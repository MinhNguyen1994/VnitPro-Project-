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
        DB::table('positions')->insert([            
            'name_position' => str_random(30),
            'description' => str_random(30),
            'code_position' => str_random(4),            
        ]);
        DB::table('warehouse')->insert([            
            'name_warehouse' => str_random(30),
            'description' => str_random(30),
            'address' => str_random(10),
            'id_ward' => '1'            
        ]);
    }
}
