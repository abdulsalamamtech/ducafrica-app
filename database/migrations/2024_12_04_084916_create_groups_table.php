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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('added_by')->constrained('users')->nullOnDelete();
            // Add group_head_id to online database table
            $table->foreignId('group_head_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('name');
            $table->text('description');
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
        Schema::dropIfExists('groups');
    }
};
