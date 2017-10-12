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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_product',255);
            $table->string('code_product',50);            
            $table->text('description');            
            $table->integer('id_product_group')->unsigned();
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
        Schema::drop('products');
    }
}
