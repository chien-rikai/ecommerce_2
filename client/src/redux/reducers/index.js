import { combineReducers } from "@reduxjs/toolkit";
import productReducer from './ProductWebReducer';
import commonReducer from './CommonReducer';
import cartReducer from './CartReducer';
import { user } from "./LoginAndRegister";
export const rootReducer =combineReducers(
    {
        products : productReducer,
        common : commonReducer,
        cart: cartReducer,
        user: user
    }
)