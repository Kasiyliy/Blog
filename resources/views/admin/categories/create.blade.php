@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create category</h1>
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
                            Create new post
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="POST">

                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" name='name' class="form-control">
                                </div>

                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success btn-block" type='submit'>
                                            Store category
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
