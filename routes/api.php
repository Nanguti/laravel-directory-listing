<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Api\ListingController;
use App\Http\Controllers\Api\RatingReviewController;
use App\Http\Controllers\Api\WishlistController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:account')->group(function () {
//     Route::get('/all/listings', [ListingController::class, 'index']);   
// });

Route::apiResource('listings', ListingController::class);
Route::apiResource('rating-reviews', RatingReviewController::class);
Route::apiResource('bookings', BookingController::class);
Route::apiResource('account-wishlist', WishlistController::class);



// post routes
Route::get('/posts/list', [PostController::class, 'posts']);
Route::post('/post/detail', [PostController::class, 'postDetail']);

// comments
Route::post('/add/comment', [CommentController::class, 'store']);
Route::post('/update/comment', [CommentController::class, 'update']);
Route::delete('/delete/comment/{id}', [CommentController::class, 'destroy']);

// categories
Route::get('/category/list', [CategoryController::class, 'categories']);
Route::post('/category/detail', [CategoryController::class, 'categoryDetail']);

Route::post('/contactus', [ContactController::class, 'submitForm']);
Route::post('/category/posts', [PostController::class,'postsByCategory']);

Route::post('/account/login', [AuthController::class, 'login']);
Route::post('/account/signup', [AuthController::class, 'signup']);
