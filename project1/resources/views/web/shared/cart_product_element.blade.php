@if(!blank($cart))
@foreach($cart as $key=>$item)
@if($key!='total')
<tr id="product-id-{{$key}}" class="product">
    <input type="hidden" class="idProduct" name="idProduct" value="{{$key}}">
    <td class="li-product-remove"><a class="remove"><i class="fa fa-times"></i></a></td>
    <td class="li-product-thumbnail"><a href="{{route('web.product.show',[$key])}}">
            <!--product image-->
            <img class="thumbnail-img" src="images/{{$item['url_img']}}" alt="Li's Product Image"></a></td>
    <!--product name-->
    <td class="li-product-name"><a href="#">{{$item['name']}}</a></td>
    <!--product price-->
    <td class="li-product-price"><span id="base_price_{{$key}}">{{$item['base_price']}}</span></td>
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
    <td class="product-subtotal"><span id="amount_{{$key}}">{{$item['total']}}</span></td>
</tr>
@endif
@endforeach
<!--end loop-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".qtybutton").on("click", function () {
            var $button = $(this);
            var oldValue = $button.parent().children("#quantity").val();
            var id = $button.parent().children('.id').val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            $button.parent().children("#quantity").val(newVal);
            $.ajax({
                url: 'cart/' + id,
                type: 'PUT',
                cache: false,
                data: {
                    _token: '{{ csrf_token() }}',
                    quantity: newVal,
                    id: id
                }
            }).done(function (res) {
                if (res.hasUpdate) {
                    $button.parent().children("#quantity").val(newVal);
                    var total = res.cart.total;
                    total = total.toLocaleString('it-IT', {
                        style: 'currency',
                        currency: 'VND'
                    });
                    $('#cart-total').text(total);
                    $('#amount_' + id).text(res.cart[id].total);
                    $('#totals').text(total);
                } else {
                    console.log(res.message);
                }
            });
            console.log(newVal);
        });
        $(".remove").on("click", function () {
            var $button = $(this);
            var id = $button.parent().parent().children('.idProduct').val();
            if (confirm("{{__('lang.delete-product')}}")) {
                $.ajax({
                    url: "/cart/" + id,
                    type: "DELETE",
                    cache: false,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                }).done(function (res) {
                    if (res.hasRemove) {
                        var total = res.cart.total;
                        total = total.toLocaleString(
                            'it-IT', {
                                style: 'currency',
                                currency: 'VND'
                            });
                        $('#cart-total').text(total);
                        $('#totals').text(total);
                        $("#product-id-" + id).remove();
                    } else {
                        console.log(res.message);
                    }
                });
            }
        });
    });

</script>
@endif
