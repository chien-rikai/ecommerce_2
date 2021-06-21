<!DOCTYPE html>
<html>
<head>
  <title>{{__('lang.manage')}}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
  <script src="/js/jquery-1.12.4.js"></script>
  <link href="/css/toggle_status.css" rel="stylesheet" />
  <link href="/css/app.css" rel="stylesheet" />
  <link href="/css/basic.css" rel="stylesheet" />
  <link href="/css/materialdesignicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css" integrity="sha512-FEQLazq9ecqLN5T6wWq26hCZf7kPqUbFC9vsHNbXMJtSZZWAcbJspT+/NEAQkBfFReZ8r9QlA9JHaAuo28MTJA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @include('admin.layout.footer') 
  @stack('style')
  @stack('script')
</head>
<body>
  <div class="container-scroller" id="app">
    @include('admin.layout.header')
    <div class="container-fluid page-body-wrapper">
      @include('admin.layout.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  <!-- base js -->
  <script src="/js/vendor/app.js"></script>
  <script src="/js/vendor/off-canvas.js"></script>
  <script src="/js/vendor/hoverable-collapse.js"></script>
  <script src="/js/vendor/misc.js"></script>
  <script src="/js/vendor/settings.js"></script>
</body>
</html>