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
            $table->string('web_address')->nullable();
            $table->string('address');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('address_details')->nullable();
            $table->string('street')->nullable();
            $table->string('street_number')->nullable();
            $table->string('code')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
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
