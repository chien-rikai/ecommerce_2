@extends('web.layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9 order-1 order-lg-2">
            <div class="shop-page-banner">
                <a href="#">
                    <img src="/images/banner.jpg" alt="Banner">
                </a>
            </div>
            <!-- shop-top-bar start -->
            <div class="shop-top-bar mt-30">
                <div class="shop-bar-inner">
                    <div class="product-view-mode">
                        <!-- shop-item-filter-list start -->
                        <ul class="nav shop-item-filter-list" role="tablist">
                            <li role="presentation"><a aria-selected="true" class="active show"
                                    aria-controls="grid-view" href="#" data-toggle="tab" id="all"><i
                                        class="fa fa-th">{{ __('lang.all')}}</i></a></li>
                            <li><a aria-selected="true" class="show" aria-controls="grid-view" href="#"
                                    data-toggle="tab" id="popular"><i class="fa fa-fire">{{ __('lang.popular')}}</i></a>
                            </li>
                            <li><a aria-selected="true" class="show" data-toggle="tab" aria-controls="grid-view"
                                    href="#" id="history"><i class="fa fa-history">{{ __('lang.history')}}</i></a></li>
                        </ul>
                        <!-- shop-item-filter-list end -->
                    </div>
                    <!-- <div class="toolbar-amount">
                        <span>Showing 1 to 9 of 15</span>
                    </div> -->
                </div>
                <!-- product-select-box start -->
                <input type="hidden" class="view-types" value="all">
                <div class="product-select-box">
                    <select class="nice-select sort-by">
                        <option value="normal" selected>{{__('lang.normal')}}</option>
                        <option value="name">{{__('lang.name')}}</option>
                        <option value="price">{{__('lang.price')}}</option>
                        <option value="star_rating">{{__('lang.rating')}}</option>
                    </select>
                </div>
                <div class="product-select-box">
                    <select class="nice-select order-by">
                        <option value="asc" selected>{{__('lang.asc')}}</option>
                        <option value="desc">{{__('lang.desc')}}</option>
                    </select>
                </div>
                <!-- product-select-box end -->
            </div>
            <!-- shop-top-bar end -->
            <!-- shop-products-wrapper start -->
            <div class="shop-products-wrapper">
                <div class="tab-content">
                    @include('web.shared.product_element')
                </div>
            </div>
            <!-- shop-products-wrapper end -->
        </div>
        <div class="col-lg-3 order-2 order-lg-1">
            <!--sidebar-categores-box start  -->
            @include('web.layouts.categories-sidebar')
            <!--sidebar-categores-box end  -->
        </div>
    </div>
</div>
<script src="/js/sort.js"></script>

@endsection
