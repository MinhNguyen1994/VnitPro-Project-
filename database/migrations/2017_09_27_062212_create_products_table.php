<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_products',255);
            $table->string('quanlity',255);
            $table->text('description');            
            $table->integer('id_product_group')->unsigned();
            $table->rememberToken();
            $table->timestamps();
        });
         Schema::table('products', function(Blueprint $table){
            $table->foreign('id_product_group')->references('id')->on('product_groups');
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
        Schema::drop('products');
    }
}
