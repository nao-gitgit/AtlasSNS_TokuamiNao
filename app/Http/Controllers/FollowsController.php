<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class FollowsController extends Controller
{
    // フォロー
    public function followList()
{
    $followings = Auth::user()->follows;

    // フォローしているユーザーのIDを取得
    $followingIds = $followings->pluck('id');

    // そのユーザー達の投稿を取得（新しい順）
    $posts = Post::whereIn('user_id', $followingIds)
                ->with('user')
                ->orderBy('created_at', 'desc')
                ->get();

    return view('follows.followList', compact('followings', 'posts'));
}

    // フォロワー
    public function followerList(){
        return view('follows.followerList');
    }

    // フォローする
    public function follow($id){
    $user = Auth::user();

    // 自分自身はフォローできない
    if ($user->id != $id) {
        $user->follows()->attach($id);
    }

    return redirect('/users/search');
    }

    // フォロー解除
    public function unfollow($id){
    $user = Auth::user();

    $user->follows()->detach($id);

    return redirect('/users/search');
    }
}
