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

    public function store(Request $request)
    {
        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'property_id' => 'required|exists:listings,id',
        ]);

        $wishlistItem = Wishlist::create($request->all());

        return response()->json(['wishlist_item' => $wishlistItem], 201);
    }

    public function update(Request $request, Wishlist $wishlistItem)
    {
        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'property_id' => 'required|exists:listings,id',
        ]);

        $wishlistItem->update($request->all());

        return response()->json(['wishlist_item' => $wishlistItem]);
    }

    public function destroy(Wishlist $wishlistItem)
    {
        $wishlistItem->delete();

        return response()->json(['message' => 'Wishlist item deleted successfully']);
    }
}
