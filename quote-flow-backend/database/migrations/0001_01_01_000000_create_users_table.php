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

    // Basic Info
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');

    // Role System
    $table->string('role')->default('user'); // user / vendor / admin

    // Extra Signup Fields
    $table->string('phone')->nullable();
    $table->string('website')->nullable();

    // Partner/Business Information (combined from partner_profiles)
    $table->string('business_name')->nullable();
    $table->string('street')->nullable();
    $table->string('city')->nullable();
    $table->string('state')->nullable();
    $table->string('zip')->nullable();

    // Role-specific fields
    $table->string('license_number')->nullable();
    $table->integer('max_capacity')->nullable();
    $table->integer('years_experience')->nullable();
    $table->string('referral_source')->nullable();

    // Laravel Default Fields
    $table->timestamp('email_verified_at')->nullable();
    $table->rememberToken();
    $table->timestamps();
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
