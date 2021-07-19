import { createSlice } from "@reduxjs/toolkit";
const initialState={
    isBusy: false,
    isError: false,
    isSuccess: false,
    message: ''
}
const commonSlice = createSlice({
    name: 'common',
    initialState,
    reducers:{
        onBusy:(state,action)=>{
            state.isBusy= action.payload;
        },
        onError:(state,action)=>{
            state.isError = true;
            state.message = action.payload;
        },
        onSuccess:(state,action)=>{
            state.isSuccess=true;
            state.message = action.payload;
        } 
    }  
});
export const {onBusy,onError,onSuccess} = commonSlice.actions;
export default commonSlice.reducer;