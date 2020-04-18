<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_rooms', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('place_id')->unsigned();
            $table->foreign('place_id')->references('id')->on('places');
            $table->integer('room_number');

            $table->integer('beds_number');
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
        Schema::dropIfExists('place_rooms');
    }
}
