<a href="{{ route('home.followings', $user->id) }}">
    <strong id="following" class="stat">
        {{ count($user->followings) }}
    </strong>
    关注
</a>
<a href="{{ route('home.followers', $user->id) }}">
    <strong id="followers" class="stat">
        {{ count($user->followers) }}
    </strong>
    粉丝
</a>
<a href="{{ route('home', $user->id) }}">
    <strong id="questions" class="stat">
        {{ $user->questions()->count() }}
    </strong>
    问题
</a>