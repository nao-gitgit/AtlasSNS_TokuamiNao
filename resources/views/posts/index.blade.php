<x-login-layout>

    {{-- 投稿フォーム --}}
    <div class="post-form">
        <form action="{{ route('post.store') }}" method="POST">
            @csrf

            <div class="post-area">
                <!-- ユーザーアイコン -->
                <a href="{{ route('profile.show', Auth::id()) }}">
                <img src="{{ $user->icon_image === 'icon1.png'
                ? asset('images/icon1.png')
                : asset('storage/' . $user->icon_image) }}"
                class="post-user-icon">
                </a>

                <!-- 投稿入力欄 -->
                <textarea
                    name="post"
                    class="post-textarea"
                    placeholder="投稿内容を入力してください。"
                >{{ old('post') }}</textarea>

                <!-- エラーメッセージ表示 -->
                @error('post')
                    <p class="error-message">{{ $message }}</p>
                @enderror

                <!-- 投稿ボタン -->
                <button type="submit" class="post-btn">
                    <img src="{{ asset('images/post.png') }}" alt="投稿">
                </button>
            </div>
        </form>
    </div>

    <!-- 区切り線 -->
    <div class="divider"></div>

    <!-- 投稿一覧 -->
    @foreach ($posts as $post)
<div class="post">
    <!-- アイコン -->
    <a href="{{ route('profile.show', $post->user->id) }}">
    <img src="{{ $user->icon_image === 'icon1.png'
    ? asset('images/icon1.png')
    : asset('storage/' . $user->icon_image) }}"
    class="post-user-icon">
</a>

    <div class="post-body">
        <!-- ユーザー名 & 投稿日時 -->
        <div class="post-header">
            <span class="post-username">{{ $post->user->username }}</span>
            <span class="post-date">{{ $post->created_at->timezone('Asia/Tokyo')->format('Y-m-d H:i') }}</span>
        </div>

        <!-- 投稿内容 -->
        <p class="post-content">{{ $post->post }}</p>
    </div>

    <!-- 自分の投稿のみ操作ボタン -->
    @if (Auth::id() === $post->user_id)
    <div class="post-actions">
        <!-- 編集ボタン -->
        <button class="edit-btn"
            data-id="{{ $post->id }}"
            data-post="{{ $post->post }}">
            <img src="{{ asset('images/edit.png') }}">
        </button>

        <!-- 削除ボタン -->
        <button class="delete-btn"
        data-id="{{ $post->id }}">
        <img src="{{ asset('images/trash.png') }}">
        </button>
    </div>
    @endif
</div>
@endforeach

<!-- 編集モーダル -->
<div id="edit-modal" class="modal">
  <div class="modal-content edit-modal">
    <form method="POST" action="{{ route('post.update') }}">
      @csrf

      <input type="hidden" name="id" id="edit-post-id">

      <textarea
        name="post"
        id="edit-post-content"
        class="edit-textarea"
        maxlength="150"
        required></textarea>

      <div class="edit-btn-area">
        <button type="submit" class="edit-submit">
        <img src="{{ asset('images/edit.png') }}">
        </button>
      </div>
    </form>
  </div>
</div>

<!-- 削除モーダル -->
<div id="delete-modal" class="modal">
  <div class="modal-content delete-modal">
  <p>この投稿を削除します。よろしいでしょうか？</p>

    <form method="POST" action="{{ route('post.delete') }}">
      @csrf

      <input type="hidden" name="id" id="delete-post-id">

      <div class="delete-btn-area">
        <button type="submit" class="ok-btn">OK</button>
        <button type="button" class="cancel-btn">キャンセル</button>
      </div>
    </form>
  </div>
</div>

</x-login-layout>
<script src="{{ asset('js/modal.js') }}"></script>
