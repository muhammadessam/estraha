<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAmenitiesPlacesColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('place_amenities', function (Blueprint $table) {
            $table->dropColumn(['name', 'picture']);
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
            $table->dropColumn(['name', 'picture']);
        });
    }
}
