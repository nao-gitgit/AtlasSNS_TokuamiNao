document.addEventListener("DOMContentLoaded", function () { // HTML読み込み終わったら処理開始
  const btn = document.getElementById("menu-toggle"); // 矢印ボタン取得
  if (btn) { // もしボタンがあれば
    const menu = document.getElementById("dropdown-menu"); // ドロップダウンメニュー取得
    const arrow = document.querySelector(".arrow"); // 矢印取得

    btn.addEventListener("click", function () { // クリックイベント登録
      menu.classList.toggle("open"); // openクラスあれば消す、なければつける
      menu.classList.toggle("close"); // closeクラスあれば消す、なければつける
      arrow.classList.toggle("open"); // openクラスあれば消す、なければつける
    });
  }

  const logout = document.getElementById("logout-link"); // ログアウトリンク取得
  if (logout) { // もしログアウトするなら
    logout.addEventListener("click", function (e) { // クリックイベント登録
      e.preventDefault(); // aタグのリンク操作停止
      document.getElementById("logout-form").submit(); // ログアウトフォームをPOST送信
    });
  }
});
