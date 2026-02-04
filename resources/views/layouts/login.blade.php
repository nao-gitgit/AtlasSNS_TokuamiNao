<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->
</head>

<body>
  <header>
    @include('layouts.navigation')
  </header>

  <!-- Page Content -->
  <div id="row">
    <div id="container">
      {{ $slot }}
    </div>

    <div id="side-bar">
  <div id="confirm">

    <p class="username">{{ Auth::user()->username }}さん</p>

    <!-- フォロー数 -->
    <div class="d-flex justify-content-between align-items-center">
      <span>フォロー数</span>
      <span>{{ Auth::user()->follows()->count() }} 人</span>
    </div>

    <div class="d-flex justify-content-end mt-2 mb-4">
      <a href="{{ url('follows/followlist') }}" class="btn btn-primary">
        フォローリスト
      </a>
    </div>

    <!-- フォロワー数 -->
    <div class="d-flex justify-content-between align-items-center">
      <span>フォロワー数</span>
      <span>{{ Auth::user()->followers()->count() }} 人</span>
    </div>

    <div class="d-flex justify-content-end mt-2 mb-3">
      <a href="{{ url('follows/followerlist') }}" class="btn btn-primary">
        フォロワーリスト
      </a>
    </div>

    <!-- 区切り線 -->
    <hr>

    <!-- ユーザー検索 -->
    <div class="d-flex justify-content-center mt-3">
      <a href="{{ url('users/search') }}" class="btn btn-primary">
        ユーザー検索
      </a>
    </div>

  </div>
</div>

  <footer>
  </footer>

  <script src="{{ asset('js/app.js') }}"></cript>
</body>
</html>
