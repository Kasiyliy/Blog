@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Categories list</h1>
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
                            Categories
                        </div>
                        <div class="card-body">
                            <table class=" table table-hover">
                                <thead>
                                <th>Category name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @if($categories->count()>0)
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>
                                                {{$category->name}}
                                            </td>
                                            <td>
                                                <a href="{{route('category.edit' , ['id' => $category->id]) }}"
                                                   class="btn btn-xs btn-info">
                                                    <span class="fa fa-edit"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('category.delete', ['id' => $category->id])}}"
                                                   class="btn btn-xs btn-danger">
                                                    <span class="fa fa-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th colspan="3">No categories yet!</th>
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
