<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->bigInteger('amount_paid');
            $table->bigInteger('total_amount');
            $table->enum(['paid'],['pending'])->default('pending');
            $table->timestamps();
        });
        Schema::table('fees',function(Blueprint $table){
            $table->foreign('student_id')->references('id')
                ->on('students')
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
        Schema::dropIfExists('fees');
    }
}
