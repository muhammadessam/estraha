<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->string('description');
            $table->string('picture');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('address');
            $table->string('gender');
            $table->boolean('special_offer');
            $table->integer('price_offer');
            $table->integer('rooms');
            $table->integer('guests');
            $table->integer('owner_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('type_id')->references('id')->on('types');
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
        Schema::dropIfExists('places');
    }
}
