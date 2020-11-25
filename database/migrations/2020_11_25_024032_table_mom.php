<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableMom extends Migration
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
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');
            $table->string('title_mom');
            $table->string('date_mom');
            $table->string('start_mom');
            $table->string('end_mom');
            $table->string('objective_mom');
            $table->string('decision_made');
            $table->integer('count_attendee');
            $table->integer('created_note');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('user_mom', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mom')->nullable();
            $table->foreign('id_mom')->references('id')->on('mom');
            $table->string('id_attendee', 30)->nullable();
            $table->foreign('id_attendee')->references('id_staff')->on('staff');
            $table->timestamps();
        });
        Schema::create('note_mom', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mom')->nullable();
            $table->foreign('id_mom')->references('id')->on('mom');
            $table->string('note_desc');
            $table->timestamps();
        });
        Schema::create('notif', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mom')->nullable();
            $table->foreign('id_mom')->references('id')->on('mom');
            $table->string('notif_type');
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
        Schema::dropIfExists('mom');
        Schema::dropIfExists('user_mom');
        Schema::dropIfExists('note_mom');
        Schema::dropIfExists('notif');
    }
}
