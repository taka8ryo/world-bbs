<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $query = Post::where('content', 'like', '%'.$keyword.'%')->orWhere('title', 'like', '%'.$keyword.'%');

        $data = $query->orderBy('created_at', 'desc')->paginate(2);
        return view('search.index', [
            'data' => $data,
            'keyword' => $keyword,
        ]);
    }
}
