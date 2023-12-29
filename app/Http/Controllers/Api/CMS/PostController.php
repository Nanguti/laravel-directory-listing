<?php

namespace App\Http\Controllers\Api\CMS;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    

    public function posts()
    {
        $categories= Category::where('status', 'published')->get();
        $posts = Post::where('status', 'published')
            ->with('comments')
            ->orderBy('id', 'desc')
            ->paginate(10);
            
        return response()
            ->json([
                'categories' => $categories,
                'posts' => $posts
            ]);
    }

    public function postsByCategory(Request $request){
        $posts = Post::where(['status'=> 'published', 'category_id'=>$request->category_id])
            ->with('comments')
            ->orderBy('id', 'desc')
            ->paginate(10);
            
        return response()
            ->json([
                'posts' => $posts
            ]);
    }

    public function postDetail(Request $request)
    {
        $postDetail = Post::getPostBySlug($request->slug);
        return response()
            ->json(['postDetail' => $postDetail]);

    }
}
