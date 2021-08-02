import { useDebugValue, useEffect } from "react"
import { useDispatch, useSelector } from "react-redux"
import { Link } from "react-router-dom";
import { CartElement } from "../components/web/cart/CartElement"
import { calcTotal } from "../utils/CartHelper";
import { formatPrice } from "../utils/PriceHelper";

export const CartContainer =()=>{
    const cart = useSelector((state)=>state.cart);
    return(
        <div class="container">
    <div class="row">
        <div class="col-12">
            <form action="#">
                <div class="table-content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="li-product-remove">Remove</th>
                                <th class="li-product-thumbnail">Image</th>
                                <th class="cart-product-name">Name</th>
                                <th class="li-product-price">Price(VND)</th>
                                <th class="li-product-quantity">quantity</th>
                                <th class="li-product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            {
                                cart.products===null?(<></>):cart.products.map((e)=><CartElement key={e.id} item={e}/>)
                            }
                            
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-5 ml-auto">
                        <div class="cart-page-total">
                            <h2>Total</h2>
                            <ul>
                             <li>Total<span id="totals">{formatPrice(calcTotal(cart))}</span></li>
                            </ul>
                            <Link to='/payment'>Checkout</Link>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    )
}