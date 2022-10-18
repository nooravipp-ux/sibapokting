<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('aronix/favicon/ms-icon-144x144.png')}}">

        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('aronix/favicon/apple-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('aronix/favicon/apple-icon-60x60.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('aronix/favicon/apple-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('aronix/favicon/apple-icon-76x76.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('aronix/favicon/apple-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('aronix/favicon/apple-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('aronix/favicon/apple-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('aronix/favicon/apple-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('aronix/favicon/apple-icon-180x180.png')}}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('aronix/favicon/android-icon-192x192.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('aronix/favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('aronix/favicon/favicon-96x96.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('aronix/favicon/favicon-16x16.png')}}">
        <link rel="manifest" href="{{ asset('aronix/favicon/manifest.json')}}">
        
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset ('/js/select2/dist/css/select2.min.css') }}">
        <!-- Bootstrap Min CSS -->
        <link rel="stylesheet" href="{{ asset('aronix/assets/css/bootstrap.min.css')}}">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="{{ asset('aronix/assets/css/animate.min.css')}}">
        <!-- FlatIcon CSS -->
        <link rel="stylesheet" href="{{ asset('aronix/assets/css/flaticon.css')}}">
        <!-- Odometer Min CSS -->
        <link rel="stylesheet" href="{{ asset('aronix/assets/css/odometer.min.css')}}">
        <!-- MeanMenu CSS -->
        <link rel="stylesheet" href="{{ asset('aronix/assets/css/meanmenu.css')}}">
        <!-- Magnific Popup Min CSS -->
        <link rel="stylesheet" href="{{ asset('aronix/assets/css/magnific-popup.min.css')}}">
        <!-- Nice Select Min CSS -->
        <link rel="stylesheet" href="{{ asset('aronix/assets/css/nice-select.min.css')}}">
        <!-- Owl Carousel Min CSS -->
        <link rel="stylesheet" href="{{ asset('aronix/assets/css/owl.carousel.min.css')}}">
        <!-- Font Awesome Min CSS -->
        <link rel="stylesheet" href="{{ asset('aronix/assets/css/fontawesome.min.css')}}">
        <!-- Boxicons CSS -->
        <link rel="stylesheet" href="{{ asset('aronix/assets/css/boxicons.min.css')}}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('aronix/assets/css/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('aronix/assets/css/responsive.css')}}">

        <link rel="icon" type="image/png" href="{{ asset('aronix/favicon/favicon.png')}}">

        <link rel="stylesheet" href="{{ asset ("/js/amcharts3/amcharts/plugins/export/export.css") }}">
        
        <link href="{{ asset('front/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
        <link href="{{ asset('front/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">   

        <title>SIBAPOKTING</title>

    @yield('css')

</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="loader">
            <div class="shadow"></div>
            <div class="box"></div>
        </div>
    </div>
    <!-- End Preloader -->

    @include('layouts.front-menu-second')

    @yield('slide')

    @yield('content')
    @yield('berita')
    <!-- <div class="az-content">
        <div class="container">
        </div>
    </div> -->

    @yield('peta')

    <?php 
        $alamat1 = DB::table('alamat')->where('type','informasi')->get();
        $alamat2 = DB::table('alamat')->where('type','instansi')->get();
        $kontak = DB::table('kontak')->get();
    ?>
    @include('layouts.front-footer')

    <!-- End Footer Area -->
    <div class="go-top"><i class="fas fa-chevron-up"></i></div>
    <!-- jQuery Min JS -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('aronix/assets/js/jquery.min.js') }}"></script>
    <!-- Popper Min JS -->
    <script src="{{ asset('aronix/assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap Min JS -->
    <script src="{{ asset('aronix/assets/js/bootstrap.min.js') }}"></script>
    <!-- MeanMenu JS  -->
    <script src="{{ asset('aronix/assets/js/jquery.meanmenu.js') }}"></script>
    <!-- Appear Min JS -->
    <script src="{{ asset('aronix/assets/js/jquery.appear.min.js') }}"></script>
    <!-- Odometer Min JS -->
    <script src="{{ asset('aronix/assets/js/odometer.min.js') }}"></script>
    <!-- Owl Carousel Min JS -->
    <script src="{{ asset('aronix/assets/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup Min JS -->
    <script src="{{ asset('aronix/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Parallax Min JS -->
    <script src="{{ asset('aronix/assets/js/parallax.min.js') }}"></script>
    <!-- Nice Select Min JS -->
    <script src="{{ asset('aronix/assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- WOW Min JS -->
    <script src="{{ asset('aronix/assets/js/wow.min.js') }}"></script>
    <!-- AjaxChimp Min JS -->
    <script src="{{ asset('aronix/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Form Validator Min JS -->
    <script src="{{ asset('aronix/assets/js/form-validator.min.js') }}"></script>
    <!-- Contact Form Min JS -->
    <script src="{{ asset('aronix/assets/js/contact-form-script.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('aronix/assets/js/main.js') }}"></script>

    <script src="{{ asset('front/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('front/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{ asset('front/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('front/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>
    <!-- Select2 -->
    <!-- <script src="{{ asset ("/js/select2/dist/js/select2.full.min.js") }}"></script> -->
    <!-- <script src="{{ asset ("/js/select2/dist/js/i18n/en.js") }}"></script> -->
    <!-- AmCharts3 -->
    <script src="{{ asset ("/js/amcharts3/amcharts/amcharts.js") }}"></script>
    <script src="{{ asset ("/js/amcharts3/amcharts/pie.js") }}"></script>
    <script src="{{ asset ("/js/amcharts3/amcharts/serial.js") }}"></script>
    <script src="{{ asset ("/js/amcharts3/amcharts/plugins/export/export.min.js") }}"></script>
    <script src="{{ asset ("/js/amcharts3/amcharts/plugins/animate/animate.min.js") }}"></script>
    <script src="{{ asset ("/js/amcharts3/amcharts/themes/light.js") }}"></script>

    <script src="{{ asset ('/js/amcharts5/index.js') }}"></script>
    <script src="{{ asset ('/js/amcharts5/xy.js') }}"></script>
    <script src="{{ asset ('/js/amcharts5/themes/Animated.js') }}"></script>
    <script src="{{ asset ('/js/amcharts5/locales/de_DE.js') }}"></script>
    <script src="{{ asset ('/js/geodata/germanyLow.js') }}"></script>
    <script src="{{ asset ('/js/fonts/notosans-sc.js') }}"></script>
    @yield('js')
</body>

</html>