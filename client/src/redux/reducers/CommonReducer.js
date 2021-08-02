import { createSlice } from "@reduxjs/toolkit";
import { setState } from "../../services/localStorage";
const initialState={
    isBusy: false,
    isError: false,
    isSuccess: false,
    isLoaded:false,
    message: ''
}
const commonSlice = createSlice({
    name: 'common',
    initialState,
    reducers:{
        onBusy:(state,action)=>{
            state.isBusy= action.payload;
        },
        onLoadedSuccess:(state,action)=>{
            state.isLoaded= true;
            state.message = action.payload;
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
export const {onBusy,onLoadedSuccess,onError,onSuccess} = commonSlice.actions;
export default commonSlice.reducer;