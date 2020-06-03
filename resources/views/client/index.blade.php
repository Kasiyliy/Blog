@extends('layouts.front')

@section('content')
    @foreach($posts as $post)
        <div class="col-md-12">
            <div class="blog-entry ftco-animate d-md-flex">
                <a href="{{route('post.single', ['slug' => $post->slug])}}" class="img img-2"
                   style="background-image: url({{asset($post->featured)}});"></a>
                <div class="text text-2 pl-md-4">
                    <h3 class="mb-2"><a href="{{route('post.single', ['slug' => $post->slug])}}">{{$post->title}}</a>
                    </h3>
                    <div class="meta-wrap">
                        <p class="meta">
                            <span>{{$post->created_at}}</span>
                            <span><a href="{{route('post.single', ['slug' => $post->slug])}}">{{$post->category->name}}</a></span>
                            {{--<span>5 Comment</span>--}}
                        </p>
                    </div>
                    <p class="mb-4">{{$post->title}}.</p>
                    <p><a href="{{route('post.single', ['slug' => $post->slug])}}" class="btn-custom">Read More <span
                                    class="ion-ios-arrow-forward"></span></a></p>
                </div>
            </div>
        </div>
    @endforeach

    <div class="col-12">
        <div class="block-27">
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            @if($posts->count() > 0)
                                @if($posts->currentPage() != 1)
                                    <li>
                                        <a href="{{route('index'). '?page='.($posts->currentPage() - 1).(request()->search ? '&search='.request()->search:'').(request()->category_id ? '&category_id='.request()->category_id:'')}}">&lt;</a>
                                    </li>
                                @endif
                                @for($i = 1; $i <= $posts->lastPage(); $i++)
                                    <li class="{{$i == $posts->currentPage() ? 'active' : ''}}">
                                        <a href="{{route('index'). '?page='.($i).(request()->search ? '&search='.request()->search:'').(request()->category_id ? '&category_id='.request()->category_id:'')}}"
                                           }}"><span>{{$i}}</span></a>
                                    </li>
                                @endfor
                                @if($posts->lastPage() != $posts->currentPage())
                                    <li>
                                        <a href="{{route('index'). '?page='.($posts->currentPage() + 1).(request()->search ? '&search='.request()->search:'').(request()->category_id ? '&category_id='.request()->category_id:'')}}"
                                           }}">&gt;</a>
                                    </li>
                                @endif
                            @else
                                <h1>No content found</h1>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection