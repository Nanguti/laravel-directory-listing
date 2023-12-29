<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Http\Requests\UpdateRatingReviewRequest;
use App\Models\RatingReview;
use App\Http\Requests\StoreRatingReviewRequest;

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

    public function store(StoreRatingReviewRequest $request)
    {
        $data = $request->validated();

        $review = RatingReview::create($data);

        return response()->json(['review' => $review], 201);
    }

    public function update(UpdateRatingReviewRequest $request, RatingReview $review)
    {
        $data = $request->validated();

        $review->update($data);

        return response()->json(['review' => $review]);
    }

    public function destroy(RatingReview $review)
    {
        $review->delete();

        return response()->json(['message' => 'Review deleted successfully']);
    }
}
