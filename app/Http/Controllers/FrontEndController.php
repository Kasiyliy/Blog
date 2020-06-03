<?php

namespace App\Http\Controllers;

use App\Category;
use App\Follower;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $tag_id = $request->tag_id;
        $category_id = $request->category_id;
        $postsQuery = Post::with(['category', 'user'])
            ->has('category')
            ->has('user');
        if ($search) {
            $postsQuery->where(function ($query) use($search) {
                $query->where('title', 'like', "%$search%")->orWhere('content', 'like', "%$search%");
            });
        }

        if ($tag_id) {
            $postsQuery->whereHas('tags', function ($query) use ($tag_id) {
                $query->where('tags.id', $tag_id);
            });
        }

        if ($category_id) {
            $postsQuery->where('category_id', $category_id);
        }
        $posts = $postsQuery
            ->orderBy('created_at', 'descs')
            ->paginate(3);
        $categories = Category::withCount('posts')->get();
        $tags = Tag::all();
        return view('client.index', compact('categories', 'posts', 'tags'));
    }

    public function singlePost($slug)
    {
        $post = Post::with('user.profile')->where('slug', $slug)->first();

        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');

        return view('client.single')
            ->with('post', $post)
            ->with('title', $post->title)
            ->with('settings', Setting::first())
            ->with('categories', Category::take(5)->has('posts')->get())
            ->with('next', Post::find($next_id))
            ->with('prev', Post::find($prev_id))
            ->with('tags', Tag::all())
            ->with('followers', Follower::where('user_id', Auth::id())->where('post_id', $post->id)->get()->first());;
    }

    public function category($id)
    {
        $category = Category::find($id);
        return view('category')
            ->with('category', $category)
            ->with('title', $category->name)
            ->with('settings', Setting::first())
            ->with('tags', Tag::all())
            ->with('categories', Category::take(5)->has('posts')->get());
    }

    public function tag($id)
    {
        $tag = Tag::find($id);
        return view('tag')
            ->with('tag', $tag)
            ->with('title', $tag->tag)
            ->with('settings', Setting::first())
            ->with('categories', Category::take(5)->has('posts')->get());
    }
}
