<x-logout-layout>

{!! Form::open(['url' => 'register']) !!}

<h2>新規ユーザー登録</h2>

<!-- エラーメッセージ表示 -->
@if ($errors->any())
    <div class="error-massages">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::label('username','ユーザー名') }}
{{ Form::text('username',old('username'),['class' => 'input']) }}

{{ Form::label('email','メールアドレス') }}
{{ Form::email('email',old('email'),['class' => 'input']) }}

{{ Form::label('password','パスワード') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::label('password_confirmation','パスワード確認') }}
{{ Form::password('password_confirmation',['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}

</x-logout-layout>
