<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditName;
use Auth;

class UserController extends Controller
{
    public function showChangeNameForm()
    {
        $user = Auth::user();
        return view('auth.change_name', [
            'user' => $user,
        ]);
    }

    public function changeName(EditName $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        return redirect('/')->with('名前の変更が成功しました');
    }
}
