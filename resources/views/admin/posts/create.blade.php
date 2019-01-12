@extends('layouts.app')

@section('content')

    @if(count($errors) > 0)
        <ul class="list-group my-3">

            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{$error}}
                </li>
            @endforeach

        </ul>
    @endif

    <div class="card card-default">
        <div class="card-header">
            Create new post
        </div>
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" >
                
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name='title' class="form-control">
                </div>

                <div class="form-group">
                    <label for="category">Select a category</label>
                    <select id="category" name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-check">
                    <label for="tags" >Select tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label class="form-check-label">
                                <input type="checkbox" name="tags[]" class="form-check-input" value="{{$tag->id}}">
                                {{$tag->name}}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                        <label for="featured">Featured image</label>
                        <input type="file" name='featured' class="form-control">
                </div>

                <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name='content' id='content' cols='5' rows='5' class="form-control-file"></textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success btn-block" type='submit'>
                            Store post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
