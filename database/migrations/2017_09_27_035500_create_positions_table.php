<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('positions');
        Schema::create('positions', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name_position',255);
            $table->text('description');
            $table->string('code_position',10);                       
            $table->rememberToken();
            $table->timestamps();
        });
         Schema::table('users', function(Blueprint $table){
            $table->foreign('id_position')->references('id')->on('positions');
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
        Schema::table('users', function(Blueprint $table){
            $table->dropForeign('users_id_position_foreign');
        }); 
        Schema::drop('positions');
               
    }
}
