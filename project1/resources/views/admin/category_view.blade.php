@extends('admin.layout.layout')
@section('content')
<body>
  @include('common.success')
  @include('common.fail')
  @include('common.error')
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h2>{{__('lang.new-list')}}</h2>
      </div>
      <div class="col-sm-6">
        <a type="button" class="btn-sm btn-primary new-btn" href="{{route('category.create')}}">{{__('lang.add')}}</a>
      </div>
    </div>

    <table class="table-view table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
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
            <a class="btn-default btn-xs" href="/admin/category/{{$row->id}}/edit">
              <i class="glyphicon glyphicon-pencil"></i>{{__('lang.edit')}}</a>
              
            <form action="{!! route('category.delete',['{{$row->id}}']) !!}" method="POST">
              <input type="hidden" name="id" value="{{$row->id}}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn-default btn-xs" onclick="Delete();">
                <i class="glyphicon glyphicon-trash"></i>{{__('lang.delete')}}
              </button>
            </form>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
<script>
  function Delete(){
    confirm("{{__('lang.delete-cate')}}");
    
  }
</script>
@endsection
