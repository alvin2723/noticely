<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffSupervisorManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('manager', function (Blueprint $table) {
            $table->string('id_manager', 30)->primary();
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');
            $table->string('name');
            $table->string('alamat');
            $table->string('phone');
            $table->timestamps();
        });
        Schema::create('supervisor', function (Blueprint $table) {
            $table->string('id_supervisor', 30)->primary();
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');
            $table->string('id_manager');
            $table->foreign('id_manager')->references('id_manager')->on('manager');
            $table->string('name');
            $table->string('alamat');
            $table->string('phone');
            $table->timestamps();
        });
        Schema::create('staff', function (Blueprint $table) {
            $table->string('id_staff', 30)->primary();
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');
            $table->string('id_supervisor');
            $table->foreign('id_supervisor')->references('id_supervisor')->on('supervisor');
            $table->string('name');
            $table->string('alamat');
            $table->string('phone');
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
        Schema::dropIfExists('manager');
        Schema::dropIfExists('supervisor');
        Schema::dropIfExists('staff');
    }
}
