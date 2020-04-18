<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropForeignKeyPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function (Blueprint $table) {
            $table->dropForeign(['owner_id']);
            $table->dropForeign(['type_id']);
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
            $table->dropForeign(['owner_id']);
            $table->dropForeign(['type_id']);
        });
    }
}
