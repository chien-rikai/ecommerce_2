import { call, takeEvery } from "redux-saga/effects";
import { loadState, removeProductFromCart, setCart } from "../../services/localStorage";
import { addToCartAction,changeQuantityAction,loadCartAction, removeProductAction } from "../actions/CartAction";
import { addToCart ,loadCart, removeProduct} from "../reducers/CartReducer";
import { put } from "@redux-saga/core/effects";
import { onBusy, onError, onSuccess } from "../reducers/CommonReducer";
import { yellow } from "@material-ui/core/colors";
function* addProduct(action){
    console.log(action.payload);
    try{
        yield put(onBusy(true));
        yield setCart(action.payload);
        const cart = loadState();
        yield put(addToCart(cart));
        yield put(onSuccess('Add to cart successfully!'));
        window.alert('Add to cart successfully! ');
    }
    catch(error){
        yield put(onError(error))
    }
    yield put(onBusy(false));
    
}
function* load(){
    const cart = loadState();
    if(cart===undefined)
        return;
    yield put(loadCart(cart));    
}
function* update(action){
    yield put(onBusy(true));
    yield setCart(action.payload);
    const cart = loadState();
    yield put(addToCart(cart));
    yield put(onBusy(false));
}
function* remove(action){
    yield put(onBusy(true));
    yield removeProductFromCart(action.payload);
    yield put(removeProduct(action.payload));
    yield put(onBusy(false));
}
export const cartSaga=[
    takeEvery(addToCartAction,addProduct),
    takeEvery(loadCartAction,load),
    takeEvery(changeQuantityAction,update),
    takeEvery(removeProductAction,remove)
]
 
