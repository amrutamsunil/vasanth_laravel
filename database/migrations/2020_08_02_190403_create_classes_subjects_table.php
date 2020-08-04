<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id');
            $table->foreignId('subject_id');
            $table->timestamps();
        });
        Schema::table('classes_subjects',function(Blueprint $table){
            $table->foreign('class_id')->references('id')->on('classes')
                ->onDelete('cascade');;
            $table->foreign('subject_id')->references('id')->on('subjects')
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
        Schema::dropIfExists('classes_subjects');
    }
}
