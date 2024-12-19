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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Guest');
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_name')->nullable()->default('');
            $table->string('email')->unique();
            $table->string('dob');
            $table->string('phone');
            $table->string('phone_type')->default('call');
            $table->string('address')->nullable()->default('');
            $table->string('city')->nullable()->default('');
            $table->string('state');
            $table->string('country');
            $table->string('postal_code')->nullable()->default('');
            $table->string('nok')->nullable()->default('');
            $table->string('nok_relationship')->nullable()->default('');
            $table->string('nok_phone')->nullable()->default('');
            $table->string('food_allergies')->nullable()->default('');
            $table->string('diets')->nullable()->default('');
            $table->string('other_disability')->nullable()->default('');
            $table->string('center_id')->nullable()->default('');
            $table->string('picture')->nullable()->default('default.jpg');
            $table->string('password_clue')->nullable()->default('');
            // $table->enum('role',['user','admin'])->nullable()->default('user');
            $table->string('role')->default('user');
            $table->enum('verification_status',[false, true])->nullable()->default(false);
            $table->enum('status',['pending','active','suspended','blocked'])->nullable()->default('active');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
