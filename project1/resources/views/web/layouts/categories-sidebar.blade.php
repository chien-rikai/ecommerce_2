<div class="sidebar-categores-box mt-sm-30 mt-xs-30">
    <div class="sidebar-title">
        <h2>{{__('lang.cate')}}</h2>
    </div>
    <!-- category-sub-menu start -->
    <div class="category-sub-menu">
        <ul>
            @foreach($categories as $category)
            <li><a href="# ">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- category-sub-menu end -->
</div>
