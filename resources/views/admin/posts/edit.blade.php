@extends('layouts.admin')

@section('content')
    @include('admin.includes.errors')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Posts edit</h1>
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
                            Edit post
                        </div>
                        <div class="card-body">
                            <form action="{{ route('post.update', ['id' => $post->id ]) }}" method="POST" enctype="multipart/form-data" >

                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name='title' class="form-control" value="{{$post->title}}">
                                </div>

                                <div class="form-group">
                                    <label for="category">Select a category</label>
                                    <select id="category" name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            @if( $category->id == $post->category_id )
                                                <option selected value="{{$category->id}}">{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-check">
                                    <label for="tags" >Select tags</label>
                                    @foreach($tags as $tag)
                                        <div class="checkbox">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="tags[]" class="form-check-input" value="{{$tag->id}}"
                                                       @foreach($post->tags as $innerTag)
                                                       @if($innerTag->id == $tag->id)
                                                       checked
                                                        @endif
                                                        @endforeach
                                                >
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
                                    <textarea name='content' id='content' cols='5' rows='5' class="form-control-file">{{$post->content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success btn-block" type='submit'>
                                            Update post
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