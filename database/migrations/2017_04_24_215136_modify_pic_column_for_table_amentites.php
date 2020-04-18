<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPicColumnForTableAmentites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('amenities', function (Blueprint $table) {
            $table->string('picture')->default('amenityDefaultPic.png')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('amenities', function (Blueprint $table) {
            $table->string('picture')->default(NULL)->change();
        });
    }
}
