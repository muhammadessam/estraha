<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',255);
            $table->string('phone_number');
            $table->string('city');
            $table->integer('price');
            $table->date('check_in');
            $table->date('check_out');
            $table->string('payment_method');
            $table->integer('place_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('owner_id')->unsigned();
            $table->foreign('place_id')->references('id')->on('places');
            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('owner_id')->references('id')->on('users');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
