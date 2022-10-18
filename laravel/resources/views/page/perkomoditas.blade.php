@extends('layouts.front-second')

@section('content')
<section class="blog-area bg-F4F7FC" style="padding-top: 152px;">
    <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12" style="background-color:#e1fcef; height: 1600px;">                
                        <div class="why-choose-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="grid-col-demo">
                                        <label for="ddCommodity" class="col-form-label">Komoditas</label>
                                        <select name="ctl00$mainContent$ddCommodity" id="nama_komiditas" class="form-control">
                                            @foreach ($kom as $i)
                                            <option <?php if ($i->id == $komoditasid) {
                                                        echo 'selected';
                                                    } ?> value="{{$i->id}}">{{$i->namakomoditas}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="grid-col-demo">
                                        <label for="example-date-input" class="col-form-label">Tanggal</label>
                                        <div class="">
                                            <input type="date" data-date-format="dd-mm-yyyy" value="{{substr($mulai,0,4).'-'.substr($mulai,5,2).'-'.substr($mulai,8,2)}}" name="tanggal_komoditas" id="tanggal_komoditas" class="form-control datepicker">
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div id="chartdiv" style="width: 100%;height: 500px;font-size	: 11px;  overflow: visible; text-align: left; padding: 10px;"></div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-12" style="background-color:#e8f4ff; height: 1600px;">
                            <div class="row">
                                <div class="col-lg-6">
                                    <span class="grid-col-demo">
                                        <label for="ddCity" class="col-form-label">Pasar</label>
                                        <select class="form-control" id="nama_pasar" name="nama_pasar">
                                            <option value="semua">Semua Pasar</option>
                                            @foreach ($pasar as $i)
                                            <option value="{{$i->id}}">{{$i->namapasar}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="grid-col-demo col-form-label">
                                        <label for="example-date-input" class="col-form-label">Tgl Sebelum</label>
                                        <div class="">
                                            <input id="start_date" type="date" class="form-control" value="{{substr($tanggalLast,0,4).'-'.substr($tanggalLast,5,2).'-'.substr($tanggalLast,8,2)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="grid-col-demo col-form-label">
                                        <label for="example-date-input" class="col-form-label">Tgl Perbandingan</label>
                                        <div class="">
                                            <input id="end_date" type="date" class="form-control" value="{{substr($mulai,0,4).'-'.substr($mulai,5,2).'-'.substr($mulai,8,2)}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-10">
                                <div class="m-t-10">
                                    <div style="text-align:center;padding:10px;background-color:#081f36;border-radius:5px 5px 0 0;-webkit-border-radius:5px 5px 0 0;-moz-border-radius:5px 5px 0 0;color:#fff;">Perbandingan Harga Barang Kebutuhan Pokok <span class="table_level_title">Nasional</span></div>
                                    <div id="table-1-content">
                                        <table id="datatable_harga_keb_pokok" class="table table_morecondensed table-sm table-hover" cellspacing="0" cellpadding="0" style="font-size: 12px;">
                                            <thead style="color: #495057; background-color: #e9ecef; border-color: #dee2e6; font-size: 14px; font-weight: bold;">
                                                <!-- <tr>
                                                    <th></th>
                                                    <th style="width: 150px;">Komoditas</th>
                                                    <th style="text-align: left; width: 50px;">Sat</th>
                                                    <th style="width: 250px;" class="table_col_price_2" style="text-align: left; font-size: small;">{{substr($tanggalLast,0,4).'-'.substr($tanggalLast,5,2).'-'.substr($tanggalLast,8,2)}}</th>
                                                    <th style="width: 250px;" class="table_col_price_1" style="text-align: left; font-size: small;">{{substr($mulai,0,4).'-'.substr($mulai,5,2).'-'.substr($mulai,8,2)}}</th>
                                                    <th style="text-align: left; width: 50px;">(%)</th>
                                                    <th style="text-align: left; font-size: small;">Ket</th>
                                                </tr> -->
                                            </thead>
                                            <tbody>                                                
                                            
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

@section('css')

@endsection

@section('js')

<script>


$(document).ready(function() {
    var nama_komiditas = $('#nama_komiditas').val();
    var tanggal_komoditas = $('#tanggal_komoditas').val();
    get_data_komoditas(nama_komiditas, tanggal_komoditas);

    var nama_pasar = $('#nama_pasar').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    table_komoditas(nama_pasar,start_date,end_date);
});
$('#nama_komiditas').change(function(){
    var nama_komiditas = $('#nama_komiditas').val();
    var tanggal_komoditas = $('#tanggal_komoditas').val();
    get_data_komoditas(nama_komiditas, tanggal_komoditas);
});

$('#tanggal_komoditas').change(function(){
    var nama_komiditas = $('#nama_komiditas').val();
    var tanggal_komoditas = $('#tanggal_komoditas').val();
    get_data_komoditas(nama_komiditas, tanggal_komoditas);
});

function get_data_komoditas(nama_komiditas, tanggal_komoditas) {
    $.ajax('{!! route('chartKomoditas') !!}', {
        data: {komoditas: nama_komiditas, tgl: tanggal_komoditas}
        }).done(function (data) {
            dataharga(data);
        });
}

$('#nama_pasar').change(function(){
    var nama_pasar = $('#nama_pasar').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    table_komoditas(nama_pasar,start_date,end_date);
});
$('#start_date').change(function(){
    var nama_pasar = $('#nama_pasar').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    table_komoditas(nama_pasar,start_date,end_date);
});
$('#end_date').change(function(){
    var nama_pasar = $('#nama_pasar').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();

    table_komoditas(nama_pasar,start_date,end_date);
});


function table_komoditas(nama_pasar, start_date,end_date){
    $.ajax('{!! route('chartPasarStatistik') !!}', {
        data: {pasar: nama_pasar, tgl_start: start_date, tgl_end: end_date}
        }).done(function (data) {
            table = $('#datatable_harga_keb_pokok').DataTable({
                "searching": false,
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bInfo": false,
                "bAutoWidth": false,
                "pageLength": 12,
                data: data,
                columns: [
                    { title: "Komoditas" },
                    { title: "Sat" },
                    { title: "Harga Sebelum" },
                    { title: "Harga Sekarang" },
                    { title: "%" },
                    { title: "Ket" }

                ]
            }
            );
            
            table.destroy();
        });
    
}
function dataharga(data) {
        var chart = AmCharts.makeChart("chartdiv", {
            "theme": "none",
            "type": "serial",
            "dataProvider": data,
            "valueAxes": [{
                "stackType": "3d",
                "position": "left",
                "title": "Harga",
            }],
            "startDuration": 1,
            "graphs": [{
                "balloonText": "Harga "+ $('#nama_komiditas').find(":selected").text() +" di [[category]] (Harga Kemaren): <b>[[value]]</b>",
                "fillAlphas": 0.9,
                "lineAlpha": 0.2,
                "title": "Harga Kemaren",
                "type": "column",
                "valueField": "price_last"
            }, {
                "balloonText": "Harga "+ $('#nama_komiditas').find(":selected").text() +" di [[category]] (Harga Sekarang): <b>[[value]]</b>",
                "fillAlphas": 0.9,
                "lineAlpha": 0.2,
                "title": "Harga Sekarang",
                "type": "column",
                "valueField": "price_now"
            }],
            "plotAreaFillAlphas": 0.1,
            "depth3D": 60,
            "angle": 30,
            "categoryField": "pasar",
            "categoryAxis": {
                "gridPosition": "start"
            },
            "export": {
                "enabled": true
            }
        });
        jQuery('.chart-input').off().on('input change',function() {
        var property	= jQuery(this).data('property');
        var target		= chart;
        chart.startDuration = 0;

        if ( property == 'topRadius') {
            target = chart.graphs[0];
                if ( this.value == 0 ) {
                this.value = undefined;
                }
        }

        target[property] = this.value;
        chart.validateNow();
        });
}


</script>
@endsection