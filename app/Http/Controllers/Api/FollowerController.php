<?php

namespace App\Http\Controllers\Api;

use App\Follower;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function index(){
        $followers = [];
        if(!Auth::user()->admin){
            $followers = Follower::has('post')->where('user_id', Auth::id())->with('post')->with('user')->get();
        }else{
            $followers = Follower::has('post')->with('post')->with('user')->where()->all();
        }
        return response()->json( $followers );
    }

    public function show($id){

        if(Auth::user()){

            $exists = Follower::where('user_id' , Auth::id())->where('post_id' , $id)->get()->first();
            if(!$exists){

                $post = Post::find($id);

                if($post){
                    if($post->user_id != Auth::id()){
                        $follow = Follower::create([

                            'post_id' => $id,
                            'user_id' => Auth::id(),

                        ]);
                        return response()->json(['error' =>false, 'message' =>'Followed successfully'] );
                    }else{
                        return response()->json(['error' =>true, 'message' =>'You can not follow your post'] );
                    }
                }else{
                    return response()->json(['error' =>true, 'message' =>'Post do not exists!'] );
                }
            }else{
                $exists->delete();
                return response()->json(['error' =>false, 'message' =>'You successfully deleted follow!'] );
            }


        }else{
            return response()->json(['error' =>true, 'message' =>'Please login first!'] );
        }
    }

    public function check($id){
        $exists = Follower::where('user_id', Auth::id())->where('post_id', $id)->get()->first();
        if (!$exists) {
            return response()->json(['error' =>false, "message" => "not found"]);
        }else{
            return response()->json($exists);
        }
    }
}
