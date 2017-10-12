<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('warehouse', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name_warehouse',255);
            $table->string('address',255);
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
        Schema::dropIfExists('warehouse');
    }
}
