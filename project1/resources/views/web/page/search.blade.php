@extends('web.layouts.layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-3">
      <!--sidebar-categores-box start  -->
      @include('web.layouts.categories-sidebar')
      <!--sidebar-categores-box end  -->
    </div>
    <div class="col-lg-9 order-1 order-lg-2">
      <div class="single-banner shop-page-banner">
        <a href="#">
          <img src="/images/banner.jpg" alt="Banner">
        </a>
      </div>
      <!-- shop-top-bar start -->
      <div class="shop-top-bar mt-30">
        <div class="shop-bar-inner">
          <div class="product-view-mode">
            <!-- shop-item-filter-list start -->
            {{__('lang.search-result')}}
            <!-- shop-item-filter-list end -->
          </div>
          <!-- <div class="toolbar-amount">
                        <span>Showing 1 to 9 of 15</span>
                    </div> -->
        </div>
        <!-- product-select-box start -->
        <div class="product-select-box">
          <div class="product-short">
            <p>{{__('lang.sort-by')}}:</p>
            <select class="nice-select">
              <option value="trending">{{__('lang.trending')}}</option>
            </select>
          </div>
        </div>
        <!-- product-select-box end -->
      </div>
      <!-- shop-top-bar end -->
      <!-- shop-products-wrapper start -->
      <div class="shop-products-wrapper">
        <div class="tab-content">
          <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
            <div class="product-area shop-product-area">
              <!--CODE -->
              @include('common.error')
              @include('common.success')
              @include('common.fail')
              @if(!blank($products))
              @include('web.shared.product_element')
              <div class="mp50 pull-right">
                {{$products->appends(Request::all())->links()}}
              </div>
              @endif
              <!--CODE -->
            </div>
          </div>
          <!--Pagination start-->

          <!--Pagination end  -->
        </div>
      </div>
      <!-- shop-products-wrapper end -->
    </div>

  </div>
  @endsection