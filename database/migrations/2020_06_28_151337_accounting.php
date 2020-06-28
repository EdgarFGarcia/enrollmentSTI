<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Accounting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounting', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('students_id')->unsigned();
            $table->foreign('students_id')->references('id')->on('users');

            $table->bigInteger('school_year_id')->unsigned();
            $table->foreign('school_year_id')->references('id')->on('year_level_grades');

            $table->double('balance', 10, 2); // 14,650.00

            $table->bigInteger('enrollment_form_id')->unsigned();
            $table->foreign('enrollment_form_id')->references('id')->on('enrollment_form');

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
        Schema::dropIfExists('accounting');
    }
}
