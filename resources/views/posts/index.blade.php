<x-login-layout>

    {{-- 投稿フォーム --}}
    <div class="post-form">
        <form action="{{ route('post.store') }}" method="POST">
            @csrf

            <div class="post-area">
                <!-- ユーザーアイコン -->
                <a href="{{ route('profile', Auth::id()) }}">
                <img src="{{ asset('storage/' . Auth::user()->icon_image) }}"
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
    <a href="{{ route('profile', $post->user->id) }}">
    <img src="{{ asset('storage/' . $post->user->icon_image) }}"
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
        <!-- 編集 -->
        <button class="edit-btn"
            data-id="{{ $post->id }}"
            data-post="{{ $post->post }}">
            <img src="{{ asset('images/edit.png') }}">
        </button>

        <!-- 削除 -->
        <form method="POST" action="{{ route('post.delete') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $post->id }}">
            <button type="submit" class="delete-btn">
                <img src="{{ asset('images/trash.png') }}">
            </button>
        </form>
    </div>
    @endif
</div>
@endforeach

<!-- 編集モーダル -->
<div id="edit-modal" class="modal">
  <div class="modal-content">
    <form method="POST" action="{{ route('post.update') }}">
      @csrf

      <input type="hidden" name="id" id="edit-post-id">

      <textarea
        name="post"
        id="edit-post-content"
        maxlength="150"
        required></textarea>

      <button type="submit">
        <img src="{{ asset('images/edit.png') }}">
      </button>
    </form>
  </div>
</div>

</x-login-layout>
