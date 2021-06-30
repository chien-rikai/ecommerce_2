<div class="sidebar-categores-box mb-sm-0">
    @foreach($categories as $category)
    @if(!$category->parent_id)
    <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
        <div class="sidebar-title">
            <a href="#"><h2>{{$category->name}}</h2></a>
        </div>
        <!-- category-sub-menu start -->
        @if($category->subcategories)
        <div class="category-sub-menu">
            <ul>
                @foreach($category->subcategories as $cate)
                <li class="has-sub"><a href="#">{{$cate->name}}</a>
                @if($cate->subcategories)
                    <ul>
                        @foreach($cate->subcategories as $ct)
                            <li><a href="#">{{$ct->name}}</a></li>
                        @endforeach
                    </ul>
                @endif    
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- category-sub-menu end -->
    </div>
    @endif
    @endforeach
    <!-- category-sub-menu end -->
</div>
