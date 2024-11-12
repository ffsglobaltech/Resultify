<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('section_id');
            $table->string('class_name', 100);
            $table->unsignedBigInteger('form_teacher_id')->nullable();
            $table->unsignedBigInteger('assistant_teacher_id')->nullable();
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('form_teacher_id')->references('id')->on('school_users')->onDelete('set null');
            $table->foreign('assistant_teacher_id')->references('id')->on('school_users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
