<div id="head">
    <!--Atlasロゴにトップページへ遷移するリンクを設置-->
    <h1>
        <a href="{{ route('home') }}"> <img src="{{ asset('images/atlas.png') }}" alt="Atlas" class="atlas-logo"> </a>
    </h1>

    <!--ユーザーメニュー-->
    <div class="user-menu-area">

            <!--ログイン時のみユーザー名を表示-->
            @auth
            <p class="username">{{ Auth::user()->username }}   さん</p>
            @endauth

            <!--矢印ボタンを設置-->
            <button id="menu-toggle" class="arrow-btn">
                <span class="arrow"></span>
            </button>

            <!--ユーザーアイコンを設置-->
            @auth
            <img src="{{ Auth::user()->icon_image
            ? asset('storage/' . Auth::user()->icon_image)
            : asset('images/icon1.png') }}"
            class="header-icon">
            @endauth

            <!--ドロップダウンメニュー-->
        <ul id="dropdown-menu" class="dropdown close">
            <li><a href="{{ route('home') }}">HOME</a></li>
            <li><a href="{{ route('profile.edit') }}">プロフィール編集</a></li>
            <li>
                <a href="#" id="logout-link">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </li>
        </ul>

    </div>
</div>
<script src="{{ asset('js/navigation.js') }}"></script>
