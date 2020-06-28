<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnrollmentForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollment_form', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('students_id')->unsigned();
            $table->foreign('students_id')->references('id')->on('users');

            $table->json('subjects_id');

            $table->bigInteger('school_year_id')->unsigned();
            $table->foreign('school_year_id')->references('id')->on('year_level_grades');

            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('course');

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
        Schema::dropIfExists('enrollment_form');
    }
}
