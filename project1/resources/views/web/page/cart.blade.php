@extends('web.layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="#">
                <div class="table-content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="li-product-remove">{{__('lang.remove')}}</th>
                                <th class="li-product-thumbnail">{{__('lang.image')}}</th>
                                <th class="cart-product-name">{{__('lang.product')}}</th>
                                <th class="li-product-price">{{__('lang.unit-price')}}(VND)</th>
                                <th class="li-product-quantity">{{__('lang.quantity')}}</th>
                                <th class="li-product-subtotal">{{__('lang.total')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--Retrieve data-->
                            @include('web.shared.cart_product_element')
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="coupon-all">
                            <div class="coupon2">
                                <input class="button" name="update_cart" value="Update cart" type="submit">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 ml-auto">
                        <div class="cart-page-total">
                            <h2>{{__('lang.total')}}</h2>
                            <ul>
                             <li>{{__('lang.total')}} <span id="totals">{{$cart['total']}}</span></li>
                            </ul>
                            <a href="#">{{__('lang.checkout')}}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
