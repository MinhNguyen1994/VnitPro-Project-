<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('districts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name_district',255);
            $table->text('description')->nullable();
            $table->integer('code_city')->unsigned();
            $table->integer('code_district')->unsigned();                        
            $table->rememberToken();
            $table->timestamps();
        });
        /*Schema::table('districts', function(Blueprint $table) {
            $table->foreign('code_city')->references('id_city')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('districts');
        /*Schema::table('districts', function($table) {
            $table->dropForeign('districts_code_city_foreign');
        });*/
        
        
    }
}
