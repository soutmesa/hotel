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
            //$table->integer('role_id')->unsigned();
            $table->string('username', 50)->unique();
            $table->string('firstname',50);
            $table->string('lastname',50);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('gender', 10);
            $table->string('dob', 50);
            $table->string('points', 100)->nullable();
            $table->string('profile')->nullable();
            $table->text('pob');
            $table->rememberToken();
            $table->timestamps();
        });

        // Schema::table('users', function($table) {
        //     $table->foreign('role_id')->references('id')->on('roles')->onDelete('restrict');
        // });
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
