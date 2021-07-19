import { combineReducers } from "@reduxjs/toolkit";
import productReducer from './ProductWebReducer';
import commonReducer from './CommonReducer';
export const rootReducer =combineReducers(
    {
        products : productReducer,
        common : commonReducer
    }
)