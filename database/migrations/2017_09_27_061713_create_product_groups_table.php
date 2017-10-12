<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //        
        Schema::create('product_groups', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name_product_group',255);            
            $table->string('code_product_group',10);            
            $table->text('description');                                
            $table->rememberToken();
            $table->timestamps();
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('product_groups');
    }
}
