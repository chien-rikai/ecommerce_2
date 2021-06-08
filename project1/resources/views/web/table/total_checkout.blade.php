<table class="table">
    <thead>
        <tr>
            <th class="cart-product-name">{{__('lang.product')}}</th>
            <th class="cart-product-total">{{__('lang.total')}}(VND)</th>
        </tr>
    </thead>
    <tbody>
      @if(!blank($cart))
      @foreach($cart as $key=>$value)
      @if($key!='total')
        <tr class="cart_item">
            <td class="cart-product-name">{{$value['name']}}<strong class="product-quantity"> ×
                    {{$value['quantity']}}</strong></td>
            <td class="cart-product-total"><span class="amount">{{number_format($value['total'])}}</span></td>
        </tr>
      @endif
      @endforeach
      @endif     
    </tbody>
    <tfoot>
        <tr class="order-total">
            <th>{{__('lang.total')}}</th>
            <td><strong><span class="amount">{{number_format($cart['total'])}}</span></strong></td>
        </tr>
    </tfoot>
</table>
