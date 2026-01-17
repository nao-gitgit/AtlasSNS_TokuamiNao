a<div id="head">
    <!--Atlasロゴにトップページへ遷移するリンクを設置-->
    <h1>
        <a href="{{ route('home') }}"> <img src="{{ asset('images/atlas.png') }}" alt="Atlas"> </a>
    </h1>

    <!--ユーザーメニュー-->
    <div class="user-menu-area">

            <!--ログイン時のみユーザー名を表示-->
            @auth
            <p class="username">{{ Auth::user()->username }}さん</p>
            @endauth

            <!--矢印ボタンを設置-->
            <button id="menu-toggle" class="arrow-btn">
                <span class="arrow"></span>
            </button>

            <!--ドロップダウンメニュー あえてルートはこのままに-->
        <ul id="dropdown-menu" class="dropdown close">
            <li><a href="{{ route('home') }}">HOME</a></li>
            <li><a href="{{ route('profile') }}">プロフィール編集</a></li>
            <li>
                <a href="#" id="logout-link">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </li>
        </ul>

    </div>
</div>


<style>
/* ヘッダー全体 */
#head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #1f67c6;
    padding: 15px 25px;
    color: #fff;
}

/* ユーザー名＋矢印＋メニュー */
.user-menu-area {
    display: flex;
    align-items: center;
    position: relative;
}

/* ユーザー名 */
.username {
    margin-right: 10px;
    font-weight: bold;
}

/* 矢印ボタン */
.arrow-btn {
    width: 35px;
    height: 35px;
    border: 2px solid #c5e946;
    background: transparent;
    border-radius: 4px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* 矢印 */
.arrow {
    width: 10px;
    height: 10px;
    border-right: 3px solid #c5e946;
    border-bottom: 3px solid #c5e946;
    transform: rotate(45deg); /* 下向き */
    transition: 0.3s;
}

.arrow.open {
    transform: rotate(-135deg); /* 上向き */
}

/* ドロップダウンメニュー */
.dropdown {
    position: absolute;
    top: 55px;
    right: 0;
    background: #fff;
    color: #333;
    width: 180px;
    border-radius: 6px;
    box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    transition: height 0.3s ease;
}

.dropdown li {
    list-style: none;
}

.dropdown li a {
    display: block;
    padding: 14px 20px;
    color: #333;
    text-decoration: none;
    font-size: 15px;
}

.dropdown li:nth-child(2) a {
    background: #0d3483;
    color: #fff;
}

/* クリック前は高さゼロで非表示 */
.dropdown.close {
    height: 0;
    padding: 0;
}

/* 開いた状態 */
.dropdown.open {
    height: auto;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("menu-toggle");
    const menu = document.getElementById("dropdown-menu");
    const arrow = document.querySelector(".arrow");

    btn.addEventListener("click", function () {
        menu.classList.toggle("open");
        menu.classList.toggle("close");
        arrow.classList.toggle("open");
    });

    //ログアウトリンクを押したらフォームをPOST送信
    document.getElementById("logout-link").addEventListener("click", function (e) {
        e.preventDefault();
        document.getElementById("logout-form").submit();
    });
});
</script>
