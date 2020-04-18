<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignKeyPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function (Blueprint $table) {

            $table->foreign('owner_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('type_id')
                ->references('id')->on('types')
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
        Schema::table('places', function (Blueprint $table) {

            $table->foreign('owner_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('type_id')
                ->references('id')->on('types')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }
}
