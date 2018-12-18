@extends('layouts.app')
@section('title', $title)

@section('content')
    <div class="offset-md-2 col-md-8">
        <h2 class="mb-4 text-center">{{ $title }}</h2>

        <div class="list-group list-group-flush">
            Click to check profile
            @foreach ($users as $user)
                <div class="list-group-item">
                    <a href="/user/{{$user->id}}/profile/{{$user->id}}">
                        User-{{$user->id}}
                    </a>
                </div>
            @endforeach
        </div>

    </div>
@stop