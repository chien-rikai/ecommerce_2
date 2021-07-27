import '../../../style/css/Style.css';
import logo from '../../../style/images/logo.jpg';
import {Button,FormControl,MenuItem,InputLabel,Select} from '@material-ui/core';
import {FaCartPlus} from 'react-icons/fa';
import {Dropdown} from 'react-bootstrap';
import { Link } from 'react-router-dom';
import { useDispatch, useSelector } from 'react-redux';
import { useEffect } from 'react';
import { loadCartAction } from '../../../redux/actions/CartAction';
import { calcTotal } from '../../../utils/CartHelper';
import { formatPrice } from '../../../utils/PriceHelper';
export const HeaderComponent=()=>{
    function TranslateClick(lang){
      localStorage.setItem('lang', lang);
      window.location.reload();
    }
    const cart = useSelector((state)=>state.cart);
    const dispatch = useDispatch();
    useEffect(()=>{
      dispatch(loadCartAction())
    },[])
    return(
        <header>
            <div className="header-top">
                <div className="container">
                    <div className="row">
                      <div className="col-lg-3 col-md-4">
                      </div>
                      <div className="col-lg-9 col-md-8">
                        <div className="header-top-right">
                          <ul className="ht-menu">
                          <li>
                          <Dropdown>
                            <Dropdown.Toggle variant="success" id="dropdown-basic">
                              hoangduc12
                            </Dropdown.Toggle>
                            <Dropdown.Menu>
                              <Dropdown.Item href="">Profile</Dropdown.Item>
                              <Dropdown.Item href="">Logout</Dropdown.Item>
                            </Dropdown.Menu>
                          </Dropdown>
                          </li>
                          {/* <li>
                            <div className=""><span><a href=""></a></span>
                            </div>
                          </li> */}
                          <li>
                          <div className="ht-language-trigger"><span>Language</span></div>
                            <div className="language ht-language">
                            <ul className="ht-setting-list">
                              <li><a onClick={() => TranslateClick('en')} href="">English</a></li>
                              <li><a onClick={() => TranslateClick('vi')} href="">Vietnamese</a></li>
                            </ul>
                          </div>
                            <Select value={1}>
                              <MenuItem value={1}>Vietnamese</MenuItem>
                              <MenuItem value={2}>English</MenuItem>
                            </Select>
                          </li>
                          </ul>
                        </div>
                      </div>    
                    </div>
                </div>
            </div>
            <div className="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
              <div className="container">
                <div className="row">
                <div className="col-lg-3">
                  <div className="logo pb-sm-30 pb-xs-30">
                  <a href="#">
                    <img src={logo} alt=""/>
                  </a>
                  </div>
                </div>
                <div className="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                <form action="" method="GET" className="hm-searchbox">
                  <select name="category_id" className="nice-select select-search-category">
                    <option value="0">All</option>
                    <option value="2">TV</option>
                  </select>
                  <input type="text" name="name" placeholder="Search"/>
                  <button className="li-btn" type="submit"><i className="fa fa-search"></i></button>
                  </form>
                  <div className="header-middle-right">
                    <ul className="hm-menu">
                      <li className="hm-minicart">
                        {/* <div className="hm-minicart-trigger">
                          <span className="item-icon"></span>
                          <span className="item-text" id="cart-total">60000(vnd)
                          <span className="cart-item-count">0</span>
                           </span> 
                        </div> 
                        <div className="minicart">
                          <div className="minicart-button">
                            <a href="" className="li-button li-button-fullwidth li-button-dark">
                              <span></span>
                            </a>
                            <a href="" className="li-button li-button-fullwidth">
                              <span></span>
                            </a>
                          </div>
                        </div> */}
                        <Link to='/cart'>
                        <Button
                          variant='contained'
                          color='secondary'
                          className='cart'
                          startIcon={<FaCartPlus/>}
                        >
                          {formatPrice(calcTotal(cart))}
                        </Button>
                        </Link>
                        
                      </li>  
                    </ul>
                  </div>    
                </div>
                </div>  
              </div>
            </div>  
            <div className="header-bottom mb-0 header-sticky stick d-none d-lg-block d-xl-block">
              <div className="container">
                <div className="row">
                  <div className="col-lg-12">
                    <div className="hb-menu">
                    <nav>
                    <ul>
                      <li><a href="/">Home</a></li>
                      <li><a href=""></a></li>
                    </ul>
                    </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="mobile-menu-area d-lg-none d-xl-none col-12">
              <div className="container">
                <div className="row">
                  <div className="mobile-menu">
                  </div>
                </div>
              </div>
            </div>
        </header>
    );
}