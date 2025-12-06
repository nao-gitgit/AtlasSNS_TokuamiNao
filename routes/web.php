<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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

Route::get('posts/index', [PostsController::class, 'index'])->name('home');

Route::get('users/profile', [ProfileController::class, 'profile'])->name('profile');

Route::post('users/search', [UsersController::class, 'index'])->name('search');

Route::get('follows/followlist', [PostsController::class, 'index']);
Route::get('follows/followerlist', [PostsController::class, 'index']);
