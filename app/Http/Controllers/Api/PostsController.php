<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::with('tags')->get();
        return response()->json( $posts );
    }

    public function show($id){
        $post = Post::find($id);
        if($post){
            return response()->json(['success' =>true], $post );
        }else{
            return response()->json(['success' =>false, 'message' =>'not found'] );
        }
    }

    public function delete($id){
        $post = Post::find($id);
        if($post){
            if($post->user->id == Auth::id() || Auth::user()->admin){
                $post->delete();
                return response()->json(['success' =>true]);
            }
        }

        return response()->json(['success' =>false] );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' =>'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['success'=>!$validator->errors()], 401);
        }

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts',$featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => '/uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        return response()->json(['success' =>true]);
    }

    public function myPosts(){
        $user = Auth::user();
        $posts = [];
        if($user){
            $posts = Post::where('user_id', $user->id)->get();
        }

        return response()->json($posts );

    }

    public function update(Request $request, $id)
    {

        $post = Post::withTrashed()->where('id' , $id)->first();

        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required',
            'tags' =>'required'
        ]);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;

            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads/posts',$featured_new_name);

            $post->featured = '/uploads/posts/'.$featured_new_name;
        }


        $post->title= $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title);

        $post->tags()->sync($request->tags);

        $post->save();

        return response()->json(['success' => true] );

    }
}
