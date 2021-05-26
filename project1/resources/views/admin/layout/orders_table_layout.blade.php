@extends('admin.layout.layout')
@section('content')

<body>
    <div class="container">
        <form id="search-form">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row no-gutters">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Status
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                            @foreach($status as $key=>$st)
                                <li><a href="{{route('order.filter',[$st])}}">{{__('lang.'.$key)}}</a></li>
                            @endforeach
                            </ul>
                        </div>
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
            <tbody>

                @yield('orders-data')
            </tbody>
        </table>
    </div>
</body>
@endsection
