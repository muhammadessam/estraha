<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPictureColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('place_pictures', function (Blueprint $table) {
            $table->dropColumn(['picture']);
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
            $table->dropColumn(['picture']);
        });
    }
}
