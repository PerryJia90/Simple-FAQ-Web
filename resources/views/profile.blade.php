@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-sm-8">
                            @if (Auth::check())
                                @include('users._follow_form')
                            @endif
                        </div>
                    </div>

                    <div class="card-body ">
                        <span class="font-weight-bold">First Name:</span> {{$profile->fname}}</br>
                        <span class="font-weight-bold">Last Name: </span>{{$profile->lname}}</br>
                        <span class="font-weight-bold">Body: </span>{{$profile->body}}</br>
                    </div>
                    <div class="card-footer">

                        <a class="btn btn-success float-right"
                           href="{{ route('profile.edit', ['profile_id' => $profile->id,'user_id' => $profile->user->id]) }}">
                            Edit
                        </a>
                        <a class="btn btn-primary float-right mr-2"
                           href="{{ route('profile.upload', ['id' => $profile->id]) }}">
                            Upload a file
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection