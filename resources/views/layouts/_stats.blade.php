<div class="py-1 text-center">


<a href="{{ route('home.followings', $user->id) }}">
    <strong id="following" class="stat ml-2">
        {{ count($user->followings) }}
    </strong>
    Following
</a>
<a href="{{ route('home.followers', $user->id) }}">
    <strong id="followers" class="stat ml-2">
        {{ count($user->followers) }}
    </strong>
    Followers
</a>
<a href="{{ route('home', $user->id) }}">
    <strong id="questions" class="stat ml-2">
        {{ $user->questions()->count() }}
    </strong>
    Questions
</a>
</div>