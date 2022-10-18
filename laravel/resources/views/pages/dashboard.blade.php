@extends('layouts.master') 

@section('content')
<section class="content">
        @if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin')
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$komoditas}}</h3>
                        <p>Jumlah Komoditas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cart-plus"></i>
                    </div>
                    <a href="{{route('komoditas.index')}}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                    <h3>{{$pasar}}</h3>
                        <p>Jumlah Pasar</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-home"></i>
                    </div>
                    <a href="{{route('pasar.index')}}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$user}}</h3>
                        <p>Jumlah Petugas Observasi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('user-management.index')}}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                    <h3>{{$detail}} / {{$item}}</h3>
                        <p>Item Komoditas / Pasar</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <a href="{{route('detail.index')}}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>  
        @elseif(Auth::user()->akses == 'user' or Auth::user()->akses == 'User')
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="small-box bg-red">
                    <div class="inner">
                    <h3>{{$detail}} / {{$item}}</h3>
                        <p>Item Komoditas / Pasar</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <a href="{{route('detail.index')}}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>Data User</h3>
                        <p>Petugas Observasi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="{{route('userdetail')}}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        @endif
        <div class="box box-default">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="list-group">
                                <form method="POST" action="{{route('admin')}}">
                                    @csrf
                                    <input type="text" id="status" name="status" value="perpasar" style="display: none">
                                    <div class="form-group">
                                        <label for="komoditas_id">Daftar Komoditas</label>
                                        <select class="form-control" id="komoditas_id" name="komoditas_id">
                                            @foreach ($kom as $i)
                                            <option <?php if($i->id == $komoditasid){echo 'selected';} ?> value="{{$i->id}}">{{$i->namakomoditas}}</option>
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
                        <div class="col-sm-9">
                            <h3>PERKEMBANGAN HARGA PANGAN KOMODITAS / PASAR</h3>
                            <p>
                                @foreach ($kom as $i) 
                                    @if ($i->id == $komoditasid) Nama Komoditas : <b>{{$i->namakomoditas}}</b></br>
                                    @endif 
                                @endforeach Periode : <b>{{$mulai}} - {{$selesai}}</b>
                            </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="datatester" class="table display table-bordered table-hover" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pasar</th>
                                                @foreach ($tanggal as $i)
                                                    <th><font size="2">{{substr($i->tgl,0,4).'-'.substr($i->tgl,5,2).'-'.substr($i->tgl,8,2)}}</font></th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pasars as $i)
                                            <tr>
                                                <td style="vertical-align: middle;">{{$no++}}</td>
                                                <td>{{$i->namapasar}}</td>
                                                <?php 

                                                            $pid = $i->id;
                                                            $select = DB::table('tahun_laporan')
                                                                    ->leftJoin('detail', function ($join) use ($pid,$komoditasid,$mulai,$selesai) {
                                                                        $join->on('detail.detail_tgl', '=', 'tahun_laporan.tgl')
                                                                        ->where('komoditas_id',$komoditasid)
                                                                        ->where('pasar_id',$pid)
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
            </div>

            <div class="box box-default">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="list-group">
                                    <form method="POST" action="{{route('admin')}}">
                                        @csrf
                                        <input type="text" id="status" name="status" value="perkomoditas" style="display: none">
                                        <div class="form-group">
                                            <label for="komoditas_id">Daftar Komoditas</label>
                                            <select class="form-control" id="pasar_id" name="pasar_id">
                                                    @foreach ($pasars as $i)
                                                    <option <?php if($i->id == $pasarid){echo 'selected';} ?> value="{{$i->id}}">{{$i->namapasar}}</option>
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
                                    <h3>PERKEMBANGAN HARGA PANGAN PASAR / KOMODITAS</h3>
                                    <p>
                                        @foreach ($pasars as $i)
                                            @if ($i->id == $pasarid)
                                                Nama Pasar : <b>{{$i->namapasar}}</b></br>
                                            @endif
                                        @endforeach
                                        Periode : <b>{{$mulai}} - {{$selesai}}</b>
                                    </p>
                                    <div class="row">
                                            <div class="col-md-12">
                                                <table id="datatester1" class="table display table-bordered table-hover" width="100%">
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
                                                        @foreach ($kom as $i)
                                                        <tr>
                                                            <td>{{$noo++}}</td>
                                                            <td>{{$i->namakomoditas}}</td>
                                                            <?php 
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
                                                                    //dd($select);
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
                </div>
    </section>
@endsection 

@section('js')
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        @foreach ($kom as $i) 
            var namakomoditas = '{{$i->namakomoditas}}';
        @endforeach

        @foreach ($pasars as $i)
            var namapasar = '{{$i->namapasar}}';
        @endforeach
        var mulaix = '{{$mulai}}'; 
        var mulaiy = '{{$mulai}}'; 
        var selesaix = '{{$selesai}}'; 
        var selesaiy = '{{$selesai}}'; 

        $('#datatester').dataTable({
            "lengthMenu": [
                [-1],
                ["All"]
            ],
            dom: 'Bfrtip',
            buttons: [
                    //'copy', 'csv', 'excel', 'pdf', 'print',
                {
                    extend: 'copy',
                    messageTop: 'Nama Komoditas : ' + namakomoditas + ' / ' + 'Periode ' + mulaix + '-' + selesaix,
                },
                {
                    extend: 'csv',
                    messageTop: 'Nama Komoditas : ' + namakomoditas + ' / ' + 'Periode ' + mulaix + '-' + selesaix,
                },
                {
                    extend: 'excel',
                    messageTop: 'Nama Komoditas : ' + namakomoditas + ' / ' + 'Periode ' + mulaix + '-' + selesaix,
                },
                {
                    extend: 'pdf',
                    messageTop: 'Nama Komoditas : ' + namakomoditas + ' / ' + 'Periode ' + mulaix + '-' + selesaix,
                },
                {
                    extend: 'print',
                    messageTop: 'Nama Komoditas : ' + namakomoditas + ' / ' + 'Periode ' + mulaix + '-' + selesaix,
                }
            ],
            "language": {
                "lengthMenu": "_MENU_ Data",
                "zeroRecords": "Tidak ada data yang tersedia pada tabel ini",
                "info": "Menampilkan Halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ditemukan data yang sesuai",
                "search": "Cari",
                "infoFiltered": "(filter dari _MAX_ entri keseluruhan)",
                "paginate": {
                    "first": "Pertama",
                    "previous": "Sebelumnya",
                    "next": "Selajutnya",
                    "last": "Terkahir"
                }
            },
            "scrollX": "500px",
            "scrollCollapse": true,
            "paging": false
        });
        $('#datatester1').dataTable({
            "lengthMenu": [
                [-1],
                ["All"]
            ],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    messageTop: 'Nama Pasar : ' + namapasar + ' / ' + 'Periode ' + mulaiy + '-' + selesaiy,
                },
                {
                    extend: 'csv',
                    messageTop: 'Nama Pasar : ' + namapasar + ' / ' + 'Periode ' + mulaiy + '-' + selesaiy,
                },
                {
                    extend: 'excel',
                    messageTop: 'Nama Pasar : ' + namapasar + ' / ' + 'Periode ' + mulaiy + '-' + selesaiy,
                },
                {
                    extend: 'pdf',
                    messageTop: 'Nama Pasar : ' + namapasar + ' / ' + 'Periode ' + mulaiy + '-' + selesaiy,
                },
                {
                    extend: 'print',
                    messageTop: 'Nama Pasar : ' + namapasar + ' / ' + 'Periode ' + mulaiy + '-' + selesaiy,
                }
            ],
            "language": {
                "lengthMenu": "_MENU_ Data",
                "zeroRecords": "Tidak ada data yang tersedia pada tabel ini",
                "info": "Menampilkan Halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ditemukan data yang sesuai",
                "search": "Cari",
                "infoFiltered": "(filter dari _MAX_ entri keseluruhan)",
                "paginate": {
                    "first": "Pertama",
                    "previous": "Sebelumnya",
                    "next": "Selajutnya",
                    "last": "Terkahir"
                }
            },
            "scrollX": "500px",
            "scrollCollapse": true,
            "paging": false
        });
        $('.datepicker').datepicker();
    });
</script>
@endsection

@section('css')
<link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
@endsection
