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
            $table->string('place_name');
            $table->integer('price')->nullable();
            $table->string('description')->default('0');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('address')->nullable();
            $table->string('gender');
            $table->boolean('special_offer')->default(0);
            $table->string('price_offer')->nullable();
            $table->integer('rooms')->nullable();
            $table->string('checkin_start')->nullable();
            $table->string('checkin_end')->nullable();
            $table->integer('stars')->nullable();
            $table->integer('inner_room')->nullable();
            $table->integer('double_rooms_count')->nullable();
            $table->integer('single_rooms_count')->nullable();
            $table->boolean('sleep_room')->nullable();
            $table->integer('guests')->nullable();
            $table->boolean('deposit')->default(0);
            $table->integer('deposit_amount')->default(0)->nullable();
            $table->string('deposit_days')->nullable();
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
