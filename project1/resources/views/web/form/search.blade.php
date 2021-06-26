<form action="{{route('search')}}" method="GET" class="hm-searchbox">
  <select name="category_id" class="nice-select select-search-category">
    <!-- code category below-->
    <option value="0">All</option>
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    <!-- code category -->
  </select>
  <input type="text" name="keys" placeholder="{{__('lang.enter-search')}}">
  <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
</form>