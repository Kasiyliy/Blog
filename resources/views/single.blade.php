@extends('layouts.frontend')

@section('content')


    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="col-lg-10 col-lg-offset-1">
                    <article class="hentry post post-standard-details">

                        <h1 class="stunning-header-title text-center" style="text-decoration: underline">{{$post->title}}</h1>
                        <br>
                        <div class="post-thumb img-thumbnail thumbnail">
                            <img class="img img-responsive" src="{{$post->featured}}" alt="{{$post->title}}">
                        </div>

                    </article>
                </div>

                <!-- End Sidebar-->

            </main>
        </div>
    </div>

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            @if(!$followers)
                <form action="{{route('follow' , ['id' =>$post->id])}}" method="POST">
                    {{csrf_field()}}
                    <h2 class="post__title entry-title text-center">
                        <button class="btn btn-danger" style="color: black" type="submit">Follow</button>
                    </h2>
                </form>
            @else
                <form action="{{route('followers.delete' , ['id' =>$followers->id])}}" method="POST">
                    {{csrf_field()}}
                    <h2 class="post__title entry-title text-center">
                        <button class="btn btn-danger" style="color: black" type="submit">Unfollow</button>
                    </h2>
                </form>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="col-lg-10 col-lg-offset-1">
                    <article class="hentry post post-standard-details">


                        <div class="post__content">


                            <div class="post-additional-info">
                                <div class="post__author author vcard">
                                    Posted by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">Admin</a>
                                    </div>

                                </div>

                                <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{$post->created_at->toFormattedDateString()}}
                                </time>

                            </span>

                                <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{route('category.single', ['id' => $post->category->id])}}">{{$post->category->name}}</a>
                            </span>
                            </div>

                            <div class="post__content-info">

                                    {!! $post->content!!}

                                <div class="widget w-tags">
                                    <div class="tags-wrap">
                                        @foreach($post->tags as $tag)

                                            <a href="{{route('tag.single', ['id' => $tag->id])}}" class="w-tags-item">{{$tag->name}}</a>

                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="socials text-center">
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>

                    </article>

                    <div class="blog-details-author">

                        <div class="blog-details-author-thumb">
                            <img style="width:60px;" src="{{asset($post->user->profile->avatar)}}" alt="Author">
                        </div>

                        <div class="blog-details-author-content">
                            <div class="author-info">
                                <h5 class="author-name">{{$post->user->name}}</h5>
                            </div>
                            <p class="text">{{$post->user->profile->about}}
                            </p>
                            <div class="socials">

                                <a href="{{$post->user->profile->instagram}}" class="social__item" target="_blank">
                                    <img src="{{asset('app/svg/circle-facebook.svg')}}" alt="facebook">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{asset('app/svg/twitter.svg')}}" alt="twitter">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{asset('app/svg/google.svg')}}" alt="google">
                                </a>

                                <a href="{{$post->user->profile->youtube}}" class="social__item" target="_blank">
                                    <img src="{{asset('app/svg/youtube.svg')}}" alt="youtube">
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="pagination-arrow">


                        @if($next)
                            <a href="{{route('post.single', ['slug' => $next->slug])}}" class="btn-next-wrap">
                                <div class="btn-content">
                                    <div class="btn-content-title">Next Post</div>
                                    <p class="btn-content-subtitle">{{$next->title}}</p>
                                </div>
                                <svg class="btn-next">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </a>
                        @endif

                            @if($prev)
                                <a href="{{route('post.single', ['slug' => $prev->slug])}}" class="btn-prev-wrap">
                                    <svg class="btn-prev">
                                        <use xlink:href="#arrow-left"></use>
                                    </svg>
                                    <div class="btn-content">
                                        <div class="btn-content-title">Previous Post</div>
                                        <p class="btn-content-subtitle">{{$prev->title}}</p>
                                    </div>
                                </a>
                            @endif

                    </div>

                    <div class="comments">

                        <div class="heading text-center">
                            <h4 class="h1 heading-title">Comments</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        @include('/admin/includes.disqus')

                    </div>



                </div>

                <!-- End Post Details -->

                <!-- Sidebar-->

                <br>
                <br>
                <div class="col-lg-12">
                    <aside aria-label="sidebar" class="sidebar sidebar-right">
                        <div  class="widget w-tags">
                            <div class="heading text-center">
                                <h4 class="heading-title">ALL BLOG TAGS</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>

                            <div class="tags-wrap">
                                @foreach($tags as $tag)

                                    <a href="{{route('tag.single', ['id' => $tag->id])}}" class="w-tags-item">{{$tag->name}}</a>

                                @endforeach

                            </div>
                        </div>
                    </aside>
                </div>

                <!-- End Sidebar-->

            </main>
        </div>
    </div>

    <script src="{{ asset('js/toastr.min.js') }}" ></script>
    <script>
        toastr.options.closeButton = true;
        @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}");
        @endif

        @if(Session::has('info'))
        toastr.info("{{Session::get('info')}}");
        @endif

        @if(Session::has('error'))
        toastr.info("{{Session::get('error')}}");
        @endif

        @if(Session::has('warning'))
        toastr.info("{{Session::get('warning')}}");
        @endif

    </script>
@endsection

