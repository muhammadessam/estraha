<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropForeignKeyBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
            $table->dropForeign(['owner_id']);
            $table->dropForeign(['client_id']);

            $table->foreign('place_id')
                ->references('id')->on('places')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('owner_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('client_id')
                ->references('id')->on('users')
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
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
            $table->dropForeign(['owner_id']);
            $table->dropForeign(['client_id']);

            $table->foreign('place_id')
                ->references('id')->on('places')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('owner_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('client_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }
}
