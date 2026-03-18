<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FollowController extends Controller
{
    // フォローする
    public function follow($id)
    {
        $user = Auth::user();

        // 自分自身はフォローできない
        if ($user->id != $id) {
            $user->followings()->syncWithoutDetaching([$id]);
        }

        return back();
    }

    // フォロー解除
    public function unfollow($id)
    {
        $user = Auth::user();

        $user->followings()->detach($id);

        return back();
    }

    // フォローリスト
    public function followList()
    {
    $user = Auth::user();

    // 自分がフォローしているユーザー
    $followings = $user->followings;

    // フォローしている人の投稿を取得
    $posts = \App\Models\Post::whereIn(
        'user_id',
        $followings->pluck('id')
    )->latest()->get();

    return view('follows.followList', compact('followings', 'posts'));
    }


    // フォロワーリスト
    public function followerList()
    {
    $user = Auth::user();

    // 自分をフォローしているユーザー
    $followers = $user->followers;

    // フォロワーの投稿を取得
    $posts = \App\Models\Post::whereIn(
        'user_id',
        $followers->pluck('id')
    )->latest()->get();

    return view('follows.followerList', compact('followers', 'posts'));
    }
}
