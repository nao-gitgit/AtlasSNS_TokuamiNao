// 編集モーダル
const editBtns = document.querySelectorAll('.edit-btn'); // 投稿ごとにあるedit-btnを取得
const modal = document.getElementById('edit-modal'); // 編集モーダルを取得
const postContent = document.getElementById('edit-post-content'); // モーダル内の投稿内容を取得
const postId = document.getElementById('edit-post-id'); // モーダル内の投稿IDを取得

editBtns.forEach(btn => { // 編集ボタン全部に対して1つずつ処理
  btn.addEventListener('click', () => { // クリックイベント登録
    postContent.value = btn.dataset.post; // 編集する投稿内容をセット
    postId.value = btn.dataset.id; // 編集する投稿IDをセット
    modal.style.display = 'block'; // モーダル表示 noneからblockに
  });
});

window.addEventListener('click', (e) => { // 画面のどこをクリックしても検知
  if (e.target === modal) { // クリックした場所がモーダル背景なら
    modal.style.display = 'none'; // 閉じる
  }
});

// 削除モーダル
const deleteBtns = document.querySelectorAll('.delete-btn'); // 投稿ごとにあるdelete-btnを取得
const deleteModal = document.getElementById('delete-modal'); // 削除モーダルを取得
const deletePostId = document.getElementById('delete-post-id'); // モーダル内の投稿IDを取得
const cancelBtns = document.querySelectorAll('.cancel-btn'); // cancel-btnを取得

deleteBtns.forEach(btn => { // 削除ボタン全部に対して1つずつ処理
  btn.addEventListener('click', (e) => { // クリックイベント登録
    e.preventDefault(); // ボタンのデフォルト動作submit停止
    deletePostId.value = btn.dataset.id; // 削除する投稿IDをセット
    deleteModal.style.display = 'block'; // モーダル表示 noneからblockに
  });
});

cancelBtns.forEach(btn => { // キャンセルボタン全部に対して1つずつ処理
  btn.addEventListener('click', (e) => { // クリックイベント登録
    e.preventDefault(); // ボタンのデフォルト動作submit停止
    deleteModal.style.display = 'none'; // 閉じる
  });
});
