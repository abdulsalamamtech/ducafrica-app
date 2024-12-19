<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('booked_event_id')->nullable()->constrained('booked_events')->cascadeOnDelete();
            $table->decimal('amount', 10, 2);
            $table->string('reference');
            $table->string('payment_url');
            $table->string('payment_status')->default('pending');
            $table->string('psp')->default('unknown')->comment('PSP : Payment Service Provider');
            $table->string('currency')->default('NGN');
            $table->string('mode')->default('online');
            $table->string('status')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
