@extends('admin.layout.layout')
@section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-2">
                <form role="search">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span id="srch-status">Status</span> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" id="mnu-status">
                                <li><a href="all">{{__('lang.all')}}</a></li>
                                <li><a href="active">{{__('lang.active')}}</a></li>
                                <li><a href="blocked">{{__('lang.blocked')}}</a></li>
                                <li><a href="trashed">{{__('lang.trashed')}}</a></li>
                            </ul>
                        </div>
                        @include('admin.shared.search_option')
                        <input type="text" id="txt-search" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn" id="search">
                            <a data-toggle="tab" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="data-content">
            @include('admin.users_view')
        </div>
</body>
@include('admin.script.user_script')
@endsection
