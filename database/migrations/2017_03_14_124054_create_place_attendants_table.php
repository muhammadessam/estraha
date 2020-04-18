<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceAttendantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_amenities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('picture');
            $table->integer('place_id')->unsigned();
            $table->foreign('place_id')->references('id')->on('places');
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
        Schema::dropIfExists('place_amenities');
    }
}
