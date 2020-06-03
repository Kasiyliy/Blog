<?php

namespace App\Http\Controllers;

use App\Follower;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class FollowersController extends Controller
{

    public function index()
    {

        $followers = [];
        if (!Auth::user()->admin) {
            $followers = Follower::has('post')->has('user')->with('post')->with('user')->where('user_id', Auth::id())->get();
        } else {
            $followers = Follower::has('post')->has('user')->with('post')->with('user')->get();
        }
        return view('admin.follows.index')
            ->with('followers', $followers);

    }

    public function follow($id)
    {
        if (Auth::user()) {

            $exists = Follower::where('user_id', Auth::id())->where('post_id', $id)->get()->first();
            if (!$exists) {

                $post = Post::find($id);

                if ($post) {
                    if ($post->user_id != Auth::id()) {
                        $follow = Follower::create([

                            'post_id' => $id,
                            'user_id' => Auth::id(),

                        ]);
                        Session::flash('success', 'Followed successfully');
                    } else {
                        Session::flash('error', 'You can not follow your post');
                    }
                } else {
                    Session::flash('error', 'Post do not exists');
                }
            } else {
                Session::flash('error', 'You have already followed this post');
            }


        } else {
            Session::flash('error', 'Please login first!');
        }

        return redirect()->back();

    }

    public function destroy($id)
    {

        $followers = Follower::find($id);
        $followers->delete();
        Session::flash('success', 'You successfully deleted follower!');
        return redirect()->back();

    }

}
