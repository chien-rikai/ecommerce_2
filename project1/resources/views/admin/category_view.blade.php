@extends('admin.layout.layout')
@section('content')

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <h2>{{__('lang.new-list')}}</h2>
      </div>
      <div class="col-sm-4">
        <label>Status</label>
        <div>
          <label class="radio-inline">
            <input type="radio" class="status" value="all" checked="true">
            All
          </label>
          <label class="radio-inline">
            <input type="radio" class="status" value="trashed" class="required" title="*">
            Trashed
          </label>
        </div>
      </div>
      <div class="col-sm-4">
        <a type="button" class="btn-sm btn-primary new-btn" href="{{route('category.create')}}">{{__('lang.add')}}</a>
      </div>
    </div>
    <div id="table-categories">
      @include('admin.table.categories')
    </div>
  </div>
</body>
<script src="/js/categories.js"></script>
@endsection