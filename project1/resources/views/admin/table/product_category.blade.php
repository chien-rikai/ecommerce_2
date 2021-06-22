@if(!blank($categories))
<div class="form-group ">
  <label for="">{{__('lang.subcategory')}}</label>
  <select name="category_id_1" id="category-id-2" class="form-control">
    @foreach($categories as $row)
    <option value="{{$row->id}}">{{$row->name}}</option>
    @endforeach
    <option value="">{{__('lang.other')}}</option>
  </select>
</div>
<div class="select-category-2">
  @include('admin.table.product_category_2',['categories'=> $categories[0]->subcategory])
</div>
@endif