@extends('admin.layout.layout')
@section('content')

<body>
  <div class="container">
    @include('common.success')
    @include('common.fail')
    @include('common.error')
    <h2>{{__('lang.edit-product')}}</h2>
    @include('admin.form.product_edit')
  </div>
</body>
@endsection