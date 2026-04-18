<x-logout-layout>

{!! Form::open(['url' => 'register','class'=>'login-form']) !!}

<h3 class="login-title">新規ユーザー登録</h3>

<!-- エラーメッセージ表示 -->
@if ($errors->any())
<div class="error-message">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="form-group">
{{ Form::label('username','ユーザー名') }}
{{ Form::text('username',old('username'),['class' => 'input']) }}
</div>

<div class="form-group">
{{ Form::label('email','メールアドレス') }}
{{ Form::email('email',old('email'),['class' => 'input']) }}
</div>

<div class="form-group">
{{ Form::label('password','パスワード') }}
{{ Form::password('password',['class' => 'input']) }}
</div>

<div class="form-group">
{{ Form::label('password_confirmation','パスワード確認') }}
{{ Form::password('password_confirmation',['class' => 'input']) }}
</div>

<div class="login-btn-area">
{{ Form::submit('新規登録',['class'=>'login-btn']) }}
</div>

<div class="register-link">
<a href="/login">ログイン画面へ戻る</a>
</div>

{!! Form::close() !!}

</x-logout-layout>
