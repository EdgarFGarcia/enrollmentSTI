<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HandledYrLvl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handled_yr_lvl', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('prof_id')->unsigned();
            $table->foreign('prof_id')->references('id')->on('users');
            $table->time('from_time');
            $table->time('to_time');
            $table->bigInteger('subjects_id')->unsigned();
            $table->foreign('subjects_id')->references('id')->on('subject');
            $table->bigInteger('rooms_id')->unsigned();
            $table->foreign('rooms_id')->references('id')->on('room');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('handled_yr_lvl');
    }
}
