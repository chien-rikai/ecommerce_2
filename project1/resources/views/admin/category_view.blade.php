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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#category-tree">
          {{__('lang.view-tree')}}
      </button>
      </div>
    </div>
    <div id="table-categories">
      @include('admin.table.categories')
    </div>
    <div>
      @include('admin.layout.tree_view_layout')
    </div>
  </div>
</body>
<script src="/js/categories.js"></script>
@endsection