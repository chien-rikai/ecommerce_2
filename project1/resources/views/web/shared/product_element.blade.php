<?php $column = 0?>
@foreach($products as $product)
@if($column % 3 ==0)
<div class="row">
    @endif
    <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
        <!-- single-product-wrap start -->
        <div class="single-product-wrap">
            <div class="product-image">
                <a href="">
                    <img class='product-img-home' src="images/{{$product->url_img}}" alt="Product Image">
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
                            <ul class="rating">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i>
                                </li>
                                <li class="no-star"><i class="fa fa-star-o"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h4><a class="product_name" href="{{route('web.product.show',[$product->id])}}">
                            {{$product->name}}
                        </a>
                    </h4>
                    <div class="price-box">
                        <!--product price-->
                        <span class="new-price new-price-2">{{$product->new_price}} (vnd)</span>
                        @if($product->discount!==0)
                        <span class="old-price">{{$product->price}}</span>
                        <span class="discount-percentage">{{$product->discount}}%</span>
                        @endif
                    </div>
                </div>
                <div class="add-actions">
                    <ul class="add-actions-link">
                        <li class="add-cart active">
                            <form action="{{route('cart.update',[$product->id])}}" method="POST">
                                @csrf
                                @Method('PUT')
                                <input type="hidden" value="{{$product->id}}">
                                <input type="submit" value="{{__('lang.add-to-cart')}}">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- single-product-wrap end -->
    </div>
    @if($column%3==2)
</div>
@endif
<?php $column++?>
@endforeach
@if($column%3!=2)
</div>
@endif
