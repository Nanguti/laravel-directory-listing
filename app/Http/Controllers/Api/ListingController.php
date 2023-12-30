<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;


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

    public function store(StoreListingRequest $request)
    {
        $data = $request->validated();

        $listing = Listing::create($data);

        return response()->json(['listing' => $listing], 201);
    }

    public function update(UpdateListingRequest $request, Listing $listing)
    {
        $data = $request->validated();
    
        $listing->update($data);

        return response()->json(['listing' => $listing]);
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        return response()->json(['message' => 'Listing deleted successfully']);
    }
}
