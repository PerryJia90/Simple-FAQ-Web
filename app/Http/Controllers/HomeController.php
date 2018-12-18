<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        $questions = $user->questions()->orderBy('created_at', 'desc')->withcount("zans")->paginate(6);
        return view('home',compact('questions','users'));
    }


    public function followings(User $user, Profile $profile)
    {
        $users = $user->followings()->paginate(60);
        $title = 'User-' . $user->id .'\'s Following';
        return view('users.show_follow',compact('users', 'title'));
    }

    public function followers(User $user)
    {
        $users = $user->followers()->paginate(60);
        $title = 'User-' . $user->id .'\'s Followers';
        return view('users.show_follow',compact('users', 'title'));
    }

}
