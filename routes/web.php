<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $countUsers = User::count();
    $posts = Post::get();
    return view('dashboard', ['countUsers' => $countUsers,'posts'=>$posts]);
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/posts', PostController::class);

Route::resource('/categories', CategoryController::class)->parameters([
    'categories' => 'Category:slug'
]);

require __DIR__.'/auth.php';
