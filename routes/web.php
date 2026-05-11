<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/project', function () {
    return view('project');
});
Route::get('/blog', function () {
    $posts = Post::latest()->filter(request(['search']))->Paginate(6)->withQueryString();

    return view('blog', ['posts' => $posts]);
})->name('blog');

Route::get('/blog/{post:slug}', function (Post $post) {
    return view('post', ['post' => $post]);
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', action: function () {
        return view('dashboard');
    })->name('dashboard');

    // Post
    Route::get('/post', action: [PostController::class, 'index'])->name('posts');
    Route::post('/post', action: [PostController::class, 'store']);
    Route::get('/post/create', action: [PostController::class, 'create']);
    Route::get('/post/{post:slug}/edit', action: [PostController::class, 'edit']);
    Route::get('/post/{post:slug}', action: [PostController::class, 'show']);
    Route::patch('/post/{post:slug}', action: [PostController::class, 'update']);
    Route::delete('/post/{post:slug}', action: [PostController::class, 'destroy']);

    // Category
    Route::get('/categories', action: [CategoryController::class, 'index'])->name('categories');
    Route::post('/categories', action: [CategoryController::class, 'store']);
    Route::get('/categories/create', action: [CategoryController::class, 'create']);
    Route::get('/categories/{category:slug}/edit', action: [CategoryController::class, 'edit']);
    Route::get('/categories/{category:slug}', action: [CategoryController::class, 'show']);
    Route::patch('/categories/{category:slug}', action: [CategoryController::class, 'update']);
    Route::delete('/categories/{category:slug}', action: [CategoryController::class, 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
