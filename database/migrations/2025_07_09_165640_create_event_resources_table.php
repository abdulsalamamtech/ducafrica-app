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
        Schema::create('event_resources', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('description')->nullable(); // Optional description of the resource
            $table->string('resource_format')->default('file'); // e.g., 'image', 'video', 'document'
            // category
            $table->string('category')->nullable()->default('general'); // Category of the resource, e.g., 'general', 'retreat', 'seminar'
            $table->string('url'); // URL to the resource
            $table->boolean('status')->default(1);
            $table->foreignId('event_id')
                ->nullable()
                ->constrained('events')
                ->onDelete('cascade');
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete(); // User who created the resource
            $table->timestamps();
            $table->softDeletes(); // Soft delete for the resource
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_resources');
    }
};
