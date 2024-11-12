<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('plan_id');
            $table->integer('number_of_students');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['active', 'expired', 'pending'])->default('pending');
            $table->enum('payment_status', ['paid', 'unpaid', 'overdue'])->default('unpaid');
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('subscription_plans')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
