@extends('layouts.app')

@section('content')

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
@endsection
