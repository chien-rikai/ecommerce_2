@extends('web.layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-12">
            @include('web.form.checkout')
        </div>
        <div class="col-lg-6 col-12">
            <div class="your-order">
                <h3>{{__('lang.your-order')}}</h3>
                <div class="your-order-table table-responsive" >
                    @if(!blank($cart))
                    <div id="table-payment-id">
                        @include('web.table.total_checkout')
                    </div>
                    @else
                    <p>{{__('lang.cart-empty')}}</p>
                    @endif
                </div>
                <div class="payment-method">
                        <div class="order-button-payment">
                            <input value="Order" type="submit" form="checkout-form">
                        </div>
                        <div id="paypal-button" class="mt-20"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/paypal_checkout.js"></script>
<script src="/js/payment_paypal.js"></script>
@endsection