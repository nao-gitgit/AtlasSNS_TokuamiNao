<x-login-layout>

<div class="follow-wrapper">

    <!-- タイトル＋アイコン -->
    <div class="follow-header">
        <h2 class="follow-title">フォロワーリスト</h2>

        <div class="follow-icon-area">
            @foreach($followers as $user)
                <img src="{{ asset('storage/' . $user->icon_image) }}"
                     class="follow-icon">
            @endforeach
        </div>
    </div>

    <div class="divider"></div>

    {{-- フォロワーの投稿一覧 --}}
    @foreach ($posts as $post)
    <div class="post">

        <!-- アイコン -->
        <a href="{{ route('profile', $post->user->id) }}">
    <img src="{{ asset('storage/' . $post->user->icon_image) }}"
         class="post-user-icon">
        </a>

        <div class="post-body">

            <!-- ユーザー名 & 日時 -->
            <div class="post-header">
                <span class="post-username">
                    {{ $post->user->username }}
                </span>

                <span class="post-date">
                    {{ $post->created_at->timezone('Asia/Tokyo')->format('Y-m-d H:i') }}
                </span>
            </div>

            <!-- 投稿内容 -->
            <p class="post-content">
                {{ $post->post }}
            </p>

        </div>

    </div>
    @endforeach

</div>

</x-login-layout>
