import axios from "axios";
import ApiClient from "./Api";

export const fetchProductApi= ()=>{
    return ApiClient.get('/products');
}  
