import { calcNewPrice, calcTotal } from "../../../utils/CartHelper"
import { formatPrice } from "../../../utils/PriceHelper"

export const CheckoutTotal=({cart})=>{
    return(
        <table class="table">
    <thead>
        <tr>
            <th class="cart-product-name">Product</th>
            <th class="cart-product-total">Total (VND)</th>
        </tr>
    </thead>
    <tbody>
        {
            cart.products.map((element,index) => {
                return(<tr class="cart_item" key={index}>
                <td class="cart-product-name">{element.name}<strong class="product-quantity"> ×
                        {element.quantity}</strong></td>
                <td class="cart-product-total"><span class="amount">{formatPrice(calcNewPrice(element)*element.quantity)}</span></td>
            </tr>)
            })
        }
           
    </tbody>
    <tfoot>
        <tr class="order-total">
            <th>Total</th>
            <td><strong><span class="amount">{formatPrice(calcTotal(cart))}</span></strong></td>
        </tr>
    </tfoot>
</table>
    )
}