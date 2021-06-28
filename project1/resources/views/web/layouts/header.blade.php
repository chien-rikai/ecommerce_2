<header>
  <!-- Begin Header Top Area -->
  <div class="header-top">
    <div class="container">
      <div class="row">
        <!-- Begin Header Top Left Area -->
        <div class="col-lg-3 col-md-4">

        </div>
        <!-- Header Top Left Area End Here -->
        <!-- Begin Header Top Right Area -->
        <div class="col-lg-9 col-md-8">
          <div class="header-top-right">
            <ul class="ht-menu">
              <!-- Begin Setting Area -->
              @if(Auth::check())
              <li>
                @if(Auth::user()->first_name == null)
                <span class="language-selector-wrapper">{{Auth::user()->username}}</span>
                @else
                <span class="language-selector-wrapper">{{Auth::user()->first_name}}</span>
                @endif
                <div class="ht-language-trigger"><span></span></div>
                <div class="language ht-language">
                  <ul class="ht-setting-list">
                    <li><a href="{!! route('member.index') !!}">{{__('lang.profile')}}</a></li>
                    <li><a href="{!! route('change.password') !!}">{{__('lang.change-password')}}</a></li>
                    <li><a href="{!! route('logout') !!}">{{__('lang.logout')}}</a></li>
                  </ul>
                </div>
              </li>
              @else
              <li>
                <div class=""><span><a href="{{route('login.index')}}">{{__('lang.login')}}</a></span>
                </div>
              </li>
              @endif
              <!-- Setting Area End Here -->
              <!-- Begin Language Area -->
              <li>
                <div class="ht-language-trigger"><span>{{__('lang.Language')}}</span></div>
                <div class="language ht-language">
                  <ul class="ht-setting-list">
                    <li><a href="{!! route('user.change-language', ['en']) !!}">English</a></li>
                    <li><a href="{!! route('user.change-language', ['vi']) !!}">Vietnamese</a></li>
                  </ul>
                </div>
              </li>
              <!-- Language Area End Here -->
            </ul>
          </div>
        </div>
        <!-- Header Top Right Area End Here -->
      </div>
    </div>
  </div>
  </div>
  <!-- Header Top Area End Here -->
  <!-- Begin Header Middle Area -->
  <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
    <div class="container">
      <div class="row">
        <!-- Begin Header Logo Area -->
        <div class="col-lg-3">
          <div class="logo pb-sm-30 pb-xs-30">
            <a href="#">
              <img src="#" alt="">
            </a>
          </div>
        </div>
        <!-- Header Logo Area End Here -->
        <!-- Begin Header Middle Right Area -->
        <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
          <!-- Begin Header Middle Searchbox Area -->
          @include('web.form.search')
          <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15 mt-70">
          @include('web.form.fulltextsearch')
          </div>
          
          <!-- Header Middle Searchbox Area End Here -->
          <!-- Begin Header Middle Right Area -->
          <div class="header-middle-right">
            <ul class="hm-menu">
              <!-- Begin Header Middle Wishlist Area -->
              <!-- Header Middle Wishlist Area End Here -->
              <!-- Begin Header Mini Cart Area -->
              <li class="hm-minicart">
                <div class="hm-minicart-trigger">
                  <span class="item-icon"></span>
                  <span class="item-text" id="cart-total">
                    @if($cart!=null)
                    {{number_format($cart['total'])}}(VND)
                    <span class="cart-item-count">{{count($cart)-1}}</span>
                    @else
                    0 (VND)
                    @endif
                  </span>
                </div>
                <span></span>
                <div class="minicart">
                  <!--Code get product in cart below-->

                  <!--Code get product in cart end-->
                  <!-- <p class="minicart-total">{{__('lang.total')}}: <span>£80.00</span></p> -->
                  <div class="minicart-button">
                    <a href="{{route('cart.index')}}" class="li-button li-button-fullwidth li-button-dark">
                      <span>{{__('lang.view-full-cart')}}</span>
                    </a>
                    <a href="{{route('payment.index')}}" class="li-button li-button-fullwidth">
                      <span>{{__('lang.checkout')}}</span>
                    </a>
                  </div>
                </div>
              </li>
              <!-- Header Mini Cart Area End Here -->
            </ul>
          </div>
          <!-- Header Middle Right Area End Here -->
        </div>
        <!-- Header Middle Right Area End Here -->
      </div>
    </div>
  </div>
  <!-- Header Middle Area End Here -->
  <!-- Begin Header Bottom Area -->
  <div class="header-bottom mb-0 header-sticky stick d-none d-lg-block d-xl-block">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Begin Header Bottom Menu Area -->
          @include('web.list.categories')
          <!-- Header Bottom Menu Area End Here -->
        </div>
      </div>
    </div>
  </div>
  <!-- Header Bottom Area End Here -->
  <!-- Begin Mobile Menu Area -->
  <div class="mobile-menu-area d-lg-none d-xl-none col-12">
    <div class="container">
      <div class="row">
        <div class="mobile-menu">
        </div>
      </div>
    </div>
  </div>
  <!-- Mobile Menu Area End Here -->
</header>