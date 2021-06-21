@extends('admin.layout.layout')
@section('content')
<body>
    <div class="container">
        <form id="search-form">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-2">
                    <form role="search">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <div class="btn-group dropdown">
                                    <button type="button" class="btn btn-default dropdown-toggle"
                                        data-toggle="dropdown">
                                        <span id="srch-status">{{__('lang.status')}}</span> <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu" id="mnu-status">
                                        <a class="dropdown-item" href="all">{{__('lang.all')}}</a>
                                        @foreach($status as $key=>$st)
                                        <a class="dropdown-item" href="{{$key}}">{{__('lang.'.$key)}}</a>
                                        @endforeach
                                        <a class="dropdown-item" href="trashed">{{__('lang.trashed')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group-btn">
                                <div class="btn-group dropdown">
                                    <button type="button" class="btn btn-default dropdown-toggle"
                                        data-toggle="dropdown">
                                        <span id="srch-field">ID</span> <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu" id="mnu-field">
                                        <a class="dropdown-item" href="id">ID</a>
                                        <a class="dropdown-item" href="name">{{__('lang.customer-name')}}</a>
                                        <a class="dropdown-item" href="address">{{__('lang.address')}}</a>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="txt-field" value="id">
                            <input type="hidden" id="field" value="id">
                            <input type="hidden" id="txt-status" value="all">
                            <input type="hidden" id="status" value="all">
                            <input type="text" id="txt-search" value="" class="form-control"
                                placeholder="Search for...">
                            <span class="input-group-btn" id="search">
                                <a data-toggle="tab" class="btn btn-primary">
                                    <span class="fa fa-search"></span>
                                </a>
                            </span>
                        </div>
                    </form>
                </div>

            </div>
        </form>
        <div class="row">
            <div class="col-sm-6">
                <h2>{{__('lang.order-view')}}</h2>
            </div>
        </div>
        <div class="data-content">
            @include('admin.orders_view')
        </div>
    </div>
</body>
@include('admin.script.order_script')
@endsection
