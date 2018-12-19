<div class="py-1 text-center">
    <blockquote>
        @if (Auth::user()->profile)
            <p><img src="http://pic.51yuansu.com/pic3/cover/02/95/53/5acdc29a0b40b_610.jpg"
                    alt="" class="img-rounded"
                    style="border-radius:500px; height: 40px"> {{$profile->fname}} {{$profile->lname}}
            </p>
        @endif
    </blockquote>

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