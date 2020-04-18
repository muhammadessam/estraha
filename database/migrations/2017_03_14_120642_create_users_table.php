<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique('users_email');
            $table->string('password',60);
            $table->string('phone_number')->unique();
            $table->string('gender');
            $table->date('birth_date');
            $table->boolean('active')->default(0);
            $table->integer('activation_code');
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');


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
        Schema::dropIfExists('users');
    }
}
