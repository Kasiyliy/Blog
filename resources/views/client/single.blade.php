@extends('layouts.front')

@section('content')
    <h1 class="mb-3">{{$post->title}}</h1>
    <img src="{{asset($post->featured)}}" alt="" class="img-fluid mb-5">
    <p>{{$post->content}}</p>
    <div class="tag-widget post-tag-container mb-5 mt-5">
        <div class="tagcloud">
            @foreach($post->tags as $tag)
                <a href="#" class="tag-cloud-link">{{$tag->name}}</a>
            @endforeach
        </div>
    </div>

    <div class="about-author d-flex p-4 bg-light">
        <div class="row">
            <div class="col-3">
                <div class="bio mr-5">
                    <img src="{{asset($post->user->profile->avatar)}}" alt="Image placeholder" class="img-fluid mb-4">
                </div>
            </div>
            <div class="col-9">
                <div class="desc">
                    <h3>{{$post->user->name}}</h3>
                    <p>{{($post->user->profile->about)}}</p>
                </div>
                @auth
                    <div class="desc">
                        @if(!$followers)
                            <form action="{{route('follow' , ['id' =>$post->id])}}" method="POST">
                                {{csrf_field()}}
                                <h2 class="text-right">
                                    <button class="btn btn-success" type="submit">Follow</button>
                                </h2>
                            </form>
                        @else
                            <form action="{{route('followers.delete' , ['id' => $followers->id])}}" method="POST">
                                {{csrf_field()}}
                                <h2 class="text-white text-right">
                                    <button class="btn btn-danger" type="submit">Unfollow</button>
                                </h2>
                            </form>
                        @endif
                    </div>
                @endauth
                @guest
                    <div class="desc">
                        <h5 style="color: red;">Please authorize to follow this event</h5>
                    </div>
                @endguest
            </div>
        </div>
    </div>
    @include('admin.includes.disqus')

@endsection