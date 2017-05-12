<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableRoompriceAdd4Fk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('roomprice', function (Blueprint $table)
        {
            $table->integer('room_category_id')
                ->after('room_price_id')
                ->unsigned()
                ->foreign('room_category_id')
                ->references('id')
                ->on('roomcategory')
                ->onDelete('restrict');
        });

        Schema::table('roomprice', function (Blueprint $table)
        {
            $table->integer('season_id')
                ->after('room_category_id')
                ->unsigned()
                ->foreign('season_id')
                ->references('season_id')
                ->on('seasons')
                ->onDelete('restrict');
        });

        Schema::table('roomprice', function (Blueprint $table)
        {
            $table->integer('room_capacity_id')
                ->after('season_id')
                ->unsigned()
                ->foreign('room_capacity_id')
                ->references('room_capacity_id')
                ->on('roomcapacity')
                ->onDelete('restrict');
        });

        Schema::table('roomprice', function (Blueprint $table)
        {
            $table->integer('room_facility_id')
                ->after('room_capacity_id')
                ->unsigned()
                ->foreign('room_facility_id')
                ->references('id')
                ->on('roomfacilities')
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
        Schema::table('roomprice', function (Blueprint $table) {
            $table->dropColumn('room_category_id');
            $table->dropColumn('season_id');
            $table->dropColumn('room_capacity_id');
            $table->dropColumn('room_facility_id');
        });
    }
}
