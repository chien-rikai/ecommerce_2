import { createSlice } from "@reduxjs/toolkit";
const initialState={
    products:[]
}
const cartSlice = createSlice({
    name: 'cart',
    initialState,
    reducers:{
        loadCart:(state,action)=>{
            state.products = action.payload;
        },
        addToCart:(state,action)=>{
            state.products=action.payload;
        },
        changeQuantity:(state,action)=>{
            state.products=action.payload;
        },
        removeProduct:(state,action)=>{
            state.products= state.products.filter((e)=>e.id!=action.payload);
        },
        checkout:(state,action)=>{
            state.products=[];
        }
    }
});
export const {loadCart,addToCart,changeQuantity,removeProduct,checkout} = cartSlice.actions;
export default cartSlice.reducer;
