<table class="table-view table table-bordered">
  @include('common.success')
  @include('common.fail')
  <thead>
    <tr>
      <th>Stt</th>
      <th>{{__('lang.name-cate')}}</th>
      <th>{{__('lang.feature')}}</th>
    </tr>
  </thead>
  <tbody>
    <?php $stt = 1 ?>
    @foreach($categories as $row)
    <tr>
      <td>
        <a class="btn btn-default btn-circle">{{$row->id}}</a>
      </td>
      <td>
        {{$row->name}}
      </td>
      <td>
        @if($row->deleted_at == null)
        <a class="btn-default btn-xs" href="/admin/category/{{$row->id}}/edit">
          <i class="glyphicon glyphicon-pencil"></i>{{__('lang.edit')}}</a>
          <input type="hidden" id="delete_confirm" value="{{__('lang.soft-delete-cate')}}">
          <a class="btn-default btn-xs" onclick="DeleteCategory('{{$row->id}}')">
        <i class="glyphicon glyphicon-trash"></i>{{__('lang.delete')}}</a></td>
        @else
          <a class="btn-default btn-xs" onclick="RestoreCategory('{{$row->id}}')">
          <i class="glyphicon glyphicon-pencil"></i>{{__('lang.restore')}}</a>
          <input type="hidden" id="delete_confirm" value="{{__('lang.delete-cate')}}">
          <a class="btn-default btn-xs" onclick="DeleteCategory('{{$row->id}}')">
        <i class="glyphicon glyphicon-trash"></i>{{__('lang.delete')}}</a></td>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>