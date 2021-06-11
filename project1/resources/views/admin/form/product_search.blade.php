<select name="category_id" id="category_id" class="select-products">
  <!-- code category below-->
  <option value="0">All</option>
  @foreach($categories as $category)
  <option value="{{$category->id}}">{{$category->name}}</option>
  @endforeach
  <!-- code category -->
</select>
<input class="input-products-search" type="text" id="name" name="name" placeholder="{{__('lang.enter-search')}}">
<button class="li-btn" id="search-id" type="submit"><i class="fa fa-search"></i></button>