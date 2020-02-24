@extends('layout')

@section('content')

    <div id="app">

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    Comments
                                    @auth
                                        <a href="/comments/admin" class="btn btn-primary" style="float:right">Admin comments</a>
                                    @endauth
                                </h3>
                            </div>

                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @foreach($comments as $comment)
                                <div class="media">
                                    <img src="@if($comment->user['avatar']){{ $comment->user['avatar'] }} @else /icon/no-user.jpg @endif" class="mr-3" alt="..." width="64" height="64">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{ $comment->user['name'] }}</h5>
                                        <span><small>{{ $comment->updated_at }}</small></span>
                                        <p>
                                            {{ $comment->body }}
                                        </p>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top: 20px;">
                        <div class="card">

                                <div class="card-header"><h3>Add comment</h3></div>

                                <div class="card-body">
                                    @auth
                                    <form action="/comments" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        @include('errors')
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </form>
                                    @else
                                    <h4>For add comment <a href="/login">login</a> or <a href="/register">sing up</a></h4>
                                    @endauth
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
