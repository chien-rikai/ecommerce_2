@if(!blank($categories))
<div class="form-group ">
  <label for="">{{__('lang.type')}}</label>
  <select name="category_id_2" class="form-control">
    @foreach($categories as $row)
    <option value="{{$row->id}}">{{$row->name}}</option>
    @endforeach
    <option value="">{{__('lang.other')}}</option>
  </select>
</div>
@endif