@extends('layouts.master') @section('content')
<section class="content-header">
    <h1>
        <span class="badge bg-green">{{ str_replace('-',' ',request()->segment(2)) }}</span>
        <small>Panel</small>
    </h1>
</section>

<section class="content">
    <div class="box box-default">
        <div class="box-header hidden-print with-border">
            <a href="" class="btn btn-success" title="Tambah Data Input" data-target="#datainput1" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data LPG</span></a>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="data" class="table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pangkalan</th>
                                <th>Alamat Pangkalan</th>
                                <th>Nama Agen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($select as $i)
                            <tr>
                                <td style="vertical-align: middle;">{{ $no++ }}</td>
                                <td style="vertical-align: middle;">{{ $i->nama_pangkalan }}</td>
                                <td style="vertical-align: middle;">{{ $i->alamat_pangkalan }}</td>
                                <td style="vertical-align: middle;">{{ $i->nama_agen }}<br><b>Alamat : </b>{{ $i->alamat_agen }}</td>
                                <td style="width: 16%;text-align: center">
                                    <a href="" class="btn btn-success" title="Ubah Data" data-target="#ubahdatainput{{$i->id}}" data-toggle="modal"><i class="fa fa-refresh"></i></span></a>
                                    <a href="" class="btn btn-warning" title="Lihat Data" data-target="#lihat{{$i->id}}" data-toggle="modal"><i class="fa fa-eye"></i></span></a>
                                    <a href="{{route('lpg.delete',[$i->id])}}" class="btn btn-danger" title="Hapus Data"><i class="fa fa-remove"></i></span>
                                    </a>
                                    <! model ubah>
                                        <div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="text-align: left">
                                                    <form role="form" action="{{route('lpg.update',[$i->id])}}" method="post" enctype="multipart/form-data">
                                                        {{method_field('PUT')}}
                                                        @csrf
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title">EDIT DATA BARU</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="nama_pangkalan">Nama Pangkalan</label>
                                                                    <input type="text" class="form-control" id="nama_pangkalan" name="nama_pangkalan"  value="{{$i->nama_pangkalan}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="alamat_pangkalan">Alamat Pangkalan</label>
                                                                    <input type="text" class="form-control" id="alamat_pangkalan" name="alamat_pangkalan"  value="{{$i->alamat_pangkalan}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_agen">Nama Agen</label>
                                                                    <input type="text" class="form-control" id="nama_agen" name="nama_agen"  value="{{$i->nama_agen}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="alamat_agen">Alamat Agen</label>
                                                                    <input type="text" class="form-control" id="alamat_agen" name="alamat_agen" value="{{$i->alamat_agen}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-mail-reply"></i> Kembali</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <! /.modal-content>
                                            </div>
                                            <! /.modal-dialog>
                                        </div>
                                        <! /.modal>
                                            <div class="modal fade" id="lihat{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="lihat{{$i->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form role="form" action="" method="post">
                                                            @csrf
                                                            <div class="modal-header" style="text-align: left">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                <h4 class="modal-title">{{$i->nama_pangkalan}}</h4>
                                                            </div>
                                                            <div class="modal-body" style="text-align: left">
                                                                <input type="text" class="form-control" style="display: none;" id="datainput" name="datainput" value="datainput">
                                                                <div class="box-body">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <b>
                                                                                Nama Agen <br>
                                                                                alamat_Pangkalan <br>
                                                                                nama_agen <br>
                                                                                alamat_agen <br>
                                                                            </b>
                                                                        </div>
                                                                        <div class="col-md-8">

                                                                            : {{ $i->nama_pangkalan }}
                                                                            <br> : {{ $i->alamat_pangkalan }}
                                                                            <br> : {{ $i->nama_agen }}
                                                                            <br> : {{ $i->alamat_agen}}
                                                                            <br>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                <! /.modal-content>
                                            </div>
                                            <! /.modal-dialog>
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
<div class="modal fade" id="datainput1" tabindex="-1" role="dialog" aria-labelledby="datainput1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="{{route('lpg.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">TAMBAH DATA LPG</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama_pangkalan">Nama Pangkalan</label>
                            <input type="text" class="form-control" id="nama_pangkalan" name="nama_pangkalan" >
                        </div>
                        <div class="form-group">
                            <label for="alamat_pangkalan">Alamat Pangkalan</label>
                            <input type="text" class="form-control" id="alamat_pangkalan" name="alamat_pangkalan" >
                        </div>
                        <div class="form-group">
                            <label for="nama_agen">Nama Agen</label>
                            <input type="text" class="form-control" id="nama_agen" name="nama_agen" >
                        </div>
                        <div class="form-group">
                            <label for="alamat_agen">Alamat Agen</label>
                            <input type="text" class="form-control" id="alamat_agen" name="alamat_agen" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-mail-reply"></i> Kembali</button>
                </div>
            </form>
        </div>
        <! /.modal-content>
    </div>
    <! /.modal-dialog>
</div>
<! /.modal>

    @endsection @section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data').dataTable({
                dom: 'Bfrtip',
                buttons: [
                    //'copy', 'csv', 'excel', 'pdf', 'print'
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    }
                ],
                "searching": true,
                "language": {
                    "lengthMenu": "_MENU_ Data",
                    "zeroRecords": "Tidak ada data yang tersedia pada tabel ini",
                    "info": "Menampilkan _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ditemukan data yang sesuai",
                    "search": "Cari",
                    "infoFiltered": "(filter dari _MAX_ entri keseluruhan)",
                    "paginate": {
                        "first": "Pertama",
                        "previous": "Sebelumnya",
                        "next": "Selajutnya",
                        "last": "Terkahir"
                    }
                }
            });
            $('#summernote').summernote({
                height: 350,
                minHeight: null,
                maxheight: null,
                focus: false
            });
            $('#summernotes').summernote({
                height: 350,
                minHeight: null,
                maxheight: null,
                focus: false
            });
        });
    </script>
    @endsection