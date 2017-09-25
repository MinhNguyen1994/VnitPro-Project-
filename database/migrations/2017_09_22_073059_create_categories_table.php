<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('name_category',255);            
            $table->string('code_category',100);
            $table->integer('quanlity')->unsigned();
            $table->text('description');
            $table->integer('id_group_category')->unsigned()->nullable();
            $table->integer('id_warehouse')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('id_group_category')->references('id')->on('category_groups')->onDelete('cascade');
            $table->foreign('id_warehouse')->references('id')->on('warehouses')->onDelete('cascade');
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
        Schema::dropIfExists('categories');
    }
}
