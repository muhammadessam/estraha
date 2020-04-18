<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_pictures', function (Blueprint $table) {
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
        Schema::dropIfExists('place_pictures');
    }
}
