import { FilterBar } from '../components/web/Filter/FilterBar';
import banner from '../style/images/banner.jpg';
import { ProductList } from '../components/web/product/ProductList';
import { useDispatch } from 'react-redux';

export const HomeContainer= ({products,common})=>{
    console.log(products.products.data);
    return (
        <>
            <div class="container">
    <div class="row">
        <div class="col-lg-9 order-1 order-lg-2">
            <div class="shop-page-banner">
                <a href="#">
                    <img src={banner} alt="Banner"/>
                </a>
            </div>
            <FilterBar />
            {
                !common.isBusy&&common.isSuccess?<ProductList products={products}/>:<div>Loading</div>
            }
        </div>
        <div class="col-lg-3 order-2 order-lg-1">
        </div>
    </div>
</div>
        </>
    );
}