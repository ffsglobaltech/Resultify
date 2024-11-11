<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('schools', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('short_name')->unique();
        $table->string('domain')->nullable();
        $table->string('logo_path')->nullable();
        $table->string('motto')->nullable();
        $table->string('address');
        $table->string('subdomain');
        $table->string('country');
        $table->string('state');
        $table->string('city');
        $table->string('contact_email');
        $table->string('contact_phone');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
