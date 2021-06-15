<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{__('lang.manage')}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="/css/basic.css" rel="stylesheet" />
    <link href="/css/order_detail.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <script src="/js/jquery-1.12.4.js"></script>
    <link href="/css/toggle_status.css" rel="stylesheet" />
     @include('admin.layout.footer')
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Ecommerce</a>
            </div>
            <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown">
                        {{ __('lang.Language')}}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{!! route('user.change-language', ['vi']) !!}">VietNam</a></li>
                        <li><a href="{!! route('user.change-language', ['en']) !!}">English</a></li>
                    </ul>
                </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a class="active-menu" href=""><i class="fa fa-dashboard "></i>{{ __('lang.Home')}}</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>{{ __('lang.manage')}}<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('category.index')}}"><i
                                        class="fa fa-thumb-tack"></i>{{ __('lang.cate')}}</a>
                            </li>
                            <li>
                                <a href="{{route('product.index')}}"><i
                                        class="fa fa-product-hunt"></i>{{ __('lang.product')}}</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('order.index')}}"><i class="fa fa-thumb-tack"></i>{{ __('lang.order')}}</a>
                    </li>

                    <li>
                        <a href="{{route('user.view')}}"><i class="fa fa-user-o"></i>{{ __('lang.user')}}</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.logout') }}"><i class="fa fa-sign-in "></i>{{ __('lang.logout')}}</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line"> </h1>
                        <!-- body -->
                        <div>
                            @yield('content')
                        </div>
                        <!-- end body -->
                    </div>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <div id="footer-sec">
            &copy;
        </div>
        <!-- /. FOOTER  -->
        <script src="/js/jquery-1.12.4.js"></script>
        <script src="/js/jquery.metisMenu.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script> -->
        <!-- <script src="/js/validations.js"></script> -->
</body>

</html>
