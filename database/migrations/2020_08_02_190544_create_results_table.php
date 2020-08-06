<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id');
            $table->foreignId('exam_id');
            $table->foreignId('student_id');
            $table->integer('mark');
            $table->timestamps();
        });
        Schema::table('results',function(Blueprint $table){
            $table->foreign('subject_id')->references('id')->on('subjects')
                ->onDelete('cascade');;
            $table->foreign('exam_id')->references('id')->on('exams')
                ->onDelete('cascade');;
            $table->foreign('student_id')->references('id')->on('students')
                ->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
