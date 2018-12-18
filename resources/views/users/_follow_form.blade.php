
    <div class="mt-2 mb-4">
        <blockquote>
            <p><img src="http://pic.51yuansu.com/pic3/cover/02/95/53/5acdc29a0b40b_610.jpg"
                    alt="" class="img-rounded"
                    style="border-radius:500px; height: 40px"> {{$profile->fname}} {{$profile->lname}}
            </p>
        </blockquote>
        @if (Auth::user()->isFollowing($user->id))
            <form action="{{ route('followers.destroy', $user->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-sm btn-outline-primary">Unfollow</button>
            </form>
        @else
            <form action="{{ route('followers.store', $user->id) }}" method="post">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-sm btn-primary">Follow</button>
            </form>
        @endif
    </div>