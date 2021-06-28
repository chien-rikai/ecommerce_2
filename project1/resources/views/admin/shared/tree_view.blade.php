<div id="collapseDVR3">
    <div class="tree">
        <ul>
        @foreach($categories as $category)
          @if(!$category->parent_id)
            @if(count($category->subcategories))
              <li> <span><i class="fa fa-minus-square"></i>&nbsp;{{$category->name}}</span>
              @include('admin.shared.tree_node',['categories'=>$category->subcategories])
            @else
              <li> <span>{{$category->name}}</span></li>
            @endif
          @endif
        @endforeach
        </ul>
    </div>
</div>
