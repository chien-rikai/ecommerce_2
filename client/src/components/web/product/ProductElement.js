import image from '../../../style/images/img_1.jpg';
export const ProductElement =({product})=>{
    return ( 
            <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                <div class="single-product-wrap">
                    <div class="product-image">
                        <a href="">
                            <img class='product-img-home' src={process.env.REACT_APP_RESOURCE_URL+'/images/'+product.url_img} alt="Product Image"/>
                        </a>
                        <span class="sticker">New</span>
                    </div>
                    <div class="product_desc">
                        <div class="product_desc_info">
                            <div class="product-review">
                                <h5 class="manufacturer">
                                    <a href="">View: 100</a>
                                </h5>
                                <div class="rating-box">
                                    Rating
                                </div>
                            </div>
                            <h4><a class="product_name" href="">
                                    {product.name}
                                </a>
                            </h4>
                            <div class="price-box">
                                <span
                                    class="new-price new-price-2">{product.price*(1-product.discount/100)}(VND)</span>
                                <span class="old-price">{product.price}</span>
                                <span class="discount-percentage">-{product.discount}%</span>
                            </div>
                        </div>
                        <div class="add-actions">
                            <ul class="add-actions-link">
                                <li class="add-cart active add">
                                  Add to cart
                                  <input type="hidden" class="id_product" value="{{$product->id}}"/>
                                  
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    )
}