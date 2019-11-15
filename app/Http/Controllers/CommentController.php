<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Http\Requests\CreateComment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(CreateComment $request)
    {
        $comment = new Comment();


        $post = $request->post_id;
        $comment->post_id = $request->post_id;
        $comment->comments = $request->comments;
        Auth::user()->comments()->save($comment);

        return redirect()->route('posts.show', [
            'id' => $post
        ]);
    }
}
