import { calcNewPrice } from "../utils/CartHelper"
import { formatPrice } from "../utils/PriceHelper"
import Review from "../components/web/Rating/ModalReview"

export const DetailContainer =({product})=>{
    return(
        <div className='container'>
            <div class="row single-product-area">
     { product!=null?<>          
    <div class="col-lg-5 col-md-6">
      <div class="product-details-left">
        <div class="product-details-images slider-navigation-1">
          <div class="lg-image">
           <img src={process.env.REACT_APP_RESOURCE_URL+'/images/'+product.url_img} alt="product image"/>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-7 col-md-6">
      <div class="product-details-view-content sp-normal-content pt-60">
        <div class="product-info">
          <h2>{product.name}</h2>
          <div class="rating-box pt-20">
            <ul class="rating rating-with-review-item" id="starRating">
              <Review rating={product.star_rating} id={product.id}></Review>
            </ul>
          </div>
          <div class="price-box pt-20">
            <span class="new-price new-price-2">{formatPrice(calcNewPrice(product))}</span>
            <span class="new-price-1"><del>{formatPrice(product.price)}</del></span>
          </div>

          <div class="single-add-to-cart">
            <div class="cart-quantity">
              <div class="quantity">
                <label>Quantity</label>
                <div class="cart-plus-minus">
                  <input class="cart-plus-minus-box" id="quantity" value="1" type="text"/>
                  <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                  <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                </div>
                <button class="add-to-cart">Add to cart</button>
              </div>
            </div>
          </div>
          <div class="product-additional-info">
            <div class="product-social-sharing">
              <ul>
                <div class="fb-share-button" data-href={"http://web.com/product/"+product.id} data-layout="button_count" data-size="small">Share</div>
              </ul>
            </div>
          </div>
          <div class="product-desc">
            <p>
              <span>{product.describe}
              </span>
            </p>
          </div>
        </div>
      </div>
    </div></>:<>Loading</>}
  </div>
        </div>
    )
}