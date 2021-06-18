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
    <div class="col-sm-4"></div>
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
    <div class="col-sm-10" id="table-products">
      @include('admin.table.products')
    </div>
  </div>
  @include('admin.layout.footer')
</body>

@endsection