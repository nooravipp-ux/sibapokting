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
            <a href="" class="btn btn-success" title="Tambah Data Input" data-target="#datainput1" data-toggle="modal"><i class="fa fa-plus"></i> Tambah User</span></a>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="data" class="table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Area Observasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($select as $i)
                            <tr>
                                <td style="vertical-align: middle;">{{ $no++ }}</td>
                                <td style="vertical-align: middle;">{{ $i->name }}</td>
                                <td style="vertical-align: middle;">{{ $i->email }}</td>
                                <td style="vertical-align: middle;">{{ $i->namapasar }}</td>
                                <td style="width: 16%;text-align: center">
                                    <a href="" class="btn btn-success" title="Ubah Data" data-target="#ubahdatainput{{$i->id}}" data-toggle="modal"><i class="fa fa-refresh"></i></span></a>
                                    <a href="" class="btn btn-warning" title="Lihat Data" data-target="#lihat{{$i->id}}" data-toggle="modal"><i class="fa fa-eye"></i></span></a>
                                    <a href="{{route('user.delete',[$i->id])}}" class="btn btn-danger" title="Hapus Data"><i class="fa fa-remove"></i></span>
                                    </a>
                                    <! model ubah >
                                    <div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="text-align: left">
                                                <form role="form" action="{{route('user-management.update',[$i->id])}}" method="post" enctype="multipart/form-data">
                                                    {{method_field('PUT')}}
                                                    @csrf
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">EDIT DATA PETUGAS</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                            <input type="text" style="display: none" class="form-control" id="id" name="id" placeholder="..." value="{{$i->id}}">
                                                        <div class="box-body">
                                                                <div class="form-group">
                                                                        <label for="name">Nama Petugas</label>
                                                                        <input type="text" class="form-control" id="name" name="name" placeholder="..." value="{{$i->name}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">Email Petugas</label>
                                                                        <input type="email" class="form-control" id="email" name="email" placeholder="..." value="{{$i->email}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="password">Password Baru</label>
                                                                        <input type="text" class="form-control" id="password" name="password" placeholder="Isi jika ingin merubah password">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="akses">Hak Akses</label>
                                                                        <select class="form-control" id="akses" name="akses">
                                                                            <option <?php if($i->akses == 'admin' or $i->akses == 'Admin'){ echo 'selected';} ?> value="admin">Admin</option>
                                                                            <option <?php if($i->akses == 'user' or $i->akses == 'User'){ echo 'selected';} ?> value="user">User</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="namapasar">Area Observasi</label>
                                                                        <select class="form-control" id="pasar_id" name="pasar_id">
                                                                            @foreach ($wilayah as $av)
                                                                            <option value="{{$av->id}}">{{$av->namapasar}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-mail-reply"></i> Kembali</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <! /.modal-content >
                                        </div>
                                        <! /.modal-dialog >
                                    </div>
                                    <! /.modal >
                                    <div class="modal fade" id="lihat{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="lihat{{$i->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form role="form" action="" method="post">
                                                    @csrf
                                                    <div class="modal-header" style="text-align: left">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">{{ $i->name  }}</h4>
                                                    </div>
                                                    <div class="modal-body" style="text-align: left">
                                                        <input type="text" class="form-control" style="display: none;" id="datainput" name="datainput" value="datainput">
                                                        <div class="box-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <b>
                                                                            Nama Petugas <br>
                                                                            Email Petugas <br>
                                                                            Area Observasi <br>
                                                                            Hak Akses <br>
                                                                            </b>
                                                                </div>
                                                                <div class="col-md-8">

                                                                    : {{ $i->name }}
                                                                    <br> : {{ $i->email }}
                                                                    <br> : {{ $i->namapasar }}
                                                                    <br> : {{ $i->akses }}
                                                                    <br>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
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
<div class="modal fade" id="datainput1" tabindex="-1" role="dialog" aria-labelledby="datainput1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="{{route('user-management.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">TAMBAH DATA PETUGAS</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nama Petugas</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="...">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Petugas</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="...">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="...">
                        </div>
                        <div class="form-group">
                            <label for="akses">Hak Akses</label>
                            <select class="form-control" id="akses" name="akses">
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="namapasar">Area Observasi</label>
                            <select class="form-control" id="namapasar" name="namapasar">
                                @foreach ($wilayah as $i)
                                <option value="{{$i->id}}">{{$i->namapasar}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-mail-reply"></i> Kembali</button>
                </div>
            </form>
        </div>
        <! /.modal-content >
    </div>
    <! /.modal-dialog >
</div>
<! /.modal >

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
    });
</script>
@endsection