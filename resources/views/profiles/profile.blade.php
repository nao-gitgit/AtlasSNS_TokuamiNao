<x-login-layout>

    <div class="profile-area">
        <img src="{{ asset('storage/' . $user->icon_image) }}" width="80">

        <h2>{{ $user->username }}</h2>

        <p>{{ $user->bio ?? '自己紹介はありません' }}</p>
    </div>

</x-login-layout>
