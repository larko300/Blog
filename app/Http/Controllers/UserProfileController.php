<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ResetsPasswords;


class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function update(User $user)
    {
        request()->validate([
            'name' => 'min:3',
            'email' => 'email|exists:users',
            'avatar'     =>  'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        request()->has('avatar') ? $user->avatar = Storage::url(request()->file('avatar')->store('public')) : '';
        request()->has('name') ? $user->name = request('name') : '';
        request()->has('email') ? $user->email = request('email') : '';
        $user->save();
        return back()->with(['success_profile' => 'Success!']);
    }

}
