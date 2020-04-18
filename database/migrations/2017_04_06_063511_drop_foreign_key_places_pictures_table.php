<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropForeignKeyPlacesPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('place_pictures', function (Blueprint $table) {
            $table->dropForeign(['place_id']);

            $table->foreign('place_id')
                ->references('id')->on('places')
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
        Schema::table('place_pictures', function (Blueprint $table) {
            $table->dropForeign(['place_id']);

            $table->foreign('place_id')
                ->references('id')->on('places')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }
}
