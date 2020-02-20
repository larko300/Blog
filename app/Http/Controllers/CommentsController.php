<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Project;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $comments = Comment::all()->where('status', false);
        return view('comments.index', compact('comments'));
    }

    public function store()
    {
        $attributes = request()->validate([
           'body' => ['required', 'min:3']
        ]);
        $attributes['owner_id'] = auth()->id();
        Comment::create($attributes);
        session()->flash('success', 'Comment created!');
        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        session()->flash('success_admin', 'Success!');
        return back();
    }

    public function admin()
    {
        $comments = Comment::all();
        return view('comments.admin', compact('comments'));
    }

    public function update(Comment $comment)
    {
        request()->has('ban') ? $comment->ban() : $comment->allow();
        session()->flash('success_admin', 'Success!');
        return back();
    }
}
