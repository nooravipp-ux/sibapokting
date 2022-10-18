@extends('layouts.front-second')

@section('content')
<section class="services-area bg-F4F7FC" style="padding-top: 152px;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                    <div class="list-group">
                            <form method="POST" action="{{route('perpasar')}}">
                                    @csrf
                                <div class="form-group">
                                    <label for="komoditas_id">Daftar Pasar</label>
                                    <select class="form-control" id="pasar_id" name="pasar_id" required>
                                        @foreach ($pasar as $i)
                                            <option <?php if($i->id == $pasarid){echo 'selected';} ?> value="{{$i->id}}">{{$i->namapasar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Daftar Komoditas (Tahan tombol ctrl atau control)</label>
                                    <select multiple class="form-control" name="namakomoditas[]" required>
                                        <option value="semua">SEMUA KOMODITAS</option>
                                        @foreach ($kom as $i)
                                            <option value="{{$i->id}}">{{$i->namakomoditas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Mulai</label>
                                    <input data-date-format="yyyy-mm-dd" value="{{substr($mulai,0,4).'-'.substr($mulai,5,2).'-'.substr($mulai,8,2)}}" name="tanggal_mulai" class="form-control datepicker">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Selesai</label>
                                    <input data-date-format="yyyy-mm-dd" value="{{substr($selesai,0,4).'-'.substr($selesai,5,2).'-'.substr($selesai,8,2)}}" name="tanggal_selesai" class="form-control datepicker">
                                </div>
                                <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa fa-search"></i> Cari</button>
                            </form>
                     </div>
            </div>
            <div  class="col-sm-9">
                    <h2>PERKEMBANGAN HARGA PANGAN PASAR / KOMODITAS</h2>
                    <p>
                        @foreach ($pasar as $i)
                            @if ($i->id == $pasarid)
                                Nama Pasar : <b>{{$i->namapasar}}</b></br>
                            @endif
                        @endforeach
                        Periode : <b>{{$mulai}} - {{$selesai}}</b>
                    </p>
                    <div class="row">
                            <div class="col-md-12">
                                <table id="datatester" class="display responsive nowrap table table-hover table-striped table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Komoditas</th>
                                            @foreach ($tanggal as $i)
                                            <th><font size="2">{{substr($i->tgl,0,4).'-'.substr($i->tgl,5,2).'-'.substr($i->tgl,8,2)}}</font></th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($selectkomoditas as $i)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$i->namakomoditas}}</td>
                                            <?php 
                                                // $query = DB::table('detail')
                                                // ->where('komoditas_id',$i->id)
                                                // ->where('pasar_id',$pasarid)
                                                // ->whereBetween('detail.tanggal',[$mulai,$selesai])
                                                // ->get();
                                                // foreach($query as $b){
                                                //     echo '<td>'.'Rp'.number_format(round($b->harga_publish),0,',','.').'</td>';
                                                // }

                                                            $kid = $i->id;
                                                            $select = DB::table('tahun_laporan')
                                                                    ->leftJoin('detail', function ($join) use ($kid,$pasarid,$mulai,$selesai) {
                                                                        $join->on('detail.detail_tgl', '=', 'tahun_laporan.tgl')
                                                                        ->where('komoditas_id',$kid)
                                                                        ->where('pasar_id',$pasarid)
                                                                        ->whereBetween('detail_tgl',[$mulai,$selesai]);
                                                                    })
                                                                    ->select('tahun_laporan.*','detail.*')
                                                                    ->whereBetween('tgl',[$mulai,$selesai])
                                                                    ->orderBy('tgl','asc')
                                                                    ->get();
                                                            
                                                                foreach($select as $b){
                                                                    if($b->harga_publish == null){
                                                                        echo '<td>Rp. 0</td>';
                                                                    }else{
                                                                        echo '<td>'.'Rp'.number_format(round($b->harga_publish),0,',','.').'</td>';
                                                                    }	
														        }
                                            ?>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
        </div>
    </div>
</section>
@endsection

@section('css')
<link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('front/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ asset('front/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
 <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
</head>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('front/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('front/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{ asset('front/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('front/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
{{-- <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        @foreach ($pasar as $i)
            @if ($i->id == $pasarid)
                var namapasar = '{{$i->namapasar}}';
            @endif
        @endforeach
        var mulaiy = '{{$mulai}}'; 
        var selesaiy = '{{$selesai}}'; 
        $('#datatester').dataTable({
            "lengthMenu": [
                [-1],
                ["All"]
            ],
    //         dom: 'Bfrtip',
    //         buttons: [
    //             {
    //                 extend: 'copy',
    //                 messageTop: 'Nama Pasar : ' + namapasar + ' / ' + 'Periode ' + mulaiy + '-' + selesaiy,
    //             },
    //             {
    //                 extend: 'csv',
    //                 messageTop: 'Nama Pasar : ' + namapasar + ' / ' + 'Periode ' + mulaiy + '-' + selesaiy,
    //             },
    //             {
    //                 extend: 'excel',
    //                 messageTop: 'Nama Pasar : ' + namapasar + ' / ' + 'Periode ' + mulaiy + '-' + selesaiy,
    //             },
    //             {
    //                 extend: 'pdf',
    //                 messageTop: 'Nama Pasar : ' + namapasar + ' / ' + 'Periode ' + mulaiy + '-' + selesaiy,
    //             },
    //             {
    //                 extend: 'print',
    //                 messageTop: 'Nama Pasar : ' + namapasar + ' / ' + 'Periode ' + mulaiy + '-' + selesaiy,
    //             }
    //         ],
    });
        $('.datepicker').datepicker();
    });
</script>
@endsection

