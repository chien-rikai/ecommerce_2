@extends('admin.layout.layout')
@section('content')

<body>
    <div class="container">
        <form id="search-form">
            <div class="row">
                <div class="col-sm-12">
                <label>Status</label>
                <div>
                    <label class="radio-inline">
                        <input type="radio" class="status-order" value="all" checked="true">
                        All
                    </label>
                    @foreach($status as $key=>$st)
                    <label class="radio-inline">
                        <input type="radio" class="status-order" value="{{$key}}" class="required" title="*">
                        {{__('lang.'.$key)}}
                    </label>
                    @endforeach
                </div>
            </div>
            </div>
        </form>
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
                    <th>{{__('lang.orders-address')}}</th>
                    <th>{{__('lang.orders-status')}}</th>
                    <th>{{__('lang.feature')}}</th>
                </tr>
            </thead>
            <tbody class="data-content">
              @include('admin.orders_view')
            </tbody>
        </table>
    </div>
</body>
@include('admin.script.order_script')
@endsection
