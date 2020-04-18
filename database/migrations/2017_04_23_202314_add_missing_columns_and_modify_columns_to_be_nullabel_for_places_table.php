<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMissingColumnsAndModifyColumnsToBeNullabelForPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function (Blueprint $table) {
            $table->integer('price')->nullable()->change();
            $table->string('lat')->nullable()->change();
            $table->string('lng')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->integer('rooms')->nullable()->change();
            $table->integer('guests')->nullable()->change();
            $table->string('checkin_start')->nullable();
            $table->string('checkin_end')->nullable();
            $table->integer('stars')->nullable();
            $table->integer('inner_room')->nullable();
            $table->integer('double_rooms_count')->nullable();
            $table->integer('single_rooms_count')->nullable();
            $table->boolean('sleep_room')->nullable();
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
            $table->integer('price')->nullable(false)->change();
            $table->string('lat')->nullable(false)->change();
            $table->string('lng')->nullable(false)->change();
            $table->string('address')->nullable(false)->change();
            $table->integer('rooms')->nullable(false)->change();
            $table->integer('guests')->nullable(false)->change();
            $table->dropColumn(['checkin_start', 'checkin_end', 'stars',
                                'inner_room','double_rooms_count'
                                ,'single_rooms_count','sleep_room']);
        });
    }
}
