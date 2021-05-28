@extends('web.layouts.layout')
@section('content')
<div class="container">
    <div class="row single-product-area">
        <div class="col-lg-5 col-md-6">
            <!-- Product Details Left -->
            <div class="product-details-left">
                <div class="product-details-images slider-navigation-1">
                    <div class="lg-image">
                        <img src="https://cdn.tgdd.vn/Products/Images/1942/219650/ffalcon-40sf1-9-550x340.jpg" alt="product image">
                    </div>
                </div>
            </div>
            <!--// Product Details Left -->
        </div>

        <div class="col-lg-7 col-md-6">
            <div class="product-details-view-content sp-normal-content pt-60">
                <div class="product-info">
                    <h2>Today is a good day Framed poster</h2>
                    <div class="rating-box pt-20">
                        <ul class="rating rating-with-review-item">
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                        </ul>
                    </div>
                    <div class="price-box pt-20">
                        <span class="new-price new-price-2">$57.98</span>
                    </div>
                    <div class="product-desc">
                        <p>
                            <span>Description
                            </span>
                        </p>
                    </div>
                    <div class="single-add-to-cart">
                        <form action="#" class="cart-quantity">
                            <div class="quantity">
                                <label>{{__('lang.quantity')}}</label>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" type="text">
                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                </div>
                            </div>
                            <button class="add-to-cart" type="submit">{{__('lang.add-to-cart')}}</button>
                        </form>
                    </div>
                    <div class="product-additional-info">
                        <div class="product-social-sharing">
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
