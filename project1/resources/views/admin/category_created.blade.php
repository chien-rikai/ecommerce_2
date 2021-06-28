@extends('admin.layout.layout')
@push('style')
<link href="/css/tree_view.css" rel="stylesheet">
@endpush
@push('script')
<script src="/js/tree_view.js"></script>
@endpush
@section('content')
<body>
  <div class="container">
    @include('common.success')
    @include('common.fail')
    @include('common.error')
    <h2>{{__('lang.add-cate')}}</h2>
    <form method="post" action="{{route('category.store')}}" class="table-view">
      @csrf
      <!-- <div class="form-group"> -->
        <label>{{__('lang.parent')}}</label>
        <br>
        <select name="parent_id">
          <option value='none'>--None--</option>
          @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
      <!-- </div> -->
      <div class="form-group">
        <label>{{__('lang.name-cate')}}</label>
        <input type="text" class="form-control" name="name" placeholder="{{__('lang.enter-cate')}}" />
      </div>
      <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i>{{__('lang.add')}}</button>
    </form>
    <br>
    <hr>
    <div>
      @include('admin.shared.tree_view')
    </div>
  </div>
</body>
@endsection