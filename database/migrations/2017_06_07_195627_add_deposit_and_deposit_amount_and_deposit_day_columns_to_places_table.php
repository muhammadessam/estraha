<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDepositAndDepositAmountAndDepositDayColumnsToPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function (Blueprint $table) {
            $table->boolean('deposit')->default(0);
            $table->integer('deposit_amount')->default(0)->nullable();
            $table->string('deposit_days')->nullable();
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
            $table->dropColumn('deposit');
            $table->dropColumn('deposit_amount');
            $table->dropColumn('deposit_days');
        });
    }
}
