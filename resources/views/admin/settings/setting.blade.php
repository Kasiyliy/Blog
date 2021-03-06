@extends('layouts.admin')

@section('content')

    @include('admin.includes.errors')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Settings</h1>
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
                            Edit blog setting
                        </div>
                        <div class="card-body">
                            <form action="{{ route('settings.update') }}" method="POST">

                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="title">Site name</label>
                                    <input type="text" name='site_name' value="{{$settings->site_name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title">Address</label>
                                    <input type="text" name='address' value="{{$settings->address}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title">Contact phone</label>
                                    <input type="text" name='contact_number' value="{{$settings->contact_number}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title">Contact email</label>
                                    <input type="text" name='contact_email'  value="{{$settings->contact_email}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success btn-block" type='submit'>
                                            Update site settings
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
