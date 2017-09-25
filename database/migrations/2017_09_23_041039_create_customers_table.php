<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('name_customer',255);            
            $table->text('information_customer');            
            $table->text('description');
            $table->integer('id_customer_group')->unsigned()->nullable();            
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('customers', function (Blueprint $table){
            $table->foreign('id_customer_group')->references('id')->on('customer_groups');
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
        Schema::dropIfExists('customers');
    }
}
