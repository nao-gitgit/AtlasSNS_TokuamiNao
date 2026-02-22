<x-login-layout>

    <!-- 検索エリア -->
    <div class="search-area">
        <form action="{{ url('users/search') }}" method="GET" class="search-form">

            <input
                type="text"
                name="keyword"
                class="search-input"
                placeholder="ユーザー名"
                value="{{ $keyword ?? '' }}"
            >

            <button type="submit" class="search-btn">
                <img src="{{ asset('images/search.png') }}" alt="検索">
            </button>

        </form>

        <!-- 検索ワード右側表示 -->
        @if(!empty($keyword))
            <div class="search-word">
                検索ワード：{{ $keyword }}
            </div>
        @endif
    </div>


    <!-- 区切り線 -->
    <div class="divider"></div>

    <!-- ユーザー一覧 -->
    <div class="user-list">
        @foreach ($users as $user)
            <div class="user-item">

                <div class="user-left">
                    <img src="{{ asset('storage/' . $user->icon_image) }}" alt="アイコン" class="user-icon">
                    <span class="username">{{ $user->username }}</span>
                </div>

                <div class="user-right">
                    @if(Auth::user()->follows->contains($user->id))
                        <form action="{{ route('unfollow', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="unfollow-btn">フォロー解除</button>
                        </form>
                    @else
                        <form action="{{ route('follow', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="follow-btn">フォローする</button>
                        </form>
                    @endif
                </div>

            </div>
        @endforeach
    </div>

</x-login-layout>
