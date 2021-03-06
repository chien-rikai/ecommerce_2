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
import { getusers } from '../common/GetUser';
export const HeaderComponent=()=>{
    const cart = useSelector((state)=>state.cart);
    const user = useSelector((state)=>state.user);
    const dispatch = useDispatch();
    useEffect(()=>{
      dispatch(loadCartAction());
      getusers();
    },[])
      function TranslateClick(lang){
        localStorage.setItem('lang', lang);
        window.location.reload();
      }
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
                           {user.length==0?(<Button href='/login'>Login</Button>):(<Dropdown>
                            <Dropdown.Toggle variant="success" id="dropdown-basic">
                              hoangduc12
                            </Dropdown.Toggle>
                            <Dropdown.Menu>
                              <Dropdown.Item href="">Profile</Dropdown.Item>
                              <Dropdown.Item href="">Logout</Dropdown.Item>
                            </Dropdown.Menu>
                          </Dropdown>)} 
                          
                          </li>
                          <li>
                            <Select value={1}>
                              <MenuItem value={1} onClick={() => TranslateClick('vi')}>Vietnamese</MenuItem>
                              <MenuItem value={2} onClick={() => TranslateClick('en')}>English</MenuItem>
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