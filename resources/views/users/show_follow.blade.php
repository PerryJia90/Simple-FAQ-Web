@extends('layouts.app')
@section('title', $title)

@section('content')
    <div class="offset-md-2 col-md-8">
        <h2 class="mb-4 text-center">{{ $title }}</h2>

        <div class="list-group list-group-flush">
            Click to check profile
            @foreach ($users as $user)
                <div class="list-group-item">
                    @if ($user->profile)
                        <a href="/user/{{$user->id}}/profile/{{$user->id}}">
                            User-{{$user->id}}
                            {{$user->profile->fname}} {{$user->profile->lname}}
                        </a>
                    @else
                        <p>User-{{$user->id}}(No profile is available yet)</p>
                    @endif
                </div>
            @endforeach
        </div>

    </div>
@stop