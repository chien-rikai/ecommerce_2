<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile not-navigation-link">
            <div class="nav-link">
                <div class="user-wrapper">
                    <a>Ecommerce</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('statistic.index')}}">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">{{__('lang.statistic')}}</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-expanded="true" aria-controls="basic-ui">
                <i class="menu-icon mdi mdi-dna"></i>
                <span class="menu-title">{{__('lang.manage')}}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="basic-ui">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('category.index')}}">{{__('lang.cate')}}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('product.index')}}">{{__('lang.product')}}</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{route('order.index')}}">
                <i class="menu-icon mdi mdi mdi-cart"></i>
                <span class="menu-title">{{__('lang.order')}}</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{route('user.index')}}">
                <i class="menu-icon mdi mdi mdi-account"></i>
                <span class="menu-title">{{__('lang.user')}}</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="">
                <i class="menu-icon mdi mdi-react"></i>
                <span class="menu-title">{{__('lang.request')}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logout') }}">
                <i class="menu-icon fa fa-sign-out"></i>
                <span class="menu-title">{{__('lang.logout')}}</span>
            </a>
        </li>
    </ul>
</nav>
