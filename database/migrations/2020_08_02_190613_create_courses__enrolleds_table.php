<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesEnrolledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_enrolled', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('course_id');
            $table->enum('status',['active','inactive','expired'])->default('inactive');
            $table->timestamps();
        });
        Schema::table('courses_enrolled',function(Blueprint $table){
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_enrolled');
    }
}
