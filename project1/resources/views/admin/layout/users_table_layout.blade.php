@extends('admin.layout.layout')
@section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>{{__('lang.user')}}</h2>
            </div>
            <div class="col-sm-6">
                <label>Status</label>
                <div>
                    <label class="radio-inline">
                        <input type="radio" class="status" value="all" checked="true">
                        All
                    </label>
                    <label class="radio-inline">
                        <input type="radio" class="status" value="active" class="required" title="*">
                        Active
                    </label>
                    <label class="radio-inline">
                        <input type="radio" class="status" value="block" class="required">
                        Block
                    </label>
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
            <tbody class="data-content">
                @include('admin.users_view')
            </tbody>
        </table>
    </div>
</body>
@include('admin.script.user_script')
@endsection
