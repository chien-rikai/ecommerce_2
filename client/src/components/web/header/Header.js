import '../../../style/css/Style.css';
import logo from '../../../style/images/logo.jpg';
export const HeaderComponent=()=>{
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
                            <span className="language-selector-wrapper">hoangduc12</span>
                            <div className="ht-language-trigger"><span></span></div>
                              <div className="language ht-language">
                                <ul className="ht-setting-list">
                                  <li><a href=""></a>Profile</li>
                                  <li><a href=""></a>Change password</li>
                                  <li><a href=""></a>Logout</li>
                                </ul>
                              </div>
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
                        <div className="hm-minicart-trigger">
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
                        </div>
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
                      <li><a href="">Home</a></li>
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