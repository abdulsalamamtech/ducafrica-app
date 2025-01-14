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
        Schema::create('center_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('center_id')->constrained('centers')->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('original_name')->nullable();
            $table->string('type')->nullable();
            $table->string('path')->nullable();
            $table->string('file_id')->nullable();
            $table->string('url')->nullable();
            $table->integer('size')->nullable();
            $table->string('hosted_at')->nullable()->default('directory');
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('center_assets');
    }
};
