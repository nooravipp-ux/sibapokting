<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Azia">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/azia/img/azia-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/azia">
    <meta property="og:title" content="Azia">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/azia/img/azia-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/azia/img/azia-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    
    
    <!-- vendor css -->
    <link href="{{ asset('front/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('front/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('front/typicons.font/typicons.css')}}" rel="stylesheet">
    <link href="{{ asset('front/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">

    @yield('css')

    <!-- azia CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/azia.css')}}">
</head>
<body class="az-dashboard az-body d-block">
    <div class="az-content">
        <div class="container">
                @yield('content')
        </div>
    </div>

    <script src="{{ asset('front/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('front/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('front/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('front/js/azia.js')}}"></script>
    {{-- <script src="{{ asset('front/js/chart.sparkline.js')}}"></script> --}}
    @yield('js')
</body>

</html>