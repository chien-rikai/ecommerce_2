@extends('admin.layout.layout')
@section('content')

<body>
  <div class="container">
    @include('common.success')
    @include('common.fail')
    @include('common.error')
    <h2>{{__('lang.edit-cate')}}</h2>
    <form method="post" action="{!! route('category.update', ['{{$category->id}}']) !!}" class="table-view">
      @csrf
      {{ method_field('PATCH') }}
      <input type="hidden" name="id" value="{{$category->id}}">
      <label>{{__('lang.parent')}}</label>
      <br>
      <select name="parent_id">
          <option value='none'>--None--</option>
          @foreach($categories as $cate)
            <option value="{{$category->id}}">{{$cate->name}}</option>
          @endforeach
        </select>
      <div class="form-group">
        <label>{{__('lang.name-cate')}}</label>
        <input type="text" class="form-control" name="name" value="{{$category->name}}" />
      </div>
      <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i>{{__('lang.edit')}}</button>
    </form>
  </div>
</body>
@endsection