@extends('web.layouts.layout')
@section('content')
@include('common.success')
@include('common.fail')
<div class="container">
  <div class="row single-product-area">
    <div class="col-lg-5 col-md-6">
      <!-- Product Details Left -->
      <div class="product-details-left">
        <div class="product-details-images slider-navigation-1">
          <div class="lg-image">
            <img src="/images/{{$product->url_img}}" alt="product image">
          </div>
        </div>
      </div>
      <!--// Product Details Left -->
    </div>
    <div class="col-lg-7 col-md-6">
      <div class="product-details-view-content sp-normal-content pt-60">
        <div class="product-info">
          <h2>{{$product->name}}</h2>
          <div class="rating-box pt-20">
            <ul class="rating rating-with-review-item" id="starRating">
            </ul>
          </div>
          <div class="price-box pt-20">
            <span class="new-price new-price-2">{{number_format($product->new_price)}}{{__('lang.vnd')}}</span>
            <span class="new-price-1"><del>{{number_format($product->price)}}{{__('lang.vnd')}}</del></span>
          </div>

          <div class="single-add-to-cart">
            <div class="cart-quantity">
              <div class="quantity">
                <label>{{__('lang.quantity')}}</label>
                <div class="cart-plus-minus">
                  <input type="hidden" class="id" name="id" value="{{$product->id}}">
                  <input class="cart-plus-minus-box" id="quantity" value="1" type="text">
                  <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                  <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                </div>
                <button class="add-to-cart">{{__('lang.add-to-cart')}}</button>
                <div class="single-add-to-cart">
                  <div class="cart-quantity">
                    <div class="quantity mt-20">
                      <label>{{__('lang.status')}}
                      @if($product->status == 1)
                      {{__('lang.in-stock')}}</label>
                      @else
                      {{__('lang.out-stock')}}</label>
                      <button class="suggest-more" onclick="SuggestMore()">{{__('lang.suggest-more')}}</button>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-additional-info">
              <div class="product-social-sharing">
                <ul>
                  <div class="fb-share-button" data-href="http://web.com/product/{{$product->id}}" data-layout="button_count" data-size="small">{{__('lang.share')}}</div>
                </ul>
              </div>
            </div>
            <div class="product-desc">
              <p>
                <span>{{$product->describe}}
                </span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="facebook-comments" class="col-md-6">
      <h3 id="reply-title">{{__('lang.comment')}}</h3>
      <fb:comments href="http://web.com/product/{{$product->id}}" num_posts="5" width="100%"></fb:comments>
    </div>
  </div>
  @include('web.form.suggest_more')
  <script src="/js/suggest_more.js"></script>
  <script src="/js/add_to_cart.js"></script>
  @include('web.script.star_rating')
  @include('web.form.review_star')
  @endsection