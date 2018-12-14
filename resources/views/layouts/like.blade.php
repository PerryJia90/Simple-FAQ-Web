<div>
    @if($profile->fan(\Auth::id())->exists())
        <a href="/user/{{$question->user_id}}/profile/{{$question->user_id}}/unzan"  class="btn btn-success float-left">Unlike</a>
    @else
        <a href="/user/{{$question->user_id}}/profile/{{$question->user_id}}/zan"  class="btn btn-warning float-left">Like</a>
    @endif
</div>