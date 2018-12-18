@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-sm-8">
                            <blockquote>
                                <p><img src="http://img.zcool.cn/community/01da6f59a01a97a801211d254c8a41.jpg@2o.jpg"
                                        alt="" class="img-rounded"
                                        style="border-radius:500px; height: 40px"> {{$profile->fname}} {{$profile->lname}}
                                </p>
                            </blockquote>
                        </div>
                    </div>

                    <div class="card-body ">
                        <span class="font-weight-bold">First Name:</span> {{$profile->fname}}</br>
                        <span class="font-weight-bold">Last Name: </span>{{$profile->lname}}</br>
                        <span class="font-weight-bold">Body: </span>{{$profile->body}}</br>
                    </div>
                    <div class="card-footer">

                        @if (Auth::check())
                            @include('users._follow_form')
                        @endif

                        <a class="btn btn-success float-right"
                           href="{{ route('profile.edit', ['profile_id' => $profile->id,'user_id' => $profile->user->id]) }}">
                            Edit
                        </a>
                        <a class="btn btn-primary float-right"
                           href="{{ route('profile.upload', ['id' => $profile->id]) }}">
                            Upload a file
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection