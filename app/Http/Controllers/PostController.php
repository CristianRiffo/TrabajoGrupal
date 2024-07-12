<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->input('posted') == "on"){
            $request->merge([
                'posted' => 1
            ]); 
        }else{
            $request->merge([
                'posted' => 0
            ]); 
        }
        $request->merge([
            'slug' => Str::slug($request->title)
        ]);
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $Post = Post::where('slug', $slug)->first();
        $categories = Category::get();
        return view('posts.edit', compact('Post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        if($request->input('posted') == "on"){
            $request->merge([
                'posted' => 1
            ]); 
        }else{
            $request->merge([
                'posted' => 0
            ]); 
        }
        $request->merge([
            'slug' => Str::slug($request->title)
        ]);
        $Post = Post::where('slug', $slug)->first();
        $Post->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, $slug)
    {
        $Post = Post::where('slug', $slug)->first();
        $Post->delete();
        return redirect()->route('posts.index');
    }
}
