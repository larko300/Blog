<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Project;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function store()
    {
        Comment::create(request()->validate([
           'body' => ['required', 'min:3']
        ]));
        session()->flash('success', 'Comment created!');
        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }

    public function admin()
    {
        $comments = Comment::all();
        return view('comments.admin', compact('comments'));
    }
}
