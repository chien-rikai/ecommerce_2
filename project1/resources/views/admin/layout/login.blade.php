<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{__('lang.login')}}</title>
    <link href="/css/basic.css" rel="stylesheet" />
    <link href="/css/order_detail.css" rel="stylesheet" />
    <link href="/css/bootstrap-3.3.7.min.css" rel="stylesheet" />

</head>

<body>
    @yield('content')                   
</body>

</html>
