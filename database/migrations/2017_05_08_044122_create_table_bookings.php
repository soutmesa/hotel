<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBookings extends Migration
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
            $table->dateTime('booking_date');
            $table->dateTime('arrived_date');
            $table->dateTime('departure_date');
            $table->string('status', 5);
            $table->integer('total_night');
            $table->integer('total_room');
            $table->integer('total_adult');
            $table->integer('total_child');
            $table->integer('total_cost');
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
        Schema::dropIfExists('bookings');
    }
}
