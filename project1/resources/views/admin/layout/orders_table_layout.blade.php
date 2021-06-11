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
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span id="srch-status">{{__('lang.status')}}</span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" id="mnu-status">
                                    <li><a href="all">{{__('lang.all')}}</a></li>
                                    @foreach($status as $key=>$st)
                                    <li><a href="{{$key}}">{{__('lang.'.$key)}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span id="srch-field">ID</span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" id="mnu-field">
                                    <li><a href="id">ID</a></li>
                                    <li><a href="name">{{__('lang.customer-name')}}</a></li>
                                    <li><a href="address">{{__('lang.address')}}</a></li>
                                </ul>
                            </div>
                            <input type="hidden" id="txt-field" value="id">
                            <input type="hidden" id="field" value="id">
                            <input type="hidden" id="txt-status" value="all">
                            <input type="hidden" id="status" value="all">
                            <input type="text" id="txt-search" value="" class="form-control"
                                placeholder="Search for...">
                            <span class="input-group-btn" id="search">
                                <a data-toggle="tab" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
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
