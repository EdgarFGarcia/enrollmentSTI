<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name'); // programming 101, programming 102
            $table->double('subject_price', 10, 2); // 4500.00,    6500.00
            $table->double('lab_fee', 10, 2)->nullable(); // 2500.00
            $table->double('per_unit_price', 10, 2); // 4000.00 / 1,333.33
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
        Schema::dropIfExists('subject');
    }
}
