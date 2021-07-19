import { createSlice } from "@reduxjs/toolkit";
const initialState={
    products:[],
    viewType:'all',
    orderBy: 'normal',
    sortBy: 'asc',
    page: 1
}
const productSlice=createSlice({
    name:'product_web',
    initialState,
    reducers:{
        fetchProduct:(state,action)=>{
            state.products=action.payload;
        }
    }
});
export const {fetchProduct} = productSlice.actions;
export default productSlice.reducer;