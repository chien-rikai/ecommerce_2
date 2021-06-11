@if(!blank($cart))
@foreach($cart as $key=>$item)
@if($key!='total')
<tr id="product-id-{{$key}}" class="product">
    <input type="hidden" class="idProduct" name="idProduct" value="{{$key}}">
    <input type="hidden" class="confirm" name="confirm" value="{{__('lang.delete-product')}}">
    <td class="li-product-remove"><a class="remove"><i class="fa fa-times"></i></a></td>
    <td class="li-product-thumbnail"><a href="{{route('web.product.show',[$key])}}">
            <!--product image-->
            <img class="thumbnail-img" src="/images/{{$item['url_img']}}" alt="Li's Product Image"></a></td>
    <!--product name-->
    <td class="li-product-name"><a href="#">{{$item['name']}}</a></td>
    <!--product price-->
    <td class="li-product-price"><span id="base_price_{{$key}}">{{number_format($item['base_price'])}}</span></td>
    <!--product order quantity-->
    <td class="quantity">
        <label>{{__('lang.quantity')}}</label>
        <div class="cart-plus-minus">
            <input type="hidden" class="id" name="id" value="{{$key}}">
            <input id="quantity" class="cart-plus-minus-box" value="{{$item['quantity']}}" type="text">
            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
        </div>
        </div>
    </td>
    <!--script code for changing subtotal when quantity change!!!-->
    <td class="product-subtotal"><span id="amount_{{$key}}">{{number_format($item['total'])}}</span></td>
</tr>
@endif
@endforeach
<!--end loop-->
<script src="/js/feature.js"></script>

@endif
