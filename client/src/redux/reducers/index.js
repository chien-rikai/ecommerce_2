import { combineReducers } from "@reduxjs/toolkit";
import productReducer from './ProductWebReducer';
import commonReducer from './CommonReducer';
import cartReducer from './CartReducer';
export const rootReducer =combineReducers(
    {
        products : productReducer,
        common : commonReducer,
        cart: cartReducer
    }
)