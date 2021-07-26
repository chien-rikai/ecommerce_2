import { useDispatch, useSelector } from 'react-redux';
import { useEffect } from 'react';
import { fetchProductAction } from '../../../redux/actions/ProductWebAction';
import { HomeContainer } from "../../../containers/Home";
export const HomePage =()=>{
    const dispatch = useDispatch();
    const products = useSelector((state)=>state.products);
    const common= useSelector((state)=>state.common);
    useEffect(()=>{
        dispatch(fetchProductAction());
    },[])    
    return (
        <>
         <HomeContainer products={products} common={common}/>
        </>
    );
}