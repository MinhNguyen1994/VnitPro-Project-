<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('history_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_bill',100);
            $table->string('code_bill',100);
            $table->integer('id_user')->usigned();
            $table->integer('id_location')->unsigned();           
            $table->boolean('actions');
            $table->text('description');
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
        Schema::dropIfExists('history_bills');
    }
}
