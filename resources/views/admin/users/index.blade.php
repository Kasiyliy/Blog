@extends('layouts.admin')

@section('content')
    @include('admin.includes.errors')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
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
                            Users
                        </div>
                        <div class="card-body">
                            <table class=" table table-hover">
                                <thead>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Permissions</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @if($users->count()>0)
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <img class="img-fluid" src="/{{ $user->profile->avatar}}" alt="{{$user->name}}" width="50px" height="50px">
                                            </td>
                                            <td>
                                                <p>{{$user->name}}</p>
                                            </td>
                                            <td>
                                                @if($user->admin)
                                                    <a class = "btn-danger btn" href="{{route('user.admin.remove',['id' => $user->id])}}">Remove admin</a>
                                                @else
                                                    <a class = "btn-success btn" href="{{route('user.admin',['id'=> $user->id])}}">Make admin</a>
                                                @endif
                                            </td>

                                            <td>
                                                @if(Auth::id() !== $user->id)
                                                    <a class="btn btn-xs btn-danger text-white" href="{{route('user.delete',['id' => $user->id])}}">
                                                        <span class="fa fa-trash"></span>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th colspan="3" class="text-center">No users yet!</th>
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
