import image from '../../../style/images/img_1.jpg';
import { Button,Box,Typography } from '@material-ui/core';
import { FaCartPlus, FaEye } from 'react-icons/fa';
import {Rating} from '@material-ui/lab';
import { useDispatch } from 'react-redux';
import { addToCartAction } from '../../../redux/actions/CartAction';
import { Link } from 'react-router-dom';
export const ProductElement =({product})=>{
    const dispatch = useDispatch();
    function add(){
      dispatch(addToCartAction({...product,quantity:1}));
    }
    return ( 
            <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                <div class="single-product-wrap">
                    <div class="product-image">
                        <Link to={'/product/'+product.id}>
                            <img class='product-img-home' src={process.env.REACT_APP_RESOURCE_URL+'/images/'+product.url_img} alt="Product Image"/>
                        </Link>
                        <span class="sticker">New</span>
                    </div>
                    <div class="product_desc">
                        <div class="product_desc_info">
                            <div class="product-review">
                                <h5 class="manufacturer">
                                    {<FaEye/>} &nbsp; {product.view}
                                </h5>
                                <div class="rating-box">
                                <Box mb={2} borderColor="transparent" >
                                  <Rating name="read-only" size='small' value={product.star_rating} readOnly />
                                </Box>  
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
                            <Button
                          variant='contained'
                          color='primary'
                          startIcon={<FaCartPlus/>}
                          onClick={add}
                        >Add to cart</Button>
                        </div>
                    </div>
                </div>
            </div>
    )
}