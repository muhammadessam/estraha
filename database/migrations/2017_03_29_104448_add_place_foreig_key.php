<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlaceForeigKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('place_amenities', function (Blueprint $table) {

            $table->foreign('place_id')
                ->references('id')->on('places')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('amenity_id')->unsigned();
            $table->foreign('amenity_id')
                ->references('id')->on('amenities')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('place_amenities', function (Blueprint $table) {

            $table->foreign('place_id')
                ->references('id')->on('places')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->dropColumn('amenity_id');
            $table->foreign('amenity_id')
                ->references('id')->on('amenities')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }
}