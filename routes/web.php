<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FollowsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
| 投稿関連
|--------------------------------------------------------------------------
*/

// 投稿一覧（ホーム）
Route::get('posts/index', [PostsController::class, 'index'])
    ->name('home')
    ->middleware('auth');

// 投稿保存
Route::post('posts/store', [PostsController::class, 'store'])
    ->name('post.store')
    ->middleware('auth');

// 投稿更新
Route::post('posts/update', [PostsController::class, 'update'])
    ->name('post.update')
    ->middleware('auth');

// 投稿削除
Route::post('post/delete', [PostsController::class, 'destroy'])
    ->name('post.delete')
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| ユーザー検索
|--------------------------------------------------------------------------
*/

// 検索画面表示
Route::get('users/search', [UsersController::class, 'search'])
    ->middleware('auth');

// 検索実行
Route::post('users/search', [UsersController::class, 'index'])
    ->name('search')
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| フォロー関連
|--------------------------------------------------------------------------
*/

// フォローリスト
Route::get('follows/followlist', [FollowsController::class, 'followList'])
    ->middleware('auth');

// フォロワーリスト
Route::get('follows/followerlist', [FollowsController::class, 'followerList'])
    ->name('followerList')
    ->middleware('auth');

// フォロー
Route::post('/follow/{id}', [FollowsController::class, 'follow'])
    ->name('follow')
    ->middleware('auth');

// フォロー解除
Route::post('/unfollow/{id}', [FollowsController::class, 'unfollow'])
    ->name('unfollow')
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| プロフィール表示
|--------------------------------------------------------------------------
*/

Route::get('/profile/{id}', [UsersController::class, 'show'])
    ->name('profile')
    ->middleware('auth');
