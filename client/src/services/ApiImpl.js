import ApiClient from "./Api";

export const fetchProductApi= ()=>{
    return ApiClient.get('/web.com/products');
}  
export const showProductApi =async(id)=>{
    var product =null;
    await ApiClient.get('/web.com/product/'+id).then((response)=>{
        product = response.product;
    });
    return product;

}
