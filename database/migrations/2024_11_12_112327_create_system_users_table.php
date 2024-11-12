<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemUsersTable extends Migration
{
    public function up()
    {
        Schema::create('system_users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 100)->unique();
            $table->string('email', 255)->unique();
            $table->string('password');
            $table->enum('role', ['super_admin', 'system_admin']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('system_users');
    }
}
