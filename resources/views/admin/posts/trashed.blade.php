@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Trashed posts list</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header">
                            Posts
                        </div>
                        <div class="card-body">
                            <table class=" table table-hover">
                                <thead>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Edit</th>
                                <th>Restore</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @if($posts->count() > 0)
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>
                                                <img class="img-fluid" src="{{ $post->featured }}" alt="{{$post->title}}" width="50px" height="50px">
                                            </td>
                                            <td>
                                                <p>{{ $post->title }}</p>
                                            </td>
                                            <td>
                                                <a href="{{ route('post.edit' , ['id' => $post->id]) }}" class="btn btn-xs btn-info">
                                                    <span class="fa fa-pencil"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('post.restore', ['id' => $post->id])}}" class="btn btn-xs btn-success">
                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('post.kill', ['id' => $post->id])}}" class="btn btn-xs btn-danger">
                                                    <i class="fa fa-minus-square" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th colspan="5" class="text-center">No posts yet!</th>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
