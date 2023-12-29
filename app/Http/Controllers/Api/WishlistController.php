<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Wishlist;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = Wishlist::all();

        return response()->json(['wishlist_items' => $wishlistItems]);
    }

    public function show(Wishlist $wishlistItem)
    {
        return response()->json(['wishlist_item' => $wishlistItem]);
    }

    public function store(StoreWishlistRequest $request)
    {
        $data = $request->validated();

        $wishlistItem = Wishlist::create($data);

        return response()->json(['wishlist_item' => $wishlistItem], 201);
    }

    public function update(UpdateWishlistRequest $request, Wishlist $wishlistItem)
    {
        $data = $request->validated();

        $wishlistItem->update($data);

        return response()->json(['wishlist_item' => $wishlistItem]);
    }

    public function destroy(Wishlist $wishlistItem)
    {
        $wishlistItem->delete();

        return response()->json(['message' => 'Wishlist item deleted successfully']);
    }
}
