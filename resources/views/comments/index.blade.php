@extends('layout')

@section('content')

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    Project
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(isset($_SESSION['name_varify'])){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile"><?php
                                if (isset($_SESSION['name_varify'])) {
                                    echo $_SESSION['name_varify'];
                                }
                                ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                        <?php }else{ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                        <?php  } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Comments <a href="/comments/admin" class="btn btn-primary" style="float:right">Admin comments</a></h3>
                            </div>

                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @foreach($comments as $comment)

                                <div class="media">
                                    <img src="" class="mr-3" alt="..." width="64" height="64">
                                    <div class="media-body">
                                        <h5 class="mt-0">Username</h5>
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
                                <form action="/comments" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    @include('errors')
                                    <button type="submit" class="btn btn-success">Add</button>
                                </form>
{{--                                <h4>Что бы оставить комментарий <a href="/login">войдите</a> или <a href="/register">зарегистрируйтесь</a></h4>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
