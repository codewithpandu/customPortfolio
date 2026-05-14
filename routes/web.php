<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('/project', function () {
    $projects = Project::all();
    return view('project', ['projects' => $projects,'title' => 'Project']);
});

Route::get('/project/{project:slug}', function (Project $project) {
    return view('detail-project', ['project' => $project, 'title','title' => 'Project']);
});

Route::get('/blog', function () {
    $posts = Post::latest()->filter(request(['search']))->Paginate(6)->withQueryString();

    return view('blog', ['posts' => $posts, 'title' => 'Blog']);
})->name('blog');

Route::get('/blog/{post:slug}', function (Post $post) {
    return view('post', ['post' => $post, 'title' => $post->title]);
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
    
    //Project
    Route::get('/projects', action: [ProjectController::class, 'index'])->name('projects');
    Route::post('/projects', action: [ProjectController::class, 'store']);
    Route::get('/projects/{project:slug}/edit', action: [ProjectController::class, 'edit']);
    Route::patch('/projects/{project:slug}', action: [ProjectController::class, 'update']);
    Route::delete('/projects/{project:slug}', action: [ProjectController::class, 'destroy']);
});

    


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
