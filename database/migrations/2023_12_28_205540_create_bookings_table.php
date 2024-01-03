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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('accounts')->cascadeOnDelete();
            $table->foreignId('listing_id')->constrained('listings')->cascadeOnDelete();
            $table->dateTime('check_in_date');
            $table->dateTime('check_out_date');
            $table->decimal('total_charges', 8, 2);
            $table->enum('booking_status', ['pending', 'canceled', 'confirmed']);
            $table->integer('guest_count');
            $table->longText('special_requests');
            $table->enum('payment_method', ['Cash', 'Mpesa', 'Credit Card', 'Paypal']);
            $table->enum('payment_status', ['Paid', 'Pending', 'Failed']);
            $table->uuid('booking_code')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
