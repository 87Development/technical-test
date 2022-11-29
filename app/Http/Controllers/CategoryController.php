<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $posts = Post::where('status', 1)->where('publish_date', '<=', NOW())->where('category_id', $category->id)->paginate(8);
        
        /**
         * @todo only pull categories with actual posts
         */
        $categories = Category::where('status', 1)->get();
        
        return Inertia::render('Posts/Index', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
}
