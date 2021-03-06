@extends('layouts.admin')

@section('content')
    @include('admin.includes.errors')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile</h1>
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
                            Edit your profile
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.profile.update') }}" method="POST"
                                  enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name">New Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name">Upload avatar</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name">Instagram profile</label>
                                    <input type="text" name="instagram" value="{{$user->profile->instagram}}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name">Youtube profile</label>
                                    <input type="text" name="youtube" value="{{$user->profile->youtube}}"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="about">About you</label>
                                    <textarea name="about" id="about" cols="6" rows="6"
                                              class="form-control">{{$user->profile->about}}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success btn-block" type='submit'>
                                            Update profile
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
