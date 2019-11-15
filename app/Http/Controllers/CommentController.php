<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Http\Requests\CreateComment;
use App\Http\Requests\EditComment;
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

    public function edit(int $id)
    {
        $comment = Comment::find($id);

        return view('comments.edit', [
            'comment' => $comment,
        ]);
    }

    public function update(int $id, EditComment $request)
    {
        $comment = Comment::find($id);

        $post_id = $comment->post_id;

        $comment->comments = $request->comments;
        $comment->save();

        return redirect()->route('posts.show', [
            'id' => $post_id,
        ]);
    }

    public function delete(int $id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        $post_id = $comment->post_id;

        return redirect()->route('posts.show', [
            'id' => $post_id,
        ]);
    }
}
