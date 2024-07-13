<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

Route::get('/', function () {
    $PostsSlide = Post::where('image','!=',null)->get()->take(5);
    $Posts = Post::get();
    $Categories = Category::get();
    return view('welcome',compact('Posts', 'Categories', 'PostsSlide'));
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function () {
        $countUsers = User::count();
        $countPosts = Post::count();
        $countCategories = Category::count();
        $Posts = Post::get();
        return view('dashboard', ['countUsers' => $countUsers,'countPosts' => $countPosts, 'countCategories' => $countCategories, 'Posts'=>$Posts]);
    })->name('dashboard');

    Route::resource('/categories', CategoryController::class)->parameters([
        'categories' => 'Category:slug'
    ]);
}); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/posts', PostController::class)->parameters([
    'posts' => 'Post:slug'
]);

require __DIR__.'/auth.php';
