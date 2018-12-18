@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" action="">
            @csrf
            <div class="row justify-content-center">
                <aside class="col-md-4">
                    <section class="stats mt-2">
                        @include('layouts._stats', ['user' => Auth::user()])
                    </section>
                </aside>
                <div class="py-4 col-md-12">
                    <div class="card">
                        <div class="card-header">Questions
                            <a class="btn btn-primary float-right" href="{{ route('questions.create') }}">
                                Create a Question
                            </a>
                        </div>

                        <div class="card-body">

                            <div class="card-deck">
                                @forelse($questions as $question)
                                    <div class="col-sm-4 d-flex align-items-stretch">
                                        <div class="card mb-3">
                                            <div class="card-header">
                                                <small class="text-muted">
                                                    Updated: {{ $question->created_at->diffForHumans() }}
                                                    Answers: {{ $question->answers()->count() }}

                                                </small>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">{{$question->body}}</p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="card-text">
                                                <p class="blog-post-meta">Like: {{$question->zans_count}}</p>
                                                <p>Created by
                                                    <a href="/user/{{$question->user_id}}/profile/{{$question->user_id}}">User-{{$question->user_id}}</a>
                                                </p>

                                                <a class="btn btn-primary float-right"
                                                   href="{{ route('questions.show', ['id' => $question->id]) }}">
                                                    View
                                                </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    There are no questions to view, you can  create a question.
                                @endforelse


                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {{ $questions->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-4 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Users in the system
                        </div>
                        <div class="card-body">
                            <div class="card-deck">
                                @foreach ($users as $user)
                                    <div class="col-sm-2 d-flex align-items-stretch text-center">

                                        <div class="card mb-1">
                                            <div class="card-body">
                                                <a href="/user/{{$user->id}}/profile/{{$user->id}}">
                                                    User-{{$user->id}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection