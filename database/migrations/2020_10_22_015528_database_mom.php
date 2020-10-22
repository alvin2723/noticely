<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DatabaseMom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mom', function (Blueprint $table) {
            $table->id();
            $table->string('title_mom');
            $table->string('date_mom');
            $table->string('start_mom');
            $table->string('end_mom');
            $table->string('objective_mom');
            $table->string('decision_made');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('user_mom', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_mom');
            $table->foreign('id_mom')->references('id')->on('mom');
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
        Schema::dropIfExists('user_mom');

    }
}
