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
            </div>
        </div>
    </div>
    @include('admin.includes.disqus')

@endsection