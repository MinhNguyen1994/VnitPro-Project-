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

        DB::table('products_unit')->insert([
            'name'  => str_random(7);
            'code'  => str_random(5);
            'description' => str_random(10);
        ]);
        
    }
}
