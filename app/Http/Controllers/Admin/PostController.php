<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->get();
        $categories = Category::where('status', '-', 1)->get();
        return Inertia::render('Admin/Posts/Index', [
            'showCreateForm' => false,
            'posts' => $posts, 
            'categories' => $categories,
            'headers' => ['Title', 'Category', 'Status', 'Publish Date']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::where('status', 1)->get();

        return Inertia::render('Admin/Posts/Create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {

        Post::create($request->validated());
        return redirect()->route('posts.index')->with('message', 'post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $categories = Category::where('status', 1)->get();
        return Inertia::render('Admin/Posts/Edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        if($request->validated()) {
            $post->title = $request->title;
            $post->content = $request->content;
            $post->status = $request->status;
            $post->category_id = $request->category;
            $post->publish_date = $request->publish_date;

            $post->save();

            return redirect()->route('posts.index')->with('message', 'Post Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        sleep(1);

        return redirect()->route('posts.index')->with('message', 'Post deleted successfully');
    }
}
