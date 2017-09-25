<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('warehouses', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('name_warehouse',255);            
            $table->string('code_warehouse',100);
            $table->text('description');
            $table->integer('id_location')->unsigned()->nullable();            
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('warehouses', function (Blueprint $table) {
            $table->foreign('id_location')->references('id')->on('locations')->onDelete('cascade');
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
        Schema::dropIfExists('warehouses');        
    }
}
