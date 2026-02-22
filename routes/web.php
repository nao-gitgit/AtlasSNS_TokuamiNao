<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FollowsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



require __DIR__ . '/auth.php';

Route::get('posts/index', [PostsController::class, 'index'])->name('home')->middleware('auth');

Route::get('users/profile', [ProfileController::class, 'profile'])->name('profile');

Route::post('users/search', [UsersController::class, 'index'])->name('search');

Route::get('follows/followlist', [PostsController::class, 'index']);
Route::get('follows/followerlist', [PostsController::class, 'index']);

Route::get('follows/followlist', [FollowsController::class, 'followList']);
Route::get('follows/followerlist', [FollowsController::class, 'followerList']);

Route::get('users/search', [UsersController::class, 'search'])->middleware('auth');

Route::post('posts/store', [PostsController::class, 'store'])->name('post.store')->middleware('auth');

Route::post('posts/update', [PostsController::class, 'update'])->name('post.update')->middleware('auth');

Route::post('/post/delete', [PostsController::class, 'destroy'])->name('post.delete');

Route::post('/follow/{id}', [FollowsController::class, 'follow'])->name('follow');
Route::post('/unfollow/{id}', [FollowsController::class, 'unfollow'])->name('unfollow');

Route::get('/profile/{id}', [UsersController::class, 'show'])->name('profile.show');
