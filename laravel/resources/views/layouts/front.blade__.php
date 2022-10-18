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

    <title>SIBAPOKTING</title>
    
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
    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
                <br>
            <a href="{{route('dashboard')}}" class="az-logo"><img width="35%" src="{{asset('logo2.png')}}"></a>
                <br>
                <a href="{{route('dashboard')}}" id="azNavShow" class="az-header-menu-icon d-lg-none"><img width="35%" src="{{asset('logo2.png')}}"><span></span></a>
            </div>
			
            <div class="az-header-right">
                <div class="az-header-message">
                    <a href="{{route('admin')}}"><i class="typcn typcn-user"></i></a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.front-menu')

    @yield('slide')

 

    <div class="az-content">
        <div class="container">
                @yield('content')
        </div>
    </div>

    @yield('peta')

    <?php 
        $alamat1 = DB::table('alamat')->where('type','informasi')->get();
        $alamat2 = DB::table('alamat')->where('type','instansi')->get();
        $kontak = DB::table('kontak')->get();
    ?>
    <div class="az-content">
        <div class="container">
            <div class="az-content-body">
                <hr>
                <div class="row row-sm mg-b-20">
                    <div class="col-lg-4 mg-b-20">
                        <h2 class="az-dashboard-title">Informasi</h2>
                        @foreach ($alamat1 as $i)
                            <a target="_blank" href="{{$i->sumber}}">{{$i->judul}}</a>
                            <br>
                        @endforeach          
                    </div>
                    <div class="col-lg-4 mg-b-20">
                        <h2 class="az-dashboard-title">Instansi Terkait</h2>
                        @foreach ($alamat2 as $i)
                            <a target="_blank" href="{{$i->sumber}}">{{$i->judul}}</a>
                            <br>
                        @endforeach  
                    </div>
                    <div class="col-lg-4 mg-b-20">
                        <h2 class="az-dashboard-title">Kontak Kami</h2>
                        @foreach ($kontak as $i)
                            <p>
                               {!! html_entity_decode($i->namakantor) !!}<br>
                               {!! html_entity_decode($i->email) !!}<br>
                               {!! html_entity_decode($i->tlp) !!}<br>
                               {!! html_entity_decode($i->alamat) !!}<br>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="az-footer">
        <div class="container">
            <span>&copy; 2019 Koprasi Bandung</span>
            <span>softwaremagenta.id</span>
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