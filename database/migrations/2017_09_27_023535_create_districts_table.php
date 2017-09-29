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
            $table->string('name_districts',255);
            $table->text('description');
            $table->integer('id_city')->unsigned();            
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('districts', function(Blueprint $table) {
            $table->foreign('id_city')->references('id')->on('cities')->onDelete('cascade');
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
        Schema::table('districts', function($table) {
            $table->dropForeign('districts_id_city_foreign');
        });
        Schema::dropIfExists('districts');
        
    }
}
