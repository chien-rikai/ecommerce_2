<ul class="rating">

    <li class="@if($product->star_rating<1) no-star @endif"><i class="fa fa-star"></i></li>
    <li class="@if($product->star_rating<2) no-star @endif"><i class="fa fa-star"></i></li>
    <li class="@if($product->star_rating<3) no-star @endif"><i class="fa fa-star"></i></li>
    <li class="@if($product->star_rating<4) no-star @endif"><i class="fa fa-star"></i>
    </li>
    <li class="@if($product->star_rating<5) no-star @endif"><i class="fa fa-star"></i>
    </li>
</ul>
