<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SupplierProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('web_address');
            $table->string('address');
            $table->string('lat');
            $table->string('lng');
            $table->string('address_details');
            $table->string('street');
            $table->string('street_number');
            $table->string('code');
            $table->string('country');
            $table->string('state');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_profile');
    }
}
