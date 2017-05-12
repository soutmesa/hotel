<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRoomcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomcategory', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('room_facility_id')->unsigned();
            //$table->integer('room_capacity_id')->unsigned();
            $table->string('room_category_name', 130)->unique();
            $table->text('room_description');
            $table->string('room_category_bed');
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
        Schema::dropIfExists('roomcategory');
    }
}
