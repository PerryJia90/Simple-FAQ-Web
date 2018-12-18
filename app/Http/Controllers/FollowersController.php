<?php

namespace App\Http\Controllers;


use App\Profile;
use Illuminate\Http\Request;
use App\User;
use Auth;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user,Profile $profile)
    {

        if ( ! Auth::user()->isFollowing($user->id)) {
            Auth::user()->follow($user->id);
        }

        return back();
    }

    public function destroy(User $user,Profile $profile)
    {

        if (Auth::user()->isFollowing($user->id)) {
            Auth::user()->unfollow($user->id);
        }

        return back();
    }
}
