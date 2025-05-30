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
        Schema::create('user_installments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('booked_event_id')->nullable()->constrained('booked_events')->cascadeOnDelete();
            $table->foreignId('approved_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->boolean('approved')->default(false);
            $table->decimal('amount', 10, 2)->default(false);
            $table->decimal('paid', 10, 2)->default(false);
            $table->decimal('balance', 10, 2)->default(false);
            $table->boolean('settle')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_installments');
    }
};
