<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //バリデーション設定
        $validated = $request->validate([
            'username' => ['required', 'string', 'min:2', 'max:12'],
            'email' => ['required', 'string', 'email', 'min:5', 'max:40', 'unique:users,email'],
            'password' => ['required', 'string', 'alpha_num', 'min:8', 'max:20', 'confirmed'],
        ],[
        'username.required' => 'ユーザー名は必須です',
        'username.min' => 'ユーザー名は2文字以上で入力してください',
        'username.max' => 'ユーザー名は12文字以内で入力してください',

        'email.required' => 'メールアドレスは必須です',
        'email.email' => '正しいメールアドレス形式で入力してください',
        'email.min' => 'メールアドレスは5文字以上で入力してください',
        'email.max' => 'メールアドレスは40文字以内で入力してください',
        'email.unique' => 'このメールアドレスは既に使用されています',

        'password.required' => 'パスワードは必須です',
        'password.alpha_num' => 'パスワードは英数字のみで入力してください',
        'password.min' => 'パスワードは8文字以上で入力してください',
        'password.max' => 'パスワードは20文字以内で入力してください',
        'password.confirmed' => 'パスワードが一致しません',

        ]);

        //ユーザー登録
        User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        //ユーザー名をセッションに保存
        session(['username' => $validated['username']]);

        return redirect('added');
    }

    //セッションからusernameを取得してbladeに渡す
    public function added(): View
    {
        $username = session('username');
        return view('auth.added', compact('username'));
    }
}
