<x-login-layout>

    {{-- 投稿フォーム --}}
    <div class="post-form">
        <form action="{{ route('post.store') }}" method="POST">
            @csrf

            <div class="post-area">
                <!-- ユーザーアイコン -->
                <img src="{{ asset('images/icon1.png') }}" class="user-icon">

                <!-- 投稿入力欄 -->
                <textarea
                    name="post"
                    class="post-textarea"
                    placeholder="投稿内容を入力してください。"
                >{{ old('post') }}</textarea>

                {{-- エラーメッセージ表示 --}}
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

    {{-- 投稿一覧（今は空でもOK） --}}
    {{-- @foreach ($posts as $post) --}}
    {{-- @endforeach --}}

</x-login-layout>
