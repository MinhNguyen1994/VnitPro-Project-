<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('name_supplier',255);            
            $table->text('information_supplier');            
            $table->text('description');
            $table->integer('id_supplier_group')->unsigned()->nullable();            
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('suppliers', function (Blueprint $table){
            $table->foreign('id_supplier_group')->references('id')->on('supplier_groups');
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
        Schema::dropIfExists('suppliers');
    
    }
}
