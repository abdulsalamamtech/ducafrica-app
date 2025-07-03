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
        Schema::table('booked_events', function (Blueprint $table) {
            $table->string('attend')->default('no');
            $table->string('message')->default('');
            // $table->foreignId('marked_by')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booked_events', function (Blueprint $table) {
            $table->dropColumn('attend');
            $table->dropColumn('message');
            // $table->dropForeign(['marked_by']);
        });
    }
};

// Schema::dropIfExists('table_name');