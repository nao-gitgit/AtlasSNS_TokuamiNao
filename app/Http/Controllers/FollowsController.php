<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FollowsController extends Controller
{
    //フォロー・フォロワー一覧ページ
    public function followList(){
        return view('follows.followList');
    }
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
