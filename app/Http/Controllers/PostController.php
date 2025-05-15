<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{


    public function index(?User $user = null)
    {
        $posts = Post::when($user, function ($query) use ($user) {
            return $query->where('user_id', $user->id);
        })
            ->whereNotNull('published_at')
            ->orderByDesc('promoted')
            ->orderByDesc('published_at')
            ->paginate(9);


        $authors = User::whereHas(
            'posts',
            fn($query) =>
            $query->whereNotNull('published_at')
        )->get();

        return view('posts.index', compact('posts', 'authors'));
    }



    public function promoted()
    {
        $promotedPosts = Post::where('promoted', true)
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->get();

        return view('posts.promoted', compact('promotedPosts'));
    }

    public function show(Post $post)
    {
        if (is_null($post->published_at)) {
            abort(404);
        }

        $comments = $post->comments()->orderBy('created_at', 'desc')->get();

        return view('posts.show', compact('post', 'comments'));




    }
}
