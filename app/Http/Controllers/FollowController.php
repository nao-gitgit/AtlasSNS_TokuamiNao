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
            $user->followings()->attach($id);
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
}
