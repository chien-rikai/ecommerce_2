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
      <div class="col-sm-6">
        <h2>{{__('lang.product-list')}}</h2>
      </div>
      <div class="col-sm-6">
        <a type="button" class="btn-sm btn-primary new-btn" href="{{route('product.create')}}">{{__('lang.add')}}</a>
      </div>
    </div>
    <div id="table-products">
      @include('admin.table.products')
    </div>
    <input type="hidden" id="delete-value" value="{{__('lang.delete-product')}}">
  </div>
  @include('admin.layout.footer')
</body>

@endsection