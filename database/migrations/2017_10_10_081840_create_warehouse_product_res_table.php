<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehouseProductResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('warehouse_product_res', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_product')->unsigned();
            $table->integer('id_warehouse')->unsigned();            
            $table->integer('quanlity')->unsigned();       
            $table->integer('id_unit')->unsigned();
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
        Schema::dropIfExists('warehouse_product_res');
    }
}
