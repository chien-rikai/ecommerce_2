<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý bán hàng</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
    <!-- <link href="/css/font-awesome.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="/css/basic.css" rel="stylesheet" />
    <!-- <link href="/css/custom.css" rel="stylesheet" /> -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<?php ini_set("memory_limit","128M");?>
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
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a class="active-menu" href=""><i class="fa fa-dashboard "></i>Trang chủ</a>
                    </li>
                    <li>
                        <a  href=""><i class="fa fa-line-chart"></i>Thống kê</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Quản lý <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('category.view')}}"><i class="fa fa-thumb-tack"></i>Danh mục</a>
                            </li>
                            <li>
                                <a href="{{route('product.view')}}"><i class="fa fa-product-hunt"></i>Sản phẩm</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cart-arrow-down"></i>Đơn hàng <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href=""><i class="fa fa-coffee"></i>Invoice</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('user.view')}}"><i class="fa fa-user-o"></i>Người dùng</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-sign-in "></i>Đăng xuất</a>
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
        <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
        <script src="/js/jquery.metisMenu.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script> -->
        <!-- <script src="/js/validations.js"></script> -->
</body>

</html>