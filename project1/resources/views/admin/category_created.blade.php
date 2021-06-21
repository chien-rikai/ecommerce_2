@extends('admin.layout.layout')
@section('content')

<body>
  <div class="container">
    @include('common.success')
    @include('common.fail')
    @include('common.error')
    <h2>{{__('lang.add-cate')}}</h2>
    @include('admin.form.category_create')
  </div>
</body>
<script src="/js/category_created.js"></script>
@endsection
