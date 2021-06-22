@if(!blank($categories))
<div class="form-group ">
  <label for="">{{__('lang.subcategory')}}</label>
  <select name="category_id_1" id="category-id-2" class="form-control">
    <option value="" selected>{{__('lang.other')}}</option>
    @foreach($categories as $row)
      @if(!empty($productCate))
        @if($productCate->category_id == $row->id)
          <option value="{{$row->id}}" selected>{{$row->name}}</option>
          <?php $category = $row ?>
        @else
          <option value="{{$row->id}}">{{$row->name}}</option>
        @endif
      @else
        <option value="{{$row->id}}">{{$row->name}}</option>
      @endif
    @endforeach
  </select>
</div>
<div class="select-category-2">
  @if(!empty($category))
    @foreach($categories as $row)
      @if($row->id == $category->id)
        @if(!empty($productCategory[2]))
          @include('admin.table.product_category_created_2',['categories'=> $category->subcategory,'productCate2' => $productCategory[2]])
        @else
          @include('admin.table.product_category_created_2',['categories'=> $category->subcategory])
        @endif
      @endif
    @endforeach
  @endif
</div>
@endif