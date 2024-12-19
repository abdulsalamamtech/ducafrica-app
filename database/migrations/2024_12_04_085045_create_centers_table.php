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
        Schema::create('centers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('added_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('center_type_id')->constrained('center_types')->cascadeOnDelete();
            $table->foreignId('belongs_to_user')->nullable()->constrained('users')->cascadeOnDelete()->comment('belongs to local council');
            $table->string('name');
            $table->string('payment_id')->comment('payment account id');
            $table->string('address');
            $table->string('state');
            $table->text('map_url');
            $table->string('phone_number');
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
        Schema::dropIfExists('centers');
    }
};
