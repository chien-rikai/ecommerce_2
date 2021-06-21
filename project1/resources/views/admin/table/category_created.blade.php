@if(!blank($categories))
<div class="form-group ">
    <label for="">{{__('lang.multi-level')}}</label>
    <select name="parent_id_1" id="category-id" class="form-control">
      <option value="" selected>{{__('lang.parent')}}</option>
      @foreach($categories as $row)
      <option value="{{$row->id}}">{{$row->name}}</option>
      @endforeach
    </select>
</div>
@endif