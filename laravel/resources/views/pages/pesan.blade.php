@extends('layouts.master') 

@section('content')
<section class="content-header">
        <h1>
            <span class="badge bg-green">{{ str_replace('-',' ',request()->segment(2)) }}</span>
            <small>Panel</small>
        </h1>
    </section>
    
    <section class="content">
        <div class="box box-default">
            <div class="box-header hidden-print with-border">
                <div id="datatable_button_stack" class="pull-right text-right hidden-xs"></div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datapesan" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                    <th>Tanggal</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesan as $i) 
                                <tr>
                                <td style="vertical-align: middle;">{{$i->nama}}</td>
                                <td style="vertical-align: middle;">{{$i->email}}</td>
                                <td style="vertical-align: middle;">{{$i->pesan}}</td>
                                <td style="vertical-align: middle;">{{$i->tanggal}}</td>
                                <td style="width: 16%;text-align: center">
                                    <a href="" class="btn btn-success" title="Edit Data" data-target="#ubahdatainput{{$i->id}}" data-toggle="modal"><i class="fa fa-eye"></i></span></a> 
                                    <a href="{{route('pesandestroy',[$i->id])}}" class="btn btn-danger" title="Hapus Data"><i class="fa fa-remove"></i></span></a>
                                    <!-- model ubah -->
                                    <div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form role="form" action="{{route('tentangupdate',[$i->id])}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-header" style="text-align: left">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title">UBAH</h4>
                                                    </div>
                                                    <div class="modal-body" style="text-align: left">
                                                        <input type="text" class="form-control" style="display: none;" id="id" name="id" value="{{$i->id}}">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="judul">Nama<span style="color: red;">*</span></label>
                                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="..." value="{{$i->nama}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="judul">Email<span style="color: red;">*</span></label>
                                                                <input type="text" class="form-control" id="email" name="judul" placeholder="..." value="{{$i->email}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="judul">Tanggal<span style="color: red;">*</span></label>
                                                                <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="..." value="{{$i->tanggal}}">
                                                            </div>
                                                            <div class="form-group">
                                                                    <label for="konten">Isi Konten <span style="color: red;">*</span></label>
                                                                    <textarea id="konten" name="konten" placeholder="Place some text here"
                                                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                    {!! html_entity_decode($i->pesan) !!}
                                                                    </textarea>
                                                                </div></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-mail-reply"></i> Kembali</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#datapesan').dataTable({
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
            dom: 'Bfrtip',
            buttons: [
               //'copy', 'csv', 'excel', 'pdf', 'print'
			{
                extend: 'copy',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
			{
                extend: 'print',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            }
            ],
        });
        $('.textarea').wysihtml5();
    });
</script>
@endsection
