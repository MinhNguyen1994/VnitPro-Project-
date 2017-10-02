<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('wards', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name_ward',255);
            $table->text('description')->nullable();            
            $table->integer('code_district')->unsigned();                      
            $table->integer('code_ward')->unsigned();                      
            $table->rememberToken();
            $table->timestamps();
        });
        /*Schema::table('wards', function($table) {
            $table->foreign('code_district')->references('code_district')->on('districts')->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        /*Schema::table('wards', function($table) {
            $table->dropForeign('wards_code_district_foreign');
        });*/
        Schema::dropIfExists('wards');
        
    }
}
