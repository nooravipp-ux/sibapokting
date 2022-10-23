@extends('layouts.front')
@section('content')

<link rel="stylesheet" href="{{ asset('aronix/assets/js/paginationjs/PagingStyle.css')}}">

<style>
    .mod_gtpihps_prices.pricelist ul {
        display: block;
        margin: -2.5px -2.5px 0 !important;
        height: 440px;
        overflow: hidden;
        padding: 0;
    }

    .mod_gtpihps_prices.pricelist ul li {
        background-color: rgb(29 29 34 / 56%);
        display: block;
        float: left;
        margin: 2.5px;
        height: auto;
        width: 310px;
        cursor: pointer;
        background-repeat: no-repeat;
        background-position: 10px 25px;
        overflow: hidden;
    }

    .mod_gtpihps_prices.pricelist ul li>div {
        color: #ffffff;
    }

    .mod_gtpihps_prices.pricelist ul li>a:hover {
        text-decoration: none;
    }

    .mod_gtpihps_prices.pricelist ul li>a:hover .title {
        background-color: rgba(44, 62, 80, 0.5);
    }

    .mod_gtpihps_prices.pricelist ul li .ico,
    .mod_gtpihps_prices.pricelist ul li .desc {
        display: inline-block;
        vertical-align: top;
    }

    .mod_gtpihps_prices.pricelist ul li .ico {
        background: url('../../images/modules/price_still.png') no-repeat center;
        margin: 5px 0;
        margin-right: 5px;
        text-align: center;
    }

    .mod_gtpihps_prices.pricelist ul li .desc {
        line-height: 1.7em;
        float: right;
        text-align: right;
        padding: 10px;
    }

    .mod_gtpihps_prices.pricelist ul li .spark {
        position: absolute;
        margin: 15px;
    }

    .mod_gtpihps_prices.pricelist ul li .title {
        white-space: nowrap;
        text-transform: uppercase;
        text-align: center;
        background-color: #2c3e50;
        margin: 3px;
        padding: 3px;
    }

    .mod_gtpihps_prices.pricelist ul li .price_now {
        font-size: 25px;
        font-weight: bold;
    }

    .mod_gtpihps_prices.pricelist ul li .price_now div {
        font-weight: normal;
        font-size: 0.5em;
        text-transform: uppercase;
    }

    .mod_gtpihps_prices.pricelist ul li .diff_perc,
    .mod_gtpihps_prices.pricelist ul li .diff {
        display: none;
        line-height: 1.2em;
    }

    .mod_gtpihps_prices.pricelist ul li .price_desc {
        padding: 0 10px;
        margin-top: 5px;
        margin-right: -10px;
        color: #ffffff !important;
        width: auto;
        text-align: right;
        display: inline-block;
        font-size: 12px;
        /* z-index: 999; */
        position: relative;
    }

    .mod_gtpihps_prices.pricelist ul li .price_desc.price_down {
        background: #27ae60 !important;
    }

    .mod_gtpihps_prices.pricelist ul li .price_desc.price_up {
        background: #c0392b !important;
    }

    .mod_gtpihps_prices.pricelist ul li .price_desc.price_still {
        background: #2980b9 !important;
    }

    .mod_gtpihps_prices.pricelist ul li .price_desc.price_unknown {
        background: #eeeeee !important;
        color: #000000 !important;
    }

    .mod_gtpihps_prices.pricelist ul li.price_up {
        /* background-color: #c0392b; */
    }

    .mod_gtpihps_prices.pricelist ul li.price_up .ico {
        background: url('../../images/modules/price_up.png') no-repeat center top;
    }

    .mod_gtpihps_prices.pricelist ul li.price_up .diff_perc,
    .mod_gtpihps_prices.pricelist ul li.price_up .diff {
        display: block;
    }

    .mod_gtpihps_prices.pricelist ul li.price_up .diff_perc {
        margin-top: 20px;
        font-size: 16px;
        font-weight: bold;
    }

    .mod_gtpihps_prices.pricelist ul li.price_down {
        background-color: #27ae60;
    }

    .mod_gtpihps_prices.pricelist ul li.price_down .ico {
        background: url('../../images/modules/price_down.png') no-repeat center bottom;
    }

    .mod_gtpihps_prices.pricelist ul li.price_down .diff_perc,
    .mod_gtpihps_prices.pricelist ul li.price_down .diff {
        display: block;
    }

    .mod_gtpihps_prices.pricelist ul li.price_down .diff_perc {
        margin-top: -2px;
        font-size: 16px;
        font-weight: bold;
        font-family: "RobotoCondensed", sans-serif !important;
    }

    .row-flex {
        display: flex;
        flex-wrap: wrap;
    }

    .content {
        height: 100%;
    }

    .img-cover {
        width:  300px;
        height: 200px;
        background-size: cover;
    }
</style>
<!-- Start Services Area -->
<section class="pt-100 pb-70 gray-bg ">
    <div class="container">
        <div class="overview-box it-overview" style="margin-bottom:0px;">
            <div class="overview-content">
                <div class="content">
                    <div class="section-title text-start">
                        <span class="sub-title">HARGA KOMODITAS RATA-RATA</span>
                        <h2>Update Terakhir / <?= $tgl ?></h2>
                    </div>
                </div>
            </div>

            <div class="overview-image">
                <form>
                    <div class="row section-title text-start">
                        <span class="sub-title">DAFTAR PASAR</span>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <select class="form-control" id="pasar" name="pasar">
                                    <option value="semua">Semua Pasar</option>
                                    @foreach ($pasar as $i)
                                    <option value="{{$i->id}}">{{$i->namapasar}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" class="form-control" id="date" placeholder="tanggal" value="{{$tgl}}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class=" mod_gtpihps_prices pricelist">
            <ul class="pricelist list_all" id="page">
                <!-- SCRIPT DARI JAVASCRIPT -->
            </ul>
        </div>
    </div>
</section>

@endsection
@section('berita')
<!-- Start Blog Area -->
<section class="blog-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h2>Berita Terkini</h2>
        </div>

        <div class="row row-flex owl-carousel">
            @foreach ($articles as $i)
            <div class="col-lg-3 col-md-6">
                <div class="single-blog-post content">
                    <div class="post-image">
                        <a href="{{route('articlesdetail',[$i->id])}}"><img class="img-cover" src="{{URL::to('/')}}/articles_/{{$i->gambar}}" alt="image"></a>
                    </div>

                    <div class="post-content">
                        <div class="post-meta">
                            <ul>
                                <li>{{$i->tanggal}}</li>
                            </ul>
                        </div>

                        <h3><a href="single-blog.html">{{$i->judul}}</a></h3>
                        <!-- <p>{{ strip_tags(substr($i->konten, 0, 250)) }}...</p> -->

                        <a href="{{route('articlesdetail',[$i->id])}}" class="read-more-btn">Read More <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-md-12">
                {{$articles->links()}}
            </div>
        </div>
    </div>

    <div class="shape-img2"><img src="{{asset('aronix/assets/img/shape/2.svg')}}" alt="image"></div>
    <div class="shape-img3"><img src="{{asset('aronix/assets/img/shape/3.svg')}}" alt="image"></div>
</section>
<!-- End Blog Area -->
@endsection

@section('kegiatan')
<!-- Start Blog Area -->
<section class="blog-area ptb-50">
    <div class="container">
        <div class="section-title">
            <h2>Kegiatan</h2>
        </div>

        <div class="row row-flex">
            @foreach ($events as $j)
            <div class="col-lg-3 col-md-6">
                <div class="single-blog-post content">
                    <div class="post-image">
                        <a href="{{route('articlesdetail',[$j->id])}}"><img class="img-cover" src="{{URL::to('/')}}/articles_/{{$j->gambar}}" alt="image"></a>
                    </div>

                    <div class="post-content">
                        <div class="post-meta">
                            <ul>
                                <li>{{$j->tanggal}}</li>
                            </ul>
                        </div>

                        <h3><a href="single-blog.html">{{$j->judul}}</a></h3>
                        <!-- <p>{{ strip_tags(substr($j->konten, 0, 250)) }}...</p> -->

                        <a href="{{route('articlesdetail',[$j->id])}}" class="read-more-btn">Read More <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
    </div>

    <div class="shape-img2"><img src="{{asset('aronix/assets/img/shape/2.svg')}}" alt="image"></div>
    <div class="shape-img3"><img src="{{asset('aronix/assets/img/shape/3.svg')}}" alt="image"></div>
</section>
<!-- End Blog Area -->
@endsection

@section('slide')
<div class="machine-learning-slider owl-carousel owl-theme">
    <?php $no = 1; ?>
    @foreach ($banner1 as $i)
    <div class="machine-learning-banner ml-bg{{$no}} jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container mt-80">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="banner-content">
                                <h1 style="color:black;">{{$i->judul}}</h1>
                                <p style="color:black;">{{$i->deskripsi}}</p>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="ml-video">
                                <!-- <div class="solution-video">
                                        <a href="{{$i->sumber}}" class="video-btn popup-youtube">
                                            <i class="flaticon-play-button"></i>
                                        </a>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shape Images -->
        <div class="shape-img2"><img src="{{ asset('aronix/assets/img/shape/2.svg') }}" alt="image"></div>
        <div class="shape-img3"><img src="{{ asset('aronix/assets/img/shape/3.svg') }}" alt="image"></div>
        <div class="shape-img4"><img src="{{ asset('aronix/assets/img/shape/4.png') }}" alt="image"></div>
        <div class="shape-img5"><img src="{{ asset('aronix/assets/img/shape/5.png') }}" alt="image"></div>
        <div class="shape-img6"><img src="{{ asset('aronix/assets/img/shape/6.png') }}" alt="image"></div>
        <div class="shape-img7"><img src="{{ asset('aronix/assets/img/shape/7.png') }}" alt="image"></div>
        <div class="shape-img8"><img src="{{ asset('aronix/assets/img/shape/8.png') }}" alt="image"></div>
        <div class="shape-img9"><img src="{{ asset('aronix/assets/img/shape/9.png') }}" alt="image"></div>
        <div class="shape-img10"><img src="{{ asset('aronix/assets/img/shape/10.png') }}" alt="image"></div>
    </div>
    <?php $no++ ?>
    @endforeach
</div>
<!-- End Main Banner Area -->
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        @foreach($avg as $i)
        $('#sparkline{{$i->id}}').sparkline('html', {
            width: 170,
            height: 90,
            lineColor: '#0083CD',
            fillColor: 'rgba(0,131,205,0.2)',
        });
        @endforeach
        $('#sparkline500').sparkline('html', {
            width: 170,
            height: 90,
            lineColor: '#0083CD',
            fillColor: 'rgba(0,131,205,0.2)',
        });
    });
</script>


<script>
    var base_url = '{{URL::to(' / ')}}';

    $(document).ready(function() {
        var did = $('#pasar').val();
        var year = $('#date').val();
        rata_pasar(did, year);

        // $('#pasar').select2();
        $('#pasar').niceSelect();
        /*
        Initial Dashboard
        */
    });

    $("#pasar").change(function() {
        var did = $('#pasar').val();
        var year = $('#date').val();
        document.getElementById('page').innerHTML = '';

        document.getElementById('paging').remove();

        rata_pasar(did, year);


    });

    function rata_pasar(did, year) {
        // Load Ajax Chart Pertumbuhan Penduduk

        $.ajax('{!! route('chartPasar') !!}', {
                data: {
                    did: did,
                    y: year
                }
            }).done(function(data) {
            data.avg.forEach((komoditas, index, array) => {
                var kondisi = "";
                var bg = "";
                var harga_kemaren = "";
                if (komoditas.kondisi == 'turun') {
                    kondisi = 'fa-arrow-down';
                    bg = 'price_down';
                    harga_kemaren = komoditas.total - komoditas.total_kemaren;
                } else if (komoditas.kondisi == 'naik') {
                    kondisi = 'fa-arrow-up';
                    bg = 'price_up';
                    harga_kemaren = komoditas.total - komoditas.total_kemaren;
                } else {
                    kondisi = 'fa-equals';
                    bg = 'price_still';
                    harga_kemaren = komoditas.total;
                }
                var row =
                    '<li id="data-harga">' +
                    '<div>' +
                    '<div class="title">' + komoditas.namakomoditas + '</div>' +
                    '<div class="desc">' +
                    '<div class="price_now"><span>' + Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    }).format(komoditas.total) + '</span><div>Per ' + komoditas.satuan + '</div></div>' +
                    '<div class="price_desc ' + bg + '" title="' + komoditas.kondisi + '">' +
                    '<i class="fa ' + kondisi + '"></i>&nbsp;' +
                    '<span>' + parseFloat(((komoditas.total - harga_kemaren) / komoditas.total) * 100).toFixed(2) + '%' + ' - ' + Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR"
                    }).format(komoditas.total_kemaren) + '</span>' +
                    ' </div>' +
                    '</div>' +
                    '<div class="spark">' +
                    '<img src="' + base_url + '/komoditas_/' + komoditas.gambar + '" width="100" height="60" style="display: inline-block; width: 100px; height: 60px; vertical-align: top;"></div>' +
                    '</div>' +
                    '</li>';
                $(row).appendTo('#page');
            });
            $("#page").JPaging({
                pageSize: 12
            });

            // create_chart_penduduk(data);
        });

    }

    // Create Chart Penduduk
    function create_chart_penduduk(data) {
        var chart = AmCharts.makeChart("chart_harga_perpasar", {
            "type": "serial",
            "theme": "none",
            "marginTop": 50,
            "marginRight": 80,
            "dataProvider": data,
            "valueAxes": [{
                "gridColor": "#FFFFFF",
                "gridAlpha": 0.2,
                "dashLength": 0
            }],
            "gridAboveGraphs": true,
            "startDuration": 1,
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "value"
            }],
            "valueAxes": [{
                "position": "left",
                "title": "Harga",
                "baseValue": 0,
                "minimum": 0
            }],
            "allLabels": [{
                "text": "Komoditas " + $('#komoditas').find(":selected").text() + " pada " + $('#date').val(),
                "align": "center",
                "bold": true,
                "size": 12,
                "y": 10
            }],
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "pasar",
            "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "tickPosition": "start",
                "tickLength": 20
            },
            "export": {
                "enabled": true
            }

        });
    }
</script>
@endsection