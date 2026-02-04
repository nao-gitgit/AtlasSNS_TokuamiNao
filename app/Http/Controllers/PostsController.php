<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostsController extends Controller
{
    // 投稿一覧をタイムライン表示
    public function index()
{
    $user = Auth::user();

    // フォローしているユーザーID一覧
    $followIds = $user->follows()->pluck('followed_id');

    // 自分 + フォローしている人の投稿を取得
    $posts = Post::with('user')
        ->whereIn('user_id', $followIds)
        ->orWhere('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('posts.index', compact('posts'));
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

    // 投稿編集の更新処理
    public function update(Request $request)
    {
        // バリデーション
        $request->validate([
            'post' => ['required', 'string', 'min:1', 'max:150'],
        ]);

        // 編集対象の投稿を取得
        $post = Post::findOrFail($request->id);

        // 自分の投稿かチェック
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        // 投稿内容を更新
        $post->post = $request->post;
        $post->save();

        // 更新後はトップページへ
        return redirect('/posts/index');
    }

    // 投稿編集の削除処理
    public function destroy(Request $request)
{
    $post = Post::find($request->id);

    // 自分の投稿かチェック
    if ($post->user_id !== Auth::id()) {
        abort(403);
    }

    $post->delete();

    return redirect('/posts/index');
}
}
