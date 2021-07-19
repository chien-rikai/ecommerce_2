import { useEffect, useState } from "react"
import { useParams } from "react-router-dom";
import { DetailContainer } from "../../../containers/DetailContainer"
import ApiClient from "../../../services/Api";
import { showProductApi } from "../../../services/ApiImpl";

export const DetailPage =()=>{
    const {id}= useParams();
    const [product,setProduct]=useState(null);
    async function showProduct(){
        await ApiClient.get('/web.com/products/'+id).then((response)=>{
            setProduct(response.product); 
        }).catch((err)=>{
        });
    }
    useEffect(()=>{
        showProduct();
    },[])
    return(
        <>  {<DetailContainer product={product}/>} 
        </>
    )
}