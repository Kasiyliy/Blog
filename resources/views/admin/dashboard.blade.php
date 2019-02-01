@extends('layouts.app')

@section('content')

    <div class="card-deck">
        <div class="card">
            <div class="card-heading text-center  bg-info">

                <h3 class="text-center"> Posted</h3>

            </div>
            <div class="card-body text-center">
                <h1 class="text-center">{{$posts_count}}</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-heading text-center  bg-danger">

                <h3 class="text-center"> Trashed</h3>

            </div>
            <div class="card-body text-center">
                <h1 class="text-center">{{$trash_posts_count}}</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-heading text-center  bg-success">

                <h3 class="text-center"> Users</h3>

            </div>
            <div class="card-body text-center">
                <h1 class="text-center">{{$users_count}}</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-heading text-center  bg-info">

                <h3 class="text-center"> Categories</h3>

            </div>
            <div class="card-body text-center">
                <h1 class="text-center">{{$categories_count}}</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-heading text-center  bg-info">

                <h3 class="text-center"> Followers</h3>

            </div>
            <div class="card-body text-center">
                <h1 class="text-center">{{$followers_count ? $followers_count : 0}}</h1>
            </div>
        </div>
    </div>
@endsection
