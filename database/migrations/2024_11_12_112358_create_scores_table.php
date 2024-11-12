<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('subject_id');
            $table->decimal('ca1_score', 5, 2)->nullable();
            $table->decimal('ca2_score', 5, 2)->nullable();
            $table->decimal('cw_score', 5, 2)->nullable();
            $table->decimal('hw_score', 5, 2)->nullable();
            $table->decimal('exam_score', 5, 2)->nullable();
            $table->decimal('total_score', 6, 2)->virtualAs('ca1_score + ca2_score + cw_score + hw_score + exam_score');
            $table->string('grade', 5)->nullable();
            $table->string('comments', 255)->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
