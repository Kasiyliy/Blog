<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
    <div class="sidebar-box pt-md-4">
        <form action="{{route('index')}}" class="search-form">
            <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" value="{{request()->search? request()->search : ''}}" name="search"
                       class="form-control"
                       placeholder="Type a keyword and hit enter">
            </div>
        </form>
    </div>
    @if($categories)
        <div class="sidebar-box ftco-animate">
            <h3 class="sidebar-heading">Categories</h3>
            <ul class="categories">
                <li><a href="{{route('index')}}">All</a></li>
                @foreach($categories as $category)
                    <li><a href="{{route('index', ['category_id' => $category->id])}}">{{$category->name}}
                            <span>({{$category->posts_count}})</span></a></li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($tags)
        <div class="sidebar-box ftco-animate">
            <h3 class="sidebar-heading">Tags</h3>
            <ul class="tagcloud">
                @foreach($tags as $tag)
                    <a href="{{route('index', ['tag_id' => $tag->id])}}" class="tag-cloud-link">{{$tag->name}}</a>
                @endforeach
            </ul>
        </div>
    @endif
</div><!-- END COL -->