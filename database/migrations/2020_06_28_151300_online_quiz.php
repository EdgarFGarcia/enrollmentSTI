<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OnlineQuiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_quiz', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('prof_id')->unsigned();
            $table->foreign('prof_id')->references('id')->on('users');

            $table->bigInteger('students_id')->unsigned();
            $table->foreign('students_id')->references('id')->on('users');

            $table->bigInteger('subjects_id')->unsigned();
            $table->foreign('subjects_id')->references('id')->on('subject');

            $table->bigInteger('grades_id')->unsigned();
            $table->foreign('grades_id')->references('id')->on('grade_computation');

            $table->bigInteger('school_year_id')->unsigned();
            $table->foreign('school_year_id')->references('id')->on('year_level_grades');

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
        Schema::dropIfExists('online_quiz');
    }
}
