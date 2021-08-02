export const loadState=()=>{
    try{
        const state = localStorage.getItem('cart');
        if(state===null)
            return undefined;
        return JSON.parse(state);
    }catch(e){
        return undefined;
    }
}
export function* setCart(product){
    try{    
        let cart = localStorage.getItem('cart');
        if(cart===null||cart===undefined||cart==''){
            cart = [];
            cart.push(product);
        }else{
            cart= JSON.parse(cart);
            let index = cart.findIndex((e)=>e.id ==product.id);
            if(index>=0){
                let oldQuantity= cart[index].quantity;
                cart[index] = {...product,quantity:oldQuantity+product.quantity}
            }
            else{
                cart.push(product);
            }
        }
        localStorage.setItem('cart',JSON.stringify(cart));
    }catch(e){
    }
}
export function* removeProductFromCart(id){
    try{    
        let cart = localStorage.getItem('cart');
        if(cart===null){
            return;
        }else{
            cart= JSON.parse(cart);
            let index = cart.findIndex((e)=>e.id ==id);
            if(index>=0){
                cart.splice(index,1);
            }
        }
        localStorage.setItem('cart',JSON.stringify(cart));
    }catch(e){
    }
}