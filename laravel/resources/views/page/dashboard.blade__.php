@extends('layouts.front')

@section('content')
<div class="az-content-body">
<div class="row row-sm mg-b-20">
    @foreach ($banner2 as $i)
        <div class="col-lg-4 mg-b-10">
            <a href="{{$i->sumber}}"><img src="{{URL::to('/')}}/banner_/{{$i->gambar}}"  style="width:100%;height:100%;object-fit: fill;" alt="Responsive image"></a>
        </div>   
    @endforeach
    </div>
    <hr>
    <div class="az-dashboard-one-title">
        <div>
            <h2 class="az-dashboard-title">Update Terakhir / {{$tgl}}</h2>
            <p class="az-dashboard-text">HARGA RATA - RATA KOMODITAS</p>
        </div>
        <form method="POST" action="{{route('dashboard')}}">
            @csrf
        <div class="az-content-header-right">
            <div class="media">
              <div class="media-body">     
                        <div class="form-group">
                            <label for="komoditas_id">Daftar Pasar</label>
                            <select class="form-control" id="namapasar" name="namapasar">
                                <option value="semua">Semua Pasar</option>
                                @foreach ($pasar as $i)
                                    <option <?php if($namapasar == $i->id){echo 'selected';} ?> value="{{$i->id}}">{{$i->namapasar}}</option>
                                @endforeach
                            </select>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
          </div>
        </form>
    </div>

    <div class="row row-sm mg-b-10">
        <div class="col-lg-12 mg-t-10 mg-lg-t-0">
            <div class="row row-sm">
                @foreach ($avg as $i)
                <div class="col-sm-2 mg-t-10">
                    <div class="card card-dashboard-two">
                        <div class="card-header">
                        <h5>{{$i->namakomoditas}}<h5>
                        <h6>
                            <small>Rp</small>
                                {{number_format(round($i->total),0,',','.')}}
                                @if($i->kondisi == 'naik')
                                    <i class="icon ion-md-trending-up tx-danger"></i>
                                @elseif($i->kondisi == 'stabil')
                                    <i class="icon ion-md-pause tx-primary"></i>
                                @elseif($i->kondisi == 'turun')
                                    <i class="icon ion-md-trending-down tx-success"></i>
                                @endif
                        </h6>
                        <p>PER {{$i->satuan}}</p>
                        @if($i->kondisi == 'naik')
                            <p style="background-color: #FFFFE0;padding-right:10px;padding-left:10px">
                                <i class="icon ion-md-trending-up tx-danger"></i>
                                {{round($i->total_kemaren / $i->total,2).'%'}} / Rp{{number_format(round($i->total_kemaren),0,',','.')}}
                            </p>
                        @elseif($i->kondisi == 'stabil')
                            <p style="background-color: #FFFFE0;padding-right:10px;padding-left:10px">
                                <i class="icon ion-md-pause tx-primary"></i>
                                Harga Tetap
                            </p>
                        @elseif($i->kondisi == 'turun')
                            <p style="background-color: #FFFFE0;padding-right:10px;padding-left:10px">
                                <i class="icon ion-md-trending-down tx-success"></i>
                                {{round($i->total_kemaren / $i->total,2).'%'}} / Rp{{number_format(round($i->total_kemaren),0,',','.')}}
                            </p>
                        @endif
                        </div>
                        <div class="card-body">
                            <span id="sparkline{{$i->id}}">
                                <?php 
                                    if($namapasar == null){
                                        $avg1 = DB::table('detail')
                                    ->join('komoditas','komoditas.id','=','detail.komoditas_id')
                                    ->select(
                                        'detail.*', 
                                        'komoditas.*', 
                                        DB::raw('AVG(harga_publish) as total'),
                                        DB::raw('AVG(harga_dinamik) as total_kemaren')
                                    )
                                    //->where('pasar_id','1')
                                    ->where('komoditas_id',$i->komoditas_id)
                                    ->where('detail.detail_tgl',$tgl2)
                                    ->groupBy('komoditas_id')
                                    ->get();   
                                    }else{
                                        $avg1 = DB::table('detail')
                                    ->join('komoditas','komoditas.id','=','detail.komoditas_id')
                                    ->select(
                                        'detail.*', 
                                        'komoditas.*', 
                                        DB::raw('AVG(harga_publish) as total'),
                                        DB::raw('AVG(harga_dinamik) as total_kemaren')
                                    )
                                    ->where('pasar_id',$namapasar)
                                    ->where('komoditas_id',$i->komoditas_id)
                                    ->where('detail.detail_tgl',$tgl2)
                                    ->groupBy('komoditas_id')
                                    ->get();   
                                    }

                                    foreach($avg1 as $b){
                                        echo $b->total_kemaren;
                                    }
                                ?>,
                                <?php 
                                    if($namapasar == null){
                                    $avg2 = DB::table('detail')
                                    ->join('komoditas','komoditas.id','=','detail.komoditas_id')
                                    ->select(
                                        'detail.*', 
                                        'komoditas.*', 
                                        DB::raw('AVG(harga_publish) as total'),
                                        DB::raw('AVG(harga_dinamik) as total_kemaren')
                                    )
                                    //->where('pasar_id','1')
                                    ->where('komoditas_id',$i->komoditas_id)
                                    ->where('detail.detail_tgl',$tgl1)
                                    ->groupBy('komoditas_id')
                                    ->get(); 
                                    }else{
                                        $avg2 = DB::table('detail')
                                    ->join('komoditas','komoditas.id','=','detail.komoditas_id')
                                    ->select(
                                        'detail.*', 
                                        'komoditas.*', 
                                        DB::raw('AVG(harga_publish) as total'),
                                        DB::raw('AVG(harga_dinamik) as total_kemaren')
                                    )
                                    ->where('pasar_id',$namapasar)
                                    ->where('komoditas_id',$i->komoditas_id)
                                    ->where('detail.detail_tgl',$tgl1)
                                    ->groupBy('komoditas_id')
                                    ->get(); 
                                    }
                                    foreach($avg2 as $c){
                                        echo $c->total_kemaren;
                                    }
                                ?>,
                                {{$i->total_kemaren}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <hr>
    <h2 class="az-dashboard-title">Berita Terbaru</h2>
    <br>
    <div class="row row-sm mg-b-20">
        @foreach ($articles as $i)
            <div class="col-md mg-t-20 mg-md-t-0">
                <div class="card bd-0">
                    <img class="card-img img-fluid" style="height: 250px" src="{{URL::to('/')}}/articles_/{{$i->gambar}}" alt="Image">
                    <div class="card-img-overlay pd-30 bg-black-4 d-flex flex-column justify-content-center">
                        <p class="tx-white tx-medium mg-b-15">{{$i->judul}}</p>
                        <p class="tx-white-7 tx-13">{{$i->tanggal}}</p>
                    <p class="tx-13 mg-b-0"><a href="{{route('articlesdetail',[$i->id])}}" class="tx-white">Read more</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="row row-sm mg-b-5">
        @foreach ($banner3 as $i)
        <div class="col-lg-4 mg-b-10" >
                <a href="{{$i->sumber}}"><img style="max-width:100%;height:50px;" src="{{URL::to('/')}}/banner_/{{$i->gambar}}" class="img-fluid" alt="Responsive image"></a>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('slide')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($banner1 as $i)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i->id}}" <?php if($i->id == 1){ echo 'class="active"';} ?>></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($banner1 as $i)
                <div class="carousel-item <?php if($i->id == 1){ echo 'active';} ?>">
                    <img class="d-block w-100" src="{{URL::to('/')}}/banner_/{{$i->gambar}}">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br>
    <?php 
$berita = DB::table('articles')->limit(3)->orderBy('tanggal','desc')->get();
?>
<div class="az-content">
        <div class="container">
            <div class="az-content-body">
                    <h2 class="az-dashboard-title">Informasi Berita</h2>
                   <font size="4" face="sans-serif">
                       <marquee  behavior="scroll" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="20">
                 @foreach ($berita as $i)
                   <a href ="{{route('articlesdetail',[$i->id])}}"> {{$i->judul}}</a>
                   <?php 
                   for($i=0;$i<=30;$i++){
                    echo '&ensp;';
                   }
                   ?>
                 @endforeach     
                </marquee> 
            </font>
            </div>
        </div>
    </div>
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
@endsection