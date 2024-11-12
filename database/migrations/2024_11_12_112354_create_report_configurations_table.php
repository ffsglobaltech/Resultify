<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportConfigurationsTable extends Migration
{
    public function up()
    {
        Schema::create('report_configurations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('term_id');
            $table->string('session', 20);
            $table->integer('number_of_subjects');
            $table->text('grade_boundaries')->nullable(); // JSON format for custom grade boundaries
            $table->boolean('include_traits')->default(true);
            $table->boolean('include_psychomotor')->default(true);
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('report_configurations');
    }
}
