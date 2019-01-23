<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard')
            ->with('posts_count', Auth::user()->admin ? Post::all()->count() : Post::where('user_id' , Auth::id())->get()->count())
            ->with('trash_posts_count', Auth::user()->admin ? Post::onlyTrashed()->get()->count() : Post::onlyTrashed()->where('user_id' , Auth::id())->get()->count())
            ->with('users_count', User::all()->count())
            ->with('categories_count', Category::all()->count());
    }
}
