<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\PropertyImage;
use Cloudinary\Cloudinary;

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

        $listing = Listing::create(...$data);

        if ($listing) {
            $images = collect($data['images'])->map(function ($imageUrl) use ($listing) {
                $image = Cloudinary::upload($imageUrl)->getSecurePath();
                // Create a new record in the property_images table
                PropertyImage::create([
                    'property_id' => $listing->id,
                    'image_url' => $image,
                ]);
            
                return $image;
            })->toArray();
            
            return response()->json(['property' => $listing, 'images' => $images]);
        } else {
            return response()->json(['error' => 'Failed to create listing'], 500);
        }     
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
