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
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        if (is_null($post->published_at)) {
            abort(404);
        }

        $comments = $post->comments()->orderBy('created_at', 'desc')->get();

        return view('posts.show', compact('post', 'comments'));



        // return view('posts.show', compact('post'));
    }
}
