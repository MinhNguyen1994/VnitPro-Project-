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
        Schema::dropIfExists('warehouse');
        Schema::create('warehouse', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name_warehouse',255);
            $table->string('address',255);
            $table->text('description');
            $table->integer('id_ward')->unsigned();                     
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('warehouse', function(Blueprint $table){
            $table->foreign('id_ward')->references('id')->on('wards');
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
