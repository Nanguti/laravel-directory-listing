<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rating_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('accounts')->cascadeOnDelete();
            $table->foreignId('property_id')->constrained('listings')->cascadeOnDelete();
            $table->unsignedInteger('rating');
            $table->text('comment');
            $table->boolean('anonymous')->default(false);
            $table->boolean('verified_booking')->default(false); //flag indicating it's a review from user who booked the accomodation.
            $table->boolean('recommended')->default(false); //A flag indicating whether the user would recommend the accommodation to others
            $table->text('response_comment')->nullable(); //If the accommodation provider responds to the review, this field could store the response.
            $table->unsignedInteger('helpful_count')->default(0); //The number of users who found the review helpful.
            $table->boolean('reported')->default(false);
            $table->unsignedInteger('reported_count')->default(0);
            $table->boolean('flagged')->default(false); //A flag indicating whether the review has been flagged for moderation.
            $table->string('flagged_reason')->nullable(); //If flagged, a field to store the reason for flagging the review.
            $table->json('images')->nullable(); //An array or relationship to store images uploaded with the review.
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
