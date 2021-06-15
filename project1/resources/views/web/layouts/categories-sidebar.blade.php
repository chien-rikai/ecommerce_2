<div class="sidebar-categores-box mb-sm-0">
    <div class="sidebar-title">
        <h2>{{__('lang.cate')}}</h2>
    </div>
    <div class="category-tags">
        <ul>
        @foreach($categories as $category)
            <li><a href="{{route('home.show',[$category->id])}}">{{$category->name}}</a></li>
        @endforeach
        </ul>
    </div>
    <!-- category-sub-menu end -->
</div>
