@if(!blank($categories))
<div class="form-group ">
  <label for="">{{__('lang.type')}}</label>
  <select name="category_id_2" class="form-control">
    <option value="" selected>{{__('lang.other')}}</option>
    @foreach($categories as $row)
      @if(!empty($productCate2))
        @if($productCate2->category_id == $row->id)
          <option value="{{$row->id}}" selected>{{$row->name}}</option>
        @else
          <option value="{{$row->id}}">{{$row->name}}</option>
        @endif
      @else
        <option value="{{$row->id}}">{{$row->name}}</option>
      @endif
    @endforeach
  </select>
</div>
@endif