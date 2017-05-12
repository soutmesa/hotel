<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSeasons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->increments('season_id');
            //$table->integer('coupon_id')->unsigned();
            $table->string('season_name')->unique();
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->timestamps();

            //$table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seasons');
    }
}
