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
        Schema::create('cancel_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('approved_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('booked_event_id')->nullable()->constrained('booked_events')->cascadeOnDelete();
            $table->decimal('amount_paid', 10, 2);
            $table->text('message');
            $table->text('refunded')->default('');
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancel_events');
    }
};
