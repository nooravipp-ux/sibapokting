@extends('layouts.front-chart')

@section('content')
<div class="az-content-body">
    <div class="az-dashboard-one-title">
        <div>
            <br>
            <h2 class="az-dashboard-title">Update Terakhir / {{$tgl}}</h2>
            <p class="az-dashboard-text">HARGA RATA - RATA KOMODITAS</p>
        </div>
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
    });
</script>
@endsection