@extends('admin.layout.layout')
@section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-2">
                <form role="search">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <div class="btn-group dropdown" >
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span id="srch-status">Status</span> <span class="caret"></span>
                            </button>
                                <div class="dropdown-menu" id="mnu-status">
                                    <a class="dropdown-item" href="all">{{__('lang.all')}}</a>
                                    <a class="dropdown-item" href="active">{{__('lang.active')}}</a>
                                    <a class="dropdown-item" href="blocked">{{__('lang.blocked')}}</a>
                                    <a class="dropdown-item" href="trashed">{{__('lang.trashed')}}</a>
                                </div>
                            </div>
                        </div>
                        @include('admin.shared.search_option')
                        <input type="text" id="txt-search" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn" id="search">
                            <a data-toggle="tab" class="btn btn-primary">
                                <span class="fa fa-search"></span>
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
