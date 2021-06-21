<form method="post" action="{!! route('category.update', ['{{$category->id}}']) !!}" class="table-view">
  @csrf
  {{ method_field('PATCH') }}
  <input type="hidden" name="id" value="{{$category->id}}">
  <div class="form-group">
    <label>{{__('lang.name-cate')}}</label>
    <input type="text" class="form-control" name="name" value="{{$category->name}}" />
  </div>
  <?php
    $parent = $category->parentCategory;
  ?>
  <div class="form-group ">
    <label for="">{{__('lang.multi-level')}}</label>
    <select name="parent_id" id="category-id" class="form-control">
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
  <div class="select-category">
    @if(!blank($parent))
      @foreach($categories as $row)
        @if($parent->parent_id == $row->id)
          @include('admin.table.categories_edit',['category' => $category, 'categories' => $row->subcategory])
        @endif
      @endforeach
    @endif
  </div>
  <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i>{{__('lang.edit')}}</button>
</form>