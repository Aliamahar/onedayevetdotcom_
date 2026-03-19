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
        Schema::create('quotes', function (Blueprint $table) {
    $table->id();

    // Event Basic Info
    $table->string('event_type');
    $table->date('event_date');
    $table->string('event_state');
    $table->boolean('is_private_residence');

    // Event Details
    $table->boolean('alcohol_served');
    $table->integer('guest_count');

    // Activities & Requirements (store as JSON)
    $table->json('activities')->nullable();
    $table->json('venue_requirements')->nullable();

    // Description
    $table->text('event_description');

    // Insured Info
    $table->string('insured_name');
    $table->string('insured_address');
    $table->string('insured_city');
    $table->string('insured_state');
    $table->string('insured_zip');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
