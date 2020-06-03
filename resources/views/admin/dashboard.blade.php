@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
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
                </div>
            </div>
        </div>
    </div>
@endsection
