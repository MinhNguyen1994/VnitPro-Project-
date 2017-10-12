<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bill_details', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('id_user')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('quanlity_change')->unsigned();
            $table->integer('id_bills');
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
        Schema::dropIfExists('bill_details');
    }
}
