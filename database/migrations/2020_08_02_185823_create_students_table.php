<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("roll_no");
            $table->string("name");
            $table->string("email");
            $table->string("father_name");
            $table->string("address");
            $table->string("phone_no")->nullable();
            $table->string("image")->nullable();
            $table->foreignId("class_id");
            $table->string('password')->default(Hash::make("1234"));
            $table->timestamps();
        });
        Schema::table('students',function(Blueprint $table){
            $table->foreign('class_id')->references('id')->on('classes')
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
        Schema::dropIfExists('students');
    }
}
