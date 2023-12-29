<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::all();

        return response()->json(['listings' => $listings]);
    }

    public function show(Listing $listing)
    {
        return response()->json(['listing' => $listing]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'owner_id' => 'required|exists:accounts,id',
            'description' => 'required',
            'address' => 'required',
            'city' => 'nullable',
            'county' => 'nullable',
            'country' => 'nullable',
            'price_per_night' => 'required|numeric',
            'number_of_rooms' => 'required|integer',
            'number_of_bathrooms' => 'required|integer',
            'max_occupancy' => 'required|integer',
            'property_type' => 'required',
            'amenities' => 'required|json',
            'main_image' => 'required',
            'images' => 'nullable|json',
            'rating' => 'required|numeric',
        ]);

        $listing = Listing::create($request->all());

        return response()->json(['listing' => $listing], 201);
    }

    public function update(Request $request, Listing $listing)
    {
        $request->validate([
            'name' => 'required',
            'owner_id' => 'required|exists:accounts,id',
            'description' => 'required',
            'address' => 'required',
            'city' => 'nullable',
            'county' => 'nullable',
            'country' => 'nullable',
            'price_per_night' => 'required|numeric',
            'number_of_rooms' => 'required|integer',
            'number_of_bathrooms' => 'required|integer',
            'max_occupancy' => 'required|integer',
            'property_type' => 'required',
            'amenities' => 'required|json',
            'main_image' => 'required',
            'images' => 'nullable|json',
            'rating' => 'required|numeric',
        ]);

        $listing->update($request->all());

        return response()->json(['listing' => $listing]);
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        return response()->json(['message' => 'Listing deleted successfully']);
    }
}
