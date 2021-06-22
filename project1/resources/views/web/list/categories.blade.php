<div class="hb-menu hb-menu-2 d-xl-block">
  <nav>
    <ul>
      <li><a href="{{ route('home.index')}}">{{__('lang.Home')}}</a></li>
      @foreach($categories as $category)
      @if(!blank($category->subcategory))
      <li class="dropdown-holder"><a href="{{ route('home.show',[$category->id])}}">{{$category->name}}</a>
        <ul class="hb-dropdown hb-sub-dropdown">
          @foreach($category->subcategory as $category)
          @if(!blank($category->subcategory))
          <li class="sub-dropdown-holder"><a href="{{ route('home.show',[$category->id])}}">{{$category->name}}</a>
            <ul class="hb-dropdown hb-sub-dropdown">
              @foreach($category->subcategory as $category)
              <li><a href="{{ route('home.show',[$category->id])}}">{{$category->name}}</a></li>
              @endforeach
            </ul>
            @else
          <li><a href="{{ route('home.show',[$category->id])}}">{{$category->name}}</a>
            @endif
          </li>
          @endforeach
        </ul>
        @else
      <li><a href="{{ route('home.show',[$category->id])}}">{{$category->name}}</a>
        @endif
      </li>
      @endforeach
    </ul>
  </nav>
</div>