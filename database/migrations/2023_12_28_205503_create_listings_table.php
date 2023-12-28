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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('owner_id')->constrained('accounts')->cascadeOnDelete();
            $table->text('description');
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->string('country')->default('Kenya');
            $table->decimal('price_per_night', 10, 2);
            $table->integer('number_of_rooms')->default(1);
            $table->integer('number_of_bathrooms')->default(1);
            $table->integer('max_occupancy');
            $table->string('property_type');
            $table->json('amenities');
            $table->string('main_image');
            $table->json('images')->nullable();
            $table->decimal('rating', 3, 2)->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
