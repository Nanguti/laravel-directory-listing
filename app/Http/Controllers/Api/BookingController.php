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
        $data = $request->validated();
        $booking = Booking::create($data);

        return response()->json(['booking' => $booking], 201);
    }

    public function update(Request $request, Booking $booking)
    {
        $data = $request->validated();

        $booking->update($data);

        return response()->json(['booking' => $booking]);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return response()->json(['message' => 'Booking deleted successfully']);
    }
}
