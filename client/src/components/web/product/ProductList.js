import { ProductElement } from './ProductElement';
export const ProductList=({products})=>{
    return (
        <div class="shop-products-wrapper">
                <div class="tab-content">
                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                        <div class="product-area shop-product-area">
                            <div class="row">
                                {
                                    products.map((e)=>{
                                        return <ProductElement key={e.id} product={e}/>
                                    })
                                }
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
    )
}