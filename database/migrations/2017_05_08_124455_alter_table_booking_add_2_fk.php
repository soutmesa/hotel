<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableBookingAdd2Fk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table)
        {
            $table->integer('room_id')->unsigned()
                ->after('id')
                ->foreign('room_id')
                ->references('room_id')
                ->on('rooms')
                ->onDelete('restrict');
        });

        Schema::table('bookings', function (Blueprint $table)
        {
            $table->integer('room_category_id')->unsigned()
                ->after('room_id')
                ->foreign('room_category_id')
                ->references('id')
                ->on('roomcategory')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('room_id');
            $table->dropColumn('room_category_id');
        });
    }
}
