@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Follows list</h1>
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
                            Tags
                        </div>
                        <div class="card-body">
                            <table class=" table table-hover">
                                <thead>
                                <th>Follows</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @if($followers->count()>0)
                                    @foreach($followers as $follower)
                                        <tr>
                                            <td>
                                                <a href="{{route('post.single', ['slug' =>$follower->post->slug])}}">{{$follower->post->title}}</a>
                                            </td>
                                            <td>
                                                <form method="post" action="{{route('followers.delete', ['id' => $follower->id])}}">
                                                    {{csrf_field()}}
                                                    <button class="btn btn-xs btn-danger" type="submit" class=""><span class="fa fa-trash"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th colspan="3" class="text-center">No followers yet!</th>
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
