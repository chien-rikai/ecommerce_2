@extends('admin.layout.layout')
@section('content')
<!-- @if(Session::has('message'))
<div class="alert alert-success text-center" role="alert">
    <strong></strong> {{Session::get('message')}}
</div>
@endif -->

<body>
  <div class="container">
    <div class="row list-product">
      @include('common.success')
      @include('common.fail')
      @include('common.error')
      <div class="col-sm-4">
        <h2>{{__('lang.product-list')}}</h2>
      </div>
      <div class="col-sm-4">
        @include('admin.form.product_search')
      </div>
      <div class="col-sm-2">
        <a type="button" class="products-add-btn" href="{{route('product.create')}}">{{__('lang.add')}}</a>
      </div>
    </div>
    <br>
    <div class="col-sm-10" id="table-products">
      @include('admin.table.products')
    </div>
    <input type="hidden" id="delete-value" value="{{__('lang.delete-product')}}">
  </div>
  @include('admin.layout.footer')
</body>
<script src="/js/product-search.js"></script>
@endsection