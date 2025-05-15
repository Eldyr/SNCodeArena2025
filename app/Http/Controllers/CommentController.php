<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request, Post $post): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post->comments()->create([
            'name' => $request->input('name'),
            'body' => $request->input('body'),
        ]);

        return redirect()->route('post', $post);
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $post = $comment->post;
        $comment->delete();

        return redirect()->route('post', $post);
    }
}
