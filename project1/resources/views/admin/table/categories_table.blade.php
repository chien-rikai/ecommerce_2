@foreach($categories as $row)
<tr>
  <td>
    {{$row->name}}
  </td>
  <td>
    @if(!empty($name))
      {{$name}}
    @endif
  </td>
  <td>
    @if($row->deleted_at == null)
    <a class="btn-default btn-xs" href="/admin/category/{{$row->id}}/edit">
      <i class="glyphicon glyphicon-pencil"></i>{{__('lang.edit')}}</a>
    <input type="hidden" id="delete_confirm" value="{{__('lang.soft-delete-cate')}}">
    <a class="btn-default btn-xs" onclick="DeleteCategory('{{$row->id}}')">
      <i class="glyphicon glyphicon-trash"></i>{{__('lang.delete')}}</a>
  </td>
  @else
  <a class="btn-default btn-xs" onclick="RestoreCategory('{{$row->id}}')">
    <i class="glyphicon glyphicon-pencil"></i>{{__('lang.restore')}}</a>
  <input type="hidden" id="delete_confirm" value="{{__('lang.delete-cate')}}">
  <a class="btn-default btn-xs" onclick="DeleteCategory('{{$row->id}}')">
    <i class="glyphicon glyphicon-trash"></i>{{__('lang.delete')}}</a></td>
  @endif
  </td>
</tr>
@if(count($row->subcategory))
@include('admin.table.categories_table',['categories' => $row->subcategory,'name' => $row->name])
@endif
@endforeach