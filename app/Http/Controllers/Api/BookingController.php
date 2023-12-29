<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();

        return response()->json(['bookings' => $bookings]);
    }

    public function show(Booking $booking)
    {
        return response()->json(['booking' => $booking]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:accounts,id',
            'property_id' => 'required|exists:listings,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_charges' => 'required|numeric',
            'booking_status' => 'required|in:pending,canceled,confirmed',
            'guest_count' => 'required|integer',
            'special_requests' => 'nullable',
            'payment_method' => 'required|in:Cash,Mpesa,Credit Card,Paypal',
            'payment_status' => 'required|in:Paid,Pending,Failed',
        ]);

        $booking = Booking::create($request->all());

        return response()->json(['booking' => $booking], 201);
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'client_id' => 'required|exists:accounts,id',
            'property_id' => 'required|exists:listings,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_charges' => 'required|numeric',
            'booking_status' => 'required|in:pending,canceled,confirmed',
            'guest_count' => 'required|integer',
            'special_requests' => 'nullable',
            'payment_method' => 'required|in:Cash,Mpesa,Credit Card,Paypal',
            'payment_status' => 'required|in:Paid,Pending,Failed',
        ]);

        $booking->update($request->all());

        return response()->json(['booking' => $booking]);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return response()->json(['message' => 'Booking deleted successfully']);
    }
}
