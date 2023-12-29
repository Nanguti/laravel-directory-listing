<?php

namespace App\Http\Controllers\Api\CMS;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::where('status', 'published')->get();
        return response()->json([
            'categories' => $categories
     
        ]);
    }

    public function categoryDetail(Request $request){
        $category = Category::getCategoryBySlug($request->slug);
        return response()
            ->json(['category'=>$category]);
    }
}
