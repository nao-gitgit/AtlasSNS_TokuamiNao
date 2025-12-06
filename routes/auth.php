<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;

//未ログイン時のみアクセス可能
Route::middleware('guest')->group(function () {

    //ログインページ表示
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    //ログイン処理
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    //新規登録ページ表示
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    //新規登録処理
    Route::post('register', [RegisteredUserController::class, 'store']);

    //登録完了ページ
    Route::get('added', [RegisteredUserController::class, 'added'])->name('added');
    Route::post('added', [RegisteredUserController::class, 'added'])->name('added');

});

//ログイン時のみアクセス可能
Route::middleware('auth')->group(function () {

    //ログアウト処理
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    //トップページ
    Route::get('/posts/index', [PostsController::class, 'index']);

    //プロフィール編集ページ
    Route::get('/users/profile', [ProfileController::class, 'profile']);
    Route::post('/users/profile/update', [ProfileController::class, 'update']);

    //ユーザー検索ページ
    Route::get('/users/search', [UsersController::class, 'search']);
    Route::post('/users/search', [UsersController::class, 'searchResult']);
    Route::get('/users/search_result', [UsersController::class, 'searchResult']);

    //フォローリストページ
    Route::get('/follows/followlist', [FollowsController::class, 'followList']);

    //フォロワーリストページ
    Route::get('/follows/followerlist', [FollowsController::class, 'followerList']);

    //相手ユーザーのプロフィールページ
    Route::get('/users/profile/{id}', [UsersController::class, 'profile']);
});
