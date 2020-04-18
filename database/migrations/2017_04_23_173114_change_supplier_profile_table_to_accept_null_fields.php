<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSupplierProfileTableToAcceptNullFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supplier_profile', function (Blueprint $table) {
            $table->string('web_address')->nullable()->change();
            $table->string('lat')->nullable()->change();
            $table->string('lng')->nullable()->change();
            $table->string('address_details')->nullable()->change();
            $table->string('street')->nullable()->change();
            $table->string('street_number')->nullable()->change();
            $table->string('code')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->string('state')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supplier_profile', function (Blueprint $table) {
            $table->string('web_address')->nullable(false)->change();
            $table->string('lat')->nullable(false)->change();
            $table->string('lng')->nullable(false)->change();
            $table->string('address_details')->nullable(false)->change();
            $table->string('street')->nullable(false)->change();
            $table->string('street_number')->nullable(false)->change();
            $table->string('code')->nullable(false)->change();
            $table->string('country')->nullable(false)->change();
            $table->string('state')->nullable(false)->change();
        });
    }
}
