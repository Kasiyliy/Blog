<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Session;
use App\Post;
use Illuminate\Http\Request;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('admin.posts.index')
            ->with('posts', $posts);
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count() == 0 || $tags->count() == 0){
            Session::flash('info' , 'You must have some categories or tags');
            return redirect()->back();
        }

        return view('admin.posts.create')
            ->with('categories',$categories)
            ->with('tags' , Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' =>'required'
        ]);

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

        Session::flash('success',  'Post created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();

        $post = null;
        if(URL::previous() == route('post.trashed')){
            $post = Post::withTrashed()->where('id' , $id)->first();
        }else{
            $post = Post::findOrFail($id);
        }

        return view('admin.posts.edit')
            ->with([
                'post' => $post,
                'categories' => $categories,
                'tags' => Tag::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

            Session::flash('success', 'You successfully updated post');

            if(!$post->deleted_at){
                return redirect()->route('post.index');
            }else{
                return redirect()->route('post.trashed');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success' , 'You successfully deleted post!');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kill($id)
    {
        $post = Post::withTrashed()->where('id' , $id)->first();
        $post->forceDelete();
        Session::flash('success' , 'You successfully deleted permanently!');
        return redirect()->back();
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id' , $id)->first();
        $post->restore();
        Session::flash('success' , 'You successfully restored post!');
        return redirect()->route('post.index');
    }
}
