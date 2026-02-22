<x-login-layout>

<div class="profile-wrapper">

    <!-- ユーザー情報 -->
    <div class="profile-header">
        <img src="{{ asset('storage/' . $user->icon_image) }}"
             class="profile-icon">

        <h2 class="profile-name">
            {{ $user->username }}
        </h2>
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
