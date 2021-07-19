import { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux"
import { Redirect } from "react-router-dom";
import { CheckoutForm } from "../components/web/checkout/CheckoutForm"
import { CheckoutTotal } from "../components/web/checkout/CheckoutTotal"
import { getusers } from "../components/web/common/GetUser";
import { loadCartAction } from "../redux/actions/CartAction";
export const CheckoutContainer =()=>{
    const cart = useSelector((state)=>state.cart);
    const user = useSelector((state)=>state.user);
    return(
        <>
        {cart.length==0?(<Redirect to='/home'/>):(
          <div class="container">
          <div class="row">
              <div class="col-lg-6 col-12">
                  <CheckoutForm user={user[0]} cart={cart}/>
              </div>
              <div class="col-lg-6 col-12">
                  <div class="your-order">
                      <h3>Your order</h3>
                      <div class="your-order-table table-responsive">
                          <CheckoutTotal cart={cart}/>
                      </div>
                      <div class="payment-method">
                              <div class="order-button-payment">
                                  <input value="Order" type="submit" form="checkout-form"/>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        )}
    
        </>
    )
}