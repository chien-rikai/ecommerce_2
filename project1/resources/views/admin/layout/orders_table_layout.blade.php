@extends('admin.layout.layout')
@section('content')
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h2>{{__('lang.order-view')}}</h2>
      </div>
    </div>
    <table class="table-view table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>{{__('lang.customer-name')}}</th>
          <th>{{__('lang.phone')}}</th>
          <th>{{__('lang.email')}}</th>
          <th>{{__('lang.orders-address')}}</th>
          <th>{{__('lang.orders-status')}}</th>
          <th>{{__('lang.feature')}}</th>
        </tr>
      </thead>
      <tbody>
        @yield('orders-data')
      </tbody>
    </table>
  </div>
</body>
@endsection