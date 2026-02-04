<x-login-layout>

    <div class="search-area">
        <form action="{{ url('users/search') }}" method="GET">

            <input
                type="text"
                name="keyword"
                class="search-input"
                placeholder="ユーザー名"
            >

            <button type="submit" class="search-btn">
                <img src="{{ asset('images/search.png') }}" alt="検索">
            </button>

        </form>
    </div>

</x-login-layout>
