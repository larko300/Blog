@extends('layout')

@section('content')

    <div id="app">

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><h3>User profile</h3></div>

                            <div class="card-body">
                                @if(session('success_profile'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success_profile') }}
                                    </div>
                                @endif
                                <form action="/user/{{ auth()->user()->id }}/profile" method="post" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Name</label>
                                                <input type="text" class="form-control" name="name"  value="{{ auth()->user()->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Email</label>
                                                <input type="email" class="form-control is-invalid" name="email" value="{{ auth()->user()->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Icon</label>
                                                <input type="file" class="form-control" name="avatar">
                                            </div>
                                            @include('errors')
                                        </div>
                                        <div class="col-md-4">
                                            <img src="@if(auth()->user()->avatar) {{ auth()->user()->avatar }} @else /icon/no-user.jpg @endif" alt="" class="img-fluid">
                                        </div>

                                        <div class="col-md-12">
                                            <button class="btn btn-warning">Edit profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top: 20px;">
                        <div class="card">
                            <div class="card-header"><h3>Security</h3></div>

                            <div class="card-body">
                                @if(session('success_profile'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success_profile') }}
                                    </div>
                                @endif

                                <form action="/user/{{ auth()->user()->id }}/profile" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Current password</label>
                                                <input type="password" name="current" class="form-control" id="exampleFormControlInput1">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">New password</label>
                                                <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Password confirmation</label>
                                                <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlInput1">
                                            </div>

                                            <button class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
