@extends('layouts.front-second')

@section('content')
<section class="why-choose-area">
        <div class="container ptb-100">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <form method="POST" action="{{route('perkomoditas')}}">
                            @csrf
                            <div class="form-group">
                                <label for="komoditas_id">Daftar Komoditas</label>
                                <select class="form-control" id="komoditas_id" name="komoditas_id">
                                    @foreach ($kom as $i)
                                    <option <?php if ($i->id == $komoditasid) {
                                                echo 'selected';
                                            } ?> value="{{$i->id}}">{{$i->namakomoditas}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Daftar Pasar (Tahan tombol ctrl atau control)</label>
                                <select multiple class="form-control" name="namapasar[]">
                                    <option value="semua">Semua Pasar</option>
                                    @foreach ($pasar as $i)
                                    <option value="{{$i->id}}">{{$i->namapasar}}</option>
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
                    <h2>PERKEMBANGAN HARGA PANGAN KOMODITAS / PASAR</h2>
                    <p>
                        @foreach ($kom as $i)
                        @if ($i->id == $komoditasid)
                        Nama Komoditas : <b>{{$i->namakomoditas}}</b></br>
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
                                        <th>Pasar</th>
                                        @foreach ($tanggal as $i)
                                        <th>
                                            <font size="2">{{substr($i->tgl,0,4).'-'.substr($i->tgl,5,2).'-'.substr($i->tgl,8,2)}}</font>
                                        </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($selectpasar as $i)
                                    <tr>
                                        <td style="vertical-align: middle;">{{$no++}}</td>
                                        <td>{{$i->namapasar}}</td>
                                        <?php
                                        // $query = DB::table('detail')
                                        // ->where('komoditas_id',$komoditasid)
                                        // ->where('pasar_id',$i->id)
                                        // ->whereBetween('detail.tanggal',[$mulai,$selesai])
                                        // ->get();
                                        // foreach($query as $b){
                                        //     echo '<td>'.'Rp'.number_format(round($b->harga_publish),0,',','.').'</td>';
                                        // }

                                        $pid = $i->id;
                                        $select = DB::table('tahun_laporan')
                                            ->leftJoin('detail', function ($join) use ($pid, $komoditasid, $mulai, $selesai) {
                                                $join->on('detail.detail_tgl', '=', 'tahun_laporan.tgl')
                                                    ->where('komoditas_id', $komoditasid)
                                                    ->where('pasar_id', $pid)
                                                    ->whereBetween('detail_tgl', [$mulai, $selesai]);
                                            })
                                            ->select('tahun_laporan.*', 'detail.*')
                                            ->whereBetween('tgl', [$mulai, $selesai])
                                            ->orderBy('tgl', 'asc')
                                            ->get();

                                        foreach ($select as $b) {
                                            if ($b->harga_publish == null) {
                                                echo '<td>Rp. 0</td>';
                                            } else {
                                                echo '<td>' . 'Rp' . number_format(round($b->harga_publish), 0, ',', '.') . '</td>';
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

        <div class="shape-img2"><img src="{{asset('aronix/assets/img/shape/2.svg')}}" alt="image"></div>
        <div class="shape-img3"><img src="{{asset('aronix/assets/img/shape/3.svg')}}" alt="image"></div>
        <div class="shape-img4"><img src="{{asset('aronix/assets/img/shape/4.png')}}" alt="image"></div>
        <div class="shape-img5"><img src="{{asset('aronix/assets/img/shape/5.png')}}" alt="image"></div>
        <div class="shape-img6"><img src="{{asset('aronix/assets/img/shape/6.png')}}" alt="image"></div>
        <div class="shape-img7"><img src="{{asset('aronix/assets/img/shape/7.png')}}" alt="image"></div>
        <div class="shape-img8"><img src="{{asset('aronix/assets/img/shape/8.png')}}" alt="image"></div>
        <div class="shape-img9"><img src="{{asset('aronix/assets/img/shape/9.png')}}" alt="image"></div>
        <div class="shape-img10"><img src="{{asset('aronix/assets/img/shape/10.png')}}" alt="image"></div>
</div>
@endsection

@section('css')
<link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
{{-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />  --}}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        @foreach($kom as $i)
        @if($i -> id == $komoditasid)
        var namakomoditas = '{{$i->namakomoditas}}';
        @endif
        @endforeach
        var mulaix = '{{$mulai}}';
        var selesaix = '{{$selesai}}';
        $('#datatester').dataTable({
            dom: 'Bfrtip',
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
            ]
        });
        $('.datepicker').datepicker();
    });
</script>
@endsection