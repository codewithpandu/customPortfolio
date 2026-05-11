<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::latest()->paginate(7);
        return view('posts.index', ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
      
        return view('posts.create', ['post' => $post] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        
        $validate = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'image',
            'body' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('img', 'public');
            $validate['image'] = $path;
        } else {
            $validate['image'] = null;
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'user_id' => Auth::user()->id,
            'image' => $validate['image'],
            'category_id' => $request->category_id,
            'body' => $request->body
        ]);

        return redirect('/post')->with('success', 'Postingan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validate = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'image' => Rule::unique(Post::class)->ignore($post->id),
            'body' => 'required',
        ]);

        if ($request->image) {
            if (!empty($request->post->image)) {
                Storage::disk('public')->delete($request->post->image);
            } else {
                $validate['image'] = null;
            }

            $validate['image'] = $request->file('image')->store('img', 'public');
        }

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'user_id' => Auth::user()->id,
            'image' => $validate['image'] ?? $post->image,
            'category_id' => $request->category_id,
            'body' => $request->body
        ]);

        return redirect('/post')->with('success', 'Postingan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/post')->with('success', 'Postingan berhasil dihapus');
    }
}
