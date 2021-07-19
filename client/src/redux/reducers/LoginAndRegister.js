import { combineReducers } from "redux";
import {LoginAndRegisterTypes} from "../../constants/LoginAndRegister";

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


export const todoLogin = combineReducers({
    user: user,
});