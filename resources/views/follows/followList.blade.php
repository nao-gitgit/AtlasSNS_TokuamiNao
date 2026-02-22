<x-login-layout>

<div class="follow-wrapper">

    <!-- タイトル＋アイコンを横並び -->
    <div class="follow-header">
        <h2 class="follow-title">フォローリスト</h2>

        <div class="follow-icon-area">
            @foreach($followings as $user)
                <a href="{{ route('profile.show', $user->id) }}">
                    <img src="{{ asset('storage/' . $user->icon_image) }}"
                         alt="アイコン"
                         class="follow-icon">
                </a>
            @endforeach
        </div>
    </div>

    <!-- 区切り線 -->
    <div class="divider"></div>

    @foreach ($posts as $post)
    <div class="post">

        <!-- アイコン -->
        <a href="{{ route('profile.show', $post->user->id) }}">
            <img src="{{ asset('storage/' . $post->user->icon_image) }}"
                 class="post-user-icon">
        </a>

        <div class="post-body">
            <div class="post-header">
                <span class="post-username">
                    {{ $post->user->username }}
                </span>

                <span class="post-date">
                    {{ $post->created_at->timezone('Asia/Tokyo')->format('Y-m-d H:i') }}
                </span>
            </div>

            <p class="post-content">
                {{ $post->post }}
            </p>
        </div>

    </div>
    @endforeach

</div>

</x-login-layout>
