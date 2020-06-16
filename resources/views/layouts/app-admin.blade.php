<!DOCTYPE html>
<html>

<!-- Mirrored from www.nobleui.com/laravel/template/horizontal-menu/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jan 2020 09:05:24 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>{{ config('app.name', 'SIM Ketenagaan') }}</title>
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="mwvXFYtnJj6k6GIsW95IcQz8OlIcIukxCrG5mfTY">
  
  <link rel="shortcut icon" href="favicon.ico">

  <!-- plugin css -->
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css')}}">
  <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}">
  <!-- end plugin css -->

    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">

  <!-- common css -->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/selalu.css')}}">
  <!-- end common css -->

    
  <!-- Global site tag (gtag.js) - Google Analytics start -->
  <script async src="../../../../www.googletagmanager.com/gtag/jsd4d9?id=UA-146586338-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-146586338-1');
  </script>
  <!-- Google Analytics end -->
  
</head>
<body data-base-url="https://www.nobleui.com/laravel/template/horizontal-menu">

  <script src="{{ asset('assets/js/spinner.js')}}"></script>

  <div class="main-wrapper">
  <div class="horizontal-menu">
    <nav class="navbar top-navbar">
      @include('layouts.admin.top-menu')
    </nav>
    <nav class="bottom-navbar">
      @include('layouts.admin.bottom-menu')
    </nav>
  </div>    
  <div class="page-wrapper">
        <div id="app">
          @yield('content')
        </div>

        @include('layouts.admin.footer')
  </div>
</div>
    <script src="{{ asset('js/app.js')}}"></script>
    <!-- base js -->
    {{-- <script src="{{ asset('js/appuku.js')}}"></script> --}}
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <!-- end base js -->

    <!-- plugin js -->
      <script src="{{ asset('assets/plugins/chartjs/Chart.min.js')}}"></script>
      <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
      <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
      <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
      <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
      <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js')}}"></script>
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('assets/js/template.js')}}"></script>
    <!-- end common js -->

      <script src="{{ asset('assets/js/dashboard.js')}}"></script>
  <script src="{{ asset('assets/js/datepicker.js')}}"></script>
</body>

</html>