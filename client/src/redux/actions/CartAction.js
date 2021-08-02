import { createAction } from "@reduxjs/toolkit";

export const loadCartAction = createAction('cart/load');
export const addToCartAction = createAction('cart/add');
export const changeQuantityAction = createAction('cart/changeQuantityProduct');
export const removeProductAction = createAction('cart/remove');