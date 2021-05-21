@extends('admin.layout.layout')
@section('content')
<body>
    @include('common.success')
    @include('common.fail')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>{{__('lang.user')}}</h2>
            </div>
            <div class="col-sm-6">
                <div class="container">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Tất cả
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('user.view')}}/1">Block</a></li>
                            <li><a href="{{route('user.view')}}/0">Non-block</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
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
            <tbody>
                @yield('users-data')
            </tbody>
        </table>
    </div>
</body>
<script>
    function block_confirmation() {
        confirm("{{__('lang.block_confirmation')}}");
    }
    function unblock_confirmation() {
        confirm("{{__('lang.unblock_confirmation')}}");
    }
</script>
@endsection
