<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Http\Requests\CreatePost;
use App\Http\Requests\EditPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts/index', [
            'posts' => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function showCreateForm()
    {
        return view('posts/create');
    }

    public function create(CreatePost $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        Auth::user()->posts()->save($post);

        return redirect()->route('posts.index', [
            'id' => $post->id,
        ]);
    }

    public function showEditForm(int $id)
    {
        $post = post::find($id);

        return view('posts/edit', [
            'post' => $post,
        ]);
    }

    public function edit(int $id, EditPost $request)
    {
        $post = Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.index');
    }

    public function delete(int $id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->to('posts');
    }
}
