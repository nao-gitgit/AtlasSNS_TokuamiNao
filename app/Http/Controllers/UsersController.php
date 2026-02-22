<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    // ユーザー検索画面の表示（初期表示）
    public function index(Request $request)
    {
        return $this->search($request);
    }

    // ユーザー検索処理
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = User::where('id', '!=', Auth::id());

        if (!empty($keyword)) {
            $query->where('username', 'like', '%' . $keyword . '%');
        }

        $users = $query->get();

        return view('users.search', compact('users', 'keyword'));
    }

    // ユーザーのプロフィールページ
    public function show($id)
{
    $user = User::findOrFail($id);

    return view('users.profile', compact('user'));
}

    public function profile($id)
{
    $user = \App\Models\User::findOrFail($id);

    $posts = \App\Models\Post::where('user_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();

    return view('users.profile', compact('user', 'posts'));
}
}
