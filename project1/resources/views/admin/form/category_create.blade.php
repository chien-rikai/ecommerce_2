<form method="post" action="{{route('category.store')}}" class="table-view">
  @csrf
  <div class="form-group">
    <label>{{__('lang.name-cate')}}</label>
    <input type="text" class="form-control" name="name" placeholder="{{__('lang.enter-cate')}}" />
  </div>
  <div class="form-group ">
    <label for="">{{__('lang.multi-level')}}</label>
    <select name="parent_id" id="category-id" class="form-control">
      <option value="" selected>{{__('lang.parent')}}</option>
      @foreach($categories as $row)
      <option value="{{$row->id}}">{{$row->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="select-category">
  </div>
  <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i>{{__('lang.add')}}</button>
</form>