import { changeQuantity } from "../redux/reducers/CartReducer";

export function calcTotal(cart){
    var total= 0;
    cart.products.forEach(element => {
        total+=calcNewPrice(element)*element.quantity;
    });
    return total;
}
export function calcNewPrice(product){
    var price = 0 ;
    price = product.price*(1-product.discount/100);
    return price;
}