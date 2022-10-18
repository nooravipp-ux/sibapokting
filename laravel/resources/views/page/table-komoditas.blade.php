@extends('layouts.front-table')

@section('content')
<div class="az-content-body">
    <div class="row">
        <div class="col-sm-12">
            <br>
                <h4 style="text-align: center">PERKEMBANGAN HARGA PANGAN <br> KOMODITAS / PASAR</h4>
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
                            <table id="datatester" class="display responsive nowrap" width="100%">
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
                                    @foreach ($pasar as $i)
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
@endsection

@section('css')
<link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('front/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ asset('front/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
 {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>  --}}
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
        @foreach ($kom as $i)
        @if ($i->id == $komoditasid)
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

