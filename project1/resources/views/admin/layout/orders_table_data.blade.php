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
    @yield('action')
    <tfoot>{{$orders->links()}}</tfoot>
</table>
