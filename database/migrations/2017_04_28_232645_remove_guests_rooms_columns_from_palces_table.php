<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveGuestsRoomsColumnsFromPalcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function (Blueprint $table) {
            $table->dropColumn('rooms');
            $table->dropColumn('guests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('places', function (Blueprint $table) {
            $table->integer('rooms')->nullable();
            $table->integer('guests')->nullable();
        });
    }
}
