@extends('layouts.front-second')

@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area page-title-bg1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Peta Persebaran Pasar Kabupaten Bandung</h2>
                        <ul>
                            <li><a href="{{route('dashboard')}}">Home</a></li>
                            <li>Peta Persebaran Pasar Kabupaten Bandung</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="shape-img2"><img src="{{ asset('aronix/assets/img/shape/2.svg') }}" alt="image"></div>
        <div class="shape-img3"><img src="{{ asset('aronix/assets/img/shape/3.svg') }}" alt="image"></div>
        <div class="shape-img4"><img src="{{ asset('aronix/assets/img/shape/4.png') }}" alt="image"></div>
        <div class="shape-img5"><img src="{{ asset('aronix/assets/img/shape/5.png') }}" alt="image"></div>
        <div class="shape-img7"><img src="{{ asset('aronix/assets/img/shape/7.png') }}" alt="image"></div>
        <div class="shape-img8"><img src="{{ asset('aronix/assets/img/shape/8.png') }}" alt="image"></div>
        <div class="shape-img9"><img src="{{ asset('aronix/assets/img/shape/9.png') }}" alt="image"></div>
        <div class="shape-img10"><img src="{{ asset('aronix/assets/img/shape/10.png') }}" alt="image"></div>
    </div>
    <!-- End Page Title Area -->

        <section class="why-choose-area ptb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div id="mapid"></div>
                </div>
            </div>
        </section>
    
   
@endsection
                           
        
@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
    <style type="text/css">
        #mapid {
            margin: 10px auto;
            height: 450px;
            width: 95%;
        }
        /* html, body {
            height: 100%;
        } */
   </style>
@endsection

@section('js')
<script type="text/javascript">
    var mymap = L.map('mapid').setView([-7.003074, 107.688541], 12);
    var tileUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    var att = '&copy; <a href="https://www.openstreetmap.org/copyright">Open</a>';
    var tiles = L.tileLayer(tileUrl,{att});
    var greenIcon = L.icon({
        iconUrl: 'http://maps.google.com/mapfiles/ms/micons/green.png',
        iconSize:     [35, 35], // size of the icon
    });
    
    tiles.addTo(mymap);
    
    @foreach($pasarpeta as $i)
    L.marker([{{$i->latitude}},{{$i->longitude}}]).addTo(mymap).bindPopup(
        '<b>{{$i->namapasar}}</b>'+
        '</br>'+
        '{{$i->wilayahkecamatan}}'+
        '</br>'+
        '{{$i->longitude}},{{$i->latitude}}');
    @endforeach
</script>

@endsection