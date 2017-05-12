<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRoomcapacity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomcapacity', function (Blueprint $table) {
            $table->increments('room_capacity_id');
            $table->string('room_capacity_name', 100)->unique();
            $table->integer('room_capacity_adult');
            $table->integer('room_capacity_child');
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
        Schema::dropIfExists('roomcapacity');
    }
}
