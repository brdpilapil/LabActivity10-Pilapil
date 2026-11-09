<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        
        $lastName = 'Pilapil'; 
        $perPage = max(strlen($lastName), 6);

        $posts = Post::query()
            ->where('is_published', true)
            ->when($request->filled('q'), function ($q) use ($request) {
                $q->where('title', 'LIKE', '%' . $request->input('q') . '%');
            })
            ->when($request->filled('category'), function ($q) use ($request) {
                $q->where('category', $request->input('category'));
            })
            ->orderByDesc('is_pinned')
            ->latest('published_at')
            ->paginate($perPage)
            ->withQueryString();

        $categories = Post::query()->distinct()->orderBy('category')->pluck('category');

        return view('posts.index', compact('posts', 'categories'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        if (!$post->is_published) {
            abort(404);
        }

        $post->increment('views');

        return view('posts.show', compact('post'));
    }
}