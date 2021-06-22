@extends('admin.layout.layout')
@section('content')

<body>
  <div class="container">
    @include('common.success')
    @include('common.fail')
    @include('common.error')
    <h2>{{__('lang.add-product')}}</h2>
    @include('admin.form.product_create')
  </div>
  <br><br>
  <div>
  <label for="">{{__('lang.product-import-csv')}}</label>
    @include('admin.form.product_import')
  </div>
</body>
<script src="/js/product_category.js"></script>
@endsection