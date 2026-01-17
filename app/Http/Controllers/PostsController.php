<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostsController extends Controller
{
    // タイムライン表示
    public function index()
    {
        return view('posts.index');
    }

    // 新規投稿の保存処理
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'post' => ['required', 'string', 'min:1', 'max:150'],
        ]);

        // 投稿を保存
        Post::create([
            'user_id' => Auth::id(),
            'post' => $request->post,
        ]);

        // 投稿後はトップページへ戻す
        return redirect('/posts/index');
    }
}
