<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\PutRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::paginate(4); // personaliza la paginacion como quieras 
        return view('dashboard.post.index', compact('posts'));
        /*
        * CREAR UN POST
        return Post::create( 
            ['title' => "test",
            'slug' => "test",
            'content' => "test",
            'category_id' => 1,
            'description' => "test",
            'posted' => "not",
            'image' => "test"]
        );
        */

        /*
        * OBTENER UN POST MEDIANTE SU ID
        return POST::find(1);
        */

        /*
        * ACTUALIZAR POST MEDIANTE ID
        */
        /*
        $post = POST::find(4); 
        return $post->update(
            [
            'title' => "test 4",
            'slug' => "test", 
            'content' => "test", 
            'category_id' => 1, 
            'description' => "test", 
            'posted' => "not", 
            'image' => "test"
            ]
        ); 
        */

        /*
        * ELIMINAR POST MEDIANTE ID
         * $post = POST::find(1); 
         * return $post->delete();
         */

        /* OBTENER LA CATEGORIA DEL POST*/
        /*dd(Post::find(1)->category);*/

        /* OBTENER LOS POSTS QUE TIENEN ESTA CATEGORIA */
        /*dd(Category::find(1)->posts);*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //$categories = Category::pluck('id', 'title');
        // dd($categories);
        $categories = Category::get();
        $post = new Post();
        return view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        Post::create($request->all()); 
        return to_route("post.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        return view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
        if( isset($data["image"])){
            $data["image"] = $filename = time().".".$data["image"]->extension();
            $request->image->move(public_path("image/otro"), $filename);
        }
        $post->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
