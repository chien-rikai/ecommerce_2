@extends('web.layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="jumbotron text-center">
                <h3>{{__('lang.thanks')}}</h3>
                <p class="lead">{{__('lang.please-check-mail')}}</p>
                <hr>
                <p>
                    {{__('lang.payment-later')}}
                </p>
                <div class="payment-method">
                    <input type="hidden" id="amount" value="{{$carts['total']}}">
                    <div id="paypal-button" class="mt-20"></div>
                    <br>
                    <a href="{{route('payment.cancel')}}" class="btn btn-primary">{{__('lang.later')}}</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="your-order">
                <h3>{{__('lang.your-order')}}</h3>
                <div class="your-order-table table-responsive">
                    @if(!blank($carts))
                    @include('web.table.resume_order')
                    @else
                    <p>{{__('lang.cart-empty')}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('web.script.paypal')
@endsection
