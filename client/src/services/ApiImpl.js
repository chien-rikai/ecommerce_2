import ApiClient from "./Api";

export const fetchProductApi= ()=>{
    return ApiClient.get('/products');
}  
export const showProductApi =async(id)=>{
    var product =null;
    console.log('he');
    await ApiClient.get('/product/'+id).then((response)=>{
        product = response.product;
    });
    console.log(product);
    return product;

}