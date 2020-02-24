@extends('layout')

@section('content')

    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h3>Comment manager</h3></div>

                        <div class="card-body">
                            @if(session('success_admin'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success_admin') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                @foreach($comments as $comment)
                                <tbody>
                                <tr>
                                    <td>
                                        <img src="@if($comment->user['avatar']){{ $comment->user['avatar'] }} @else /icon/no-user.jpg @endif" alt="" class="img-fluid" width="64" height="64">
                                    </td>
                                    <td>{{ $comment->user['name'] }}</td>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->updated_at }}</td>
                                    <td>{{ $comment->body }}</td>
                                    <td>
                                        <div class="row">
                                            <form action="/comments/{{ $comment->id }}" method="post">
                                                @method('PATCH')
                                                @csrf
                                                <button type="submit" name="allow" class="btn btn-success" value="">Allow</button>
                                            </form>
                                            <form action="/comments/{{ $comment->id }}" method="post">
                                                @method('PATCH')
                                                @csrf
                                                <button type="submit" name="ban" class="btn btn-warning" value="">Ban</button>
                                            </form>
                                            <form action="/comments/{{ $comment->id }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" name="delete" class="btn btn-danger" value="">Delete</button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection
