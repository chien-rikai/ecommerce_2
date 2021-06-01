@extends('web.layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="osahan-account-page-left shadow-sm bg-white h-100">
                <div class="border-bottom p-4">
                    <div class="osahan-user text-center">
                        <div class="osahan-user-media">
                            <img class="mb-3 rounded-pill shadow-sm mt-1" src="/images/default-avatar.jpg" alt="gurdeep singh osahan">
                            <div class="osahan-user-media-body">
                                <h6 class="mb-2">{{Auth::user()->username}}</h6>
                                <p class="mb-1">{{Auth::user()->phone}}</p>
                                <p>{{Auth::user()->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs flex-column border-0 pt-4 pl-4 pb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="orders-tab" href="{{route('profile.index')}}" aria-selected="true"><i class="fa fa-cart-arrow-down"></i>{{__('lang.order')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="orders-tab" href="{{route('member.index')}}" aria-selected="true"><i class="fa fa-credit-card-alt"></i>{{__('lang.account')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="orders-tab" href="{{route('change.password')}}" aria-selected="true"><i class="fa fa-unlock-alt"></i>{{__('lang.change-password')}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                <div class="tab-content" id="myTabContent">
                    @yield('tab')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection