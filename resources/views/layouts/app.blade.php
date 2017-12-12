<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary JavaScript plugins) -->
    <script type='text/javascript' src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <!-- Custom Theme files -->
    <link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <!--//theme-style-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
    <!-- start menu -->
    <link href="{{ asset('css/megamenu.css') }}" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="{{ asset('/js/megamenu.js') }}"></script>
    <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
    <script src="{{ asset('js/menu_jquery.js') }}"></script>
    <script src="{{ asset('js/simpleCart.min.js') }}"> </script>
      <script src="{{ asset('js/responsiveslides.min.js') }}"></script>
    <script>
    // You can also use "$(window).load(function() {"
    $(function () {
      // Slideshow 1
      $("#slider1").responsiveSlides({
         auto: true,
         nav: true,
         speed: 500,
         namespace: "callbacks",
      });
    });
  </script>
  <style type="text/css">
    .   col-md-4.ftr-grid {
        float: right;
    }
  </style>
    @yield('style')
</head>
<body>
<!-- header -->
    <div id="app">
        <div class="mega_nav" style="margin-top: 10px;">
             <div class="container">
                <div class="menu_sec">
                    <ul class="megamenu skyblue">
                        <li class="active grid"><a class="color1" href="{{ route('home') }}">Trang chủ</a></li>
                        <li>
                            <a class="color4" href="{{ route('cat', ['cat_slug' => 'ban_ghe']) }}">Bàn ghế</a>
                        </li>
                        <li>
                            <a class="color5" href="{{ route('cat', ['cat_slug' => 'tu_go']) }}">Tủ gỗ</a>
                        </li>
                    </ul>
                    <div class="search">
                        <form>
                            <input type="text" value="" placeholder="Search...">
                            <input type="submit" value="">
                        </form>
                    </div>
                    <div class="clearfix"></div>
                 </div>
            </div>
        </div>

        @yield('content')
        <div class="footer-content">
            <div class="container">
                 <div class="ftr-grids">
                     <div class="col-md-6 ftr-grid">
                        <h4>Thông tin</h4>
                        <p>Đồ gỗ - @@@@@</p>
                        <p>Địa chỉ: </p>
                        <p>Email: </p>
                        <p>Phone: </p>
                     </div>
                     <div class="col-md-4 ftr-grid">
                        <h4>Giờ mở của</h4>
                        <p>Sáng: 8h - 12h</p>
                        <p>Chiều: 13h - 21h</p>
                    </div>

                    <div class="clearfix"></div>
                 </div>
            </div>
        </div>
        <div class="footer">
             <div class="container">
                <div class="copywrite">
                    <p>Copyright © {{ date('Y') }} SH Team All rights reserved.</p>
                </div>
             </div>
        </div>
        <!---->
    </div>
    @yield('script')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
