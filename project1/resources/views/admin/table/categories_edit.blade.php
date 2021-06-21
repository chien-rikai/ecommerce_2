@if(!blank($categories))
<div class="form-group ">
  <label for="">{{__('lang.multi-level')}}</label>
  <select name="parent_id_1" class="form-control">
    <option value="" selected>{{__('lang.parent')}}</option>
    @foreach($categories as $row)
    @if($category->parent_id == $row->id or $parent->parent_id == $row->id)
    <option value="{{$row->id}}" selected>{{$row->name}}</option>
    @else
    <option value="{{$row->id}}">{{$row->name}}</option>
    @endif
    @endforeach
  </select>
</div>
@endif