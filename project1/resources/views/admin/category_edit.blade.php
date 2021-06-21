@extends('admin.layout.layout')
@section('content')

<body>
  <div class="container">
    @include('common.success')
    @include('common.fail')
    @include('common.error')
    <h2>{{__('lang.edit-cate')}}</h2>
    @include('admin.form.category_edit')
  </div>
</body>
<script src="/js/category_created.js"></script>
@endsection