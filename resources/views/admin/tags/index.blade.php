@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tags list</h1>
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
                                <th>Tag name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @if($tags->count()>0)
                                    @foreach($tags as $tag)
                                        <tr>
                                            <td>
                                                {{$tag->name}}
                                            </td>
                                            <td>
                                                <a href="{{route('tag.edit' , ['id' => $tag->id]) }}" class="btn btn-xs btn-info">
                                                    <span class="fa fa-pencil"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('tag.delete', ['id' => $tag->id])}}" class="btn btn-xs btn-danger">
                                                    <span class="fa fa-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th colspan="3" class="text-center">No tags yet!</th>
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
