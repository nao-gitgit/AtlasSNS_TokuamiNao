<x-login-layout>

<div class="profile-wrapper">

    <!-- ユーザー情報エリア -->
    <div class="profile-header">

        <!-- アイコン -->
        <div class="profile-icon-area">
        <img src="{{ asset('storage/' . $user->icon_image) }}"
             class="profile-icon">
        </div>

        <div class="profile-info">

            <!-- ユーザー名 -->
            <div class="profile-row">
                <p class="profile-label">ユーザー名</p>
                <p class="profile-value">{{ $user->username }}</p>
            </div>

            <!-- 自己紹介文 -->
            <div class="profile-row">
                <p class="profile-label">自己紹介</p>
                <p class="profile-value">{{ $user->bio ?? '自己紹介文はまだありません'}}</p>
            </div>

        </div>

        <!-- フォロー・フォロー解除ボタン -->
        <div class="follow-btn-area">
            @if(Auth::id() !== $user->id)

            @if($isFollowing)
            <form action="{{ route('unfollow', $user->id) }}" method="POST">
                @csrf
                <button class="btn unfollow-btn">フォロー解除</button>
            </form>
            @else
            <form action="{{ route('follow', $user->id) }}" method="POST">
                @csrf
                <button class="btn follow-btn">フォローする</button>
            </form>
            @endif

            @endif
        </div>

    </div>

    <div class="divider"></div>

    <!-- 投稿一覧 -->
    @foreach ($posts as $post)
    <div class="post">

        <img src="{{ asset('storage/' . $post->user->icon_image) }}"
             class="post-user-icon">

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
