<x-login-layout>

<div class="profile-edit-wrapper">

<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="profile-edit-row">

<div class="icon-area">
<img src="{{ asset('storage/' . $user->icon_image) }}" class="edit-icon">
</div>

<div class="edit-form">

<div class="form-row">
<label>ユーザー名</label>

<input type="text"
name="username"
value="{{ $user->username }}"
class="form-input">

</div>

<div class="form-row">

<label>メールアドレス</label>

<input type="email"
name="email"
value="{{ $user->email }}"
class="form-input">

</div>

<div class="form-row">

<label>パスワード</label>

<input type="password"
name="password"
class="form-input">

</div>

<div class="form-row">

<label>パスワード確認</label>

<input type="password"
name="password_confirmation"
class="form-input">

</div>

<div class="form-row">

<label>自己紹介</label>

<textarea name="bio"
class="form-textarea">{{ $user->bio }}</textarea>

</div>

<div class="form-row">

<label>アイコン画像</label>

<input type="file"
name="icon_image">

</div>

<div class="button-area">

<button type="submit" class="update-btn">
更新
</button>

</div>

</div>

</div>

</form>

</div>

</x-login-layout>
