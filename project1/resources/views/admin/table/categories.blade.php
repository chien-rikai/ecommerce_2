<?php $stt = 1 ?>
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
        <a class="btn btn-default btn-circle">{{$stt++}}</a>
      </td>
      <td>
        {{$row->name}}
      </td>
      <td>
        @if($row->deleted_at == null)
        <a class="btn btn-primary" href="/admin/category/{{$row->id}}/edit">
          <i class="fa fa-pencil-square-o"></i>{{__('lang.edit')}}</a>
          <input type="hidden" id="delete_confirm" value="{{__('lang.soft-delete-cate')}}">
          <a class="btn btn-danger" onclick="DeleteCategory('{{$row->id}}')">
        <i class="fa fa-trash"></i>{{__('lang.delete')}}</a></td>
        @else
          <a class="btn btn-primary" onclick="RestoreCategory('{{$row->id}}')">
          <i class="fa fa-recycle"></i>{{__('lang.restore')}}</a>
          <input type="hidden" id="delete_confirm" value="{{__('lang.delete-cate')}}">
          <a class="btn btn-danger" onclick="DeleteCategory('{{$row->id}}')">
          <i class="fa fa-trash"></i>{{__('lang.delete')}}</a></td>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>