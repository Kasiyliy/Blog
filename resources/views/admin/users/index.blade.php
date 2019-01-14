@extends('layouts.app')

@section('content')

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
                                <img class="img-fluid" src="{{ $user->avatar}}" alt="{{$user->name}}" width="50px" height="50px">
                            </td>
                            <td>
                                <p>{{$user->name}}</p>
                            </td>
                            <td>
                                <p>Permissions</p>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-danger text-white">
                                    <span class="fa fa-trash"></span>
                                </a>
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
@endsection
