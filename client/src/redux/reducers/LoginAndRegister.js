import { combineReducers } from "redux";
import {LoginAndRegisterTypes} from "../../constants/LoginAndRegister";
import { OrderHistoryTypes } from "../../constants/OrderHistory";

export function user(state = [], action){
    var newState = JSON.parse(JSON.stringify(state));
    switch (action.type) {
        case LoginAndRegisterTypes.LOGIN_SUBMIT:
            newState[0] = ({
                data: action.data,
            });
            break;
        default:
            break;
    }  
    return newState;
}
function orders(state = [], action){
    var newState = JSON.parse(JSON.stringify(state));
    switch (action.type) {
        case OrderHistoryTypes.ORDER_HISTORY:
            newState[0] = ({
                data: action.orders,
            });
            break;
        default:
            break;
    }  
    return newState;
}

export const todoLogin = combineReducers({
    user: user,
    orders: orders,
});