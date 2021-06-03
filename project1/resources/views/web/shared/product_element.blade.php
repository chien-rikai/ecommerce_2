<input type="hidden" value="" name="page" id="page">
<input type="hidden" value="{{$type}}" class="type_view" name="type" id="{{$type}}">
<div id="grid-view" class="tab-pane fade active show" role="tabpanel">
    <div class="product-area shop-product-area">
        @if(!blank($products))
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                <!-- single-product-wrap start -->
                <div class="single-product-wrap">
                    <div class="product-image">
                        <a href="">
                            <img class='product-img-home' src="/images/{{$product->url_img}}" alt="Product Image">
                        </a>
                        <span class="sticker">{{__('lang.new')}}</span>
                    </div>
                    <div class="product_desc">
                        <div class="product_desc_info">
                            <div class="product-review">
                                <h5 class="manufacturer">
                                    <a href="">{{__('lang.view')}}: {{$product->view}}</a>
                                </h5>
                                <div class="rating-box">
                                    @include('web.form.rating_box')
                                </div>
                            </div>
                            <h4><a class="product_name" href="{{route('web.product.show',[$product->id])}}">
                                    {{$product->name}}
                                </a>
                            </h4>
                            <div class="price-box">
                                <!--product price-->
                                <span
                                    class="new-price new-price-2">{{number_format($product->new_price,0,'','.')}}(VND)</span>
                                @if($product->discount!==0)
                                <span class="old-price">{{number_format($product->price,0,'','.')}}</span>
                                <span class="discount-percentage">-{{$product->discount}}%</span>
                                @endif
                            </div>
                        </div>
                        <div class="add-actions">
                            <ul class="add-actions-link">
                                <li class="add-cart active">
                                    <form action="{{route('cart.store',[$product->id])}}" method="POST">
                                        @csrf
                                        @Method('POST')
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="submit" value="{{__('lang.add-to-cart')}}">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- single-product-wrap end -->
            </div>
        @endforeach
    </div>
    @endif
    </div>
</div>
@if(!blank($type)&&$type!=='history')
<div class="paginatoin-area">
    <div class="row">
        <div class="col-lg-6 col-md-6">
        </div>
        <div class="col-lg-6 col-md-6">
            @include('web.layouts.pagination',['paginator'=>$products])
        </div>
    </div>
</div>
@endif

