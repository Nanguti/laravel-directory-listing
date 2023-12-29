<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\RatingReview;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Http\Request;

class RatingReviewController extends Controller
{
    public function index()
    {
        $reviews = RatingReview::all();

        return response()->json(['reviews' => $reviews]);
    }

    public function show(RatingReview $review)
    {
        return response()->json(['review' => $review]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:accounts,id',
            'property_id' => 'required|exists:listings,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
            'anonymous' => 'boolean',
            'verified_booking' => 'boolean',
            'recommended' => 'boolean',
            'response_comment' => 'nullable',
            'helpful_count' => 'integer',
            'reported' => 'boolean',
            'reported_count' => 'integer',
            'flagged' => 'boolean',
            'flagged_reason' => 'nullable',
            'images' => 'nullable|json',
        ]);

        $review = RatingReview::create($request->all());

        return response()->json(['review' => $review], 201);
    }

    public function update(Request $request, RatingReview $review)
    {
        $request->validate([
            'client_id' => 'required|exists:accounts,id',
            'property_id' => 'required|exists:listings,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
            'anonymous' => 'boolean',
            'verified_booking' => 'boolean',
            'recommended' => 'boolean',
            'response_comment' => 'nullable',
            'helpful_count' => 'integer',
            'reported' => 'boolean',
            'reported_count' => 'integer',
            'flagged' => 'boolean',
            'flagged_reason' => 'nullable',
            'images' => 'nullable|json',
        ]);

        $review->update($request->all());

        return response()->json(['review' => $review]);
    }

    public function destroy(RatingReview $review)
    {
        $review->delete();

        return response()->json(['message' => 'Review deleted successfully']);
    }
}
