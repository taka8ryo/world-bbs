<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;

class HomeController extends Controller
{
    public function index()
    {
        User::whereYear('created_at', 2019)
        ->orderBy('created_at')
        ->get()
        ->groupBy(function ($row) {
            return $row->created_at->format('m');
        })
        ->map(function ($day) {
            return $day->sum('count');
        });

        $userCount = DB::table('users')->count();

        $postCount = DB::table('posts')->count();

        return view('home', [
            'userCount' => $userCount,
            'postCount' => $postCount,
        ]);
    }
}
