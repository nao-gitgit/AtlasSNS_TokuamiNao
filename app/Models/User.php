<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Follow;
use App\Models\Post;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * 一括代入を許可する属性
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * シリアライズ時に隠す属性
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 自分の投稿
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * 自分がフォローしている人（中間テーブル：follows）
     */
    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'following_id',
            'followed_id'
        );
    }

    /**
     * 自分をフォローしている人
     */
    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'followed_id',
            'following_id'
        );
    }
}
