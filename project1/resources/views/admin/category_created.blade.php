@extends('admin.layout.layout')
@section('content')

<body>
  <div class="container">
    @include('common.success')
    @include('common.fail')
    @include('common.error')
    <h2>{{__('lang.add-cate')}}</h2>
    <form method="post" action="{{route('category.add')}}" class="table-view">
      @csrf
      <div class="form-group">
        <label>{{__('lang.name-cate')}}</label>
        <input type="text" class="form-control" name="category" placeholder="{{__('lang.enter-cate')}}" />
      </div>
      <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i>{{__('lang.add')}}</button>
    </form>
  </div>
</body>
@endsection