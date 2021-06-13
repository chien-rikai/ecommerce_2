<table class="table-view table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>{{__('lang.user')}}</th>
            <th>{{__('lang.customer-name')}}</th>
            <th>{{__('lang.email')}}</th>
            <th>{{__('lang.phone')}}</th>
            <th>{{__('lang.address')}}</th>
            <th>{{__('lang.user-status')}}</th>
            <th>{{__('lang.feature')}}</th>
        </tr>
    </thead>
        @yield('action')
    <tfoot>{{$users->links()}}</tfoot>
</table>
