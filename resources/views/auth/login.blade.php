<x-logout-layout>

{!! Form::open(['url' => 'login','class'=>'login-form']) !!}

<h3 class="login-title">AtlasSNSへようこそ</h3>

<div class="form-group">
{{ Form::label('email' , 'メールアドレス') }}
{{ Form::text('email',null,['class' => 'input']) }}
</div>

<div class="form-group">
{{ Form::label('password' , 'パスワード') }}
{{ Form::password('password',['class' => 'input']) }}
</div>

<div class="login-btn-area">
{{ Form::submit('ログイン',['class'=>'login-btn']) }}
</div>

<div class="register-link">
<a href="/register">新規ユーザーの方はこちら</a>
</div>

</x-logout-layout>
