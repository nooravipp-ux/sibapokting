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
            <a href="" class="btn btn-success" title="Tambah Data Input" data-target="#datainput1" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data distributor</span></a>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="data" class="table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Distributor</th>
                                <th>Alamat</th>
                                <th>Telp</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($select as $i)
                            <tr>
                                <td style="vertical-align: middle;">{{ $no++ }}</td>
                                <td style="vertical-align: middle;">{{ $i->nama_distributor }}</td>
                                <td style="vertical-align: middle;">{{ $i->lokasi }}</td>
                                <td style="vertical-align: middle;">{{ $i->no_telp }}</td>
                                <td style="vertical-align: middle;">{{ $i->keterangan }}</td>
                                <td style="width: 16%;text-align: center">
                                    <a href="" class="btn btn-success" title="Ubah Data" data-target="#ubahdatainput{{$i->id}}" data-toggle="modal"><i class="fa fa-refresh"></i></span></a>
                                    <a href="" class="btn btn-warning" title="Lihat Data" data-target="#lihat{{$i->id}}" data-toggle="modal"><i class="fa fa-eye"></i></span></a>
                                    <a href="{{route('distributor.delete',[$i->id])}}" class="btn btn-danger" title="Hapus Data"><i class="fa fa-remove"></i></span>
                                    </a>
                                    <! model ubah>
                                        <div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="text-align: left">
                                                    <form role="form" action="{{route('distributor.update',[$i->id])}}" method="post" enctype="multipart/form-data">
                                                        {{method_field('PUT')}}
                                                        @csrf
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title">EDIT DATA BARU</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="nama_distributor">Nama Distributor</label>
                                                                    <input type="text" class="form-control" id="nama_distributor" name="nama_distributor" placeholder="..." value="{{$i->nama_distributor}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="lokasi">Alamat</label>
                                                                    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="..." value="{{$i->lokasi}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="no_telp">Telp</label>
                                                                    <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="8888" value="{{$i->no_telp}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="keterangan">Keterangan</label>
                                                                    <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10">{{$i->keterangan}}</textarea>
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
                                                                <h4 class="modal-title">{{$i->nama_distributor}}</h4>
                                                            </div>
                                                            <div class="modal-body" style="text-align: left">
                                                                <input type="text" class="form-control" style="display: none;" id="datainput" name="datainput" value="datainput">
                                                                <div class="box-body">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <b>
                                                                                Nama Distributor <br>
                                                                                Alamat <br>
                                                                                Telp <br>
                                                                                Keterangan <br>
                                                                            </b>
                                                                        </div>
                                                                        <div class="col-md-8">

                                                                            : {{ $i->nama_distributor }}
                                                                            <br> : {{ $i->lokasi }}
                                                                            <br> : {{ $i->no_telp }}
                                                                            <br> : {{ $i->keterangan }}
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
            <form role="form" action="{{route('distributor.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">TAMBAH DATA DISTRIBUTOR</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama_distributor">Nama Distributor</label>
                            <input type="text" class="form-control" id="nama_distributor" name="nama_distributor" placeholder="...">
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Alamat</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="...">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Telp</label>
                            <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="8888">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="" cols="30" rows="10"></textarea>
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