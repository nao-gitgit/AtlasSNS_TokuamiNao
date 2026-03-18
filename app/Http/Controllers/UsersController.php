<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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

    $posts = \App\Models\Post::where('user_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();

    // フォローしているか判定
    $isFollowing = false;

    if (Auth::check()) {
        $isFollowing = Auth::user()
                ->follows()
                ->where('followed_id', $id)
                ->exists();
    }

    return view('profiles.profile', compact('user' , 'posts', 'isFollowing'));
}

    // ユーザーのプロフィール編集
    public function edit()
{
    $user = Auth::user();

    return view('users.profile', compact('user'));
}

    // バリデーション設定
    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([

    'username' => 'required|string|min:2|max:12',

    'email' => [
    'required',
    'string',
    'email',
    'min:5',
    'max:40',

    Rule::unique('users','email')->ignore($user->id)

    ],

    'password' => 'required|alpha_num|min:8|max:20|confirmed',

    'bio' => 'nullable|max:150',

    'icon_image' => 'nullable|image|mimes:jpg,png,bmp,gif,svg'

    ]);

    $user->username = $request->username;
    $user->email = $request->email;
    $user->bio = $request->bio;

    if($request->filled('password')){
    $user->password = bcrypt($request->password);
    }

    if($request->hasFile('icon_image')){
    $path = $request->file('icon_image')->store('icons','public');
    $user->icon_image = $path;
    }

    $user->save();

    return redirect()->route('home');
}

}
