<x-logout-layout>

<div class="logout-container">
  {!! Form::open(['url' => 'login']) !!}

  <p>AtlasSNSへようこそ</p>

  {{ Form::label('email' , 'メールアドレス') }}
  {{ Form::text('email',null,['class' => 'input']) }}
  {{ Form::label('password' , 'パスワード') }}
  {{ Form::password('password',['class' => 'input']) }}

  {{ Form::submit('ログイン') }}

  <p><a href="register">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}
</div>

</x-logout-layout>
