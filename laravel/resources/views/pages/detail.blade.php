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
            <a href="" class="btn btn-success" title="Tambah Data Input" data-target="#datainput1" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Transaksi Komoditas</span></a>
            <a href="" class="btn btn-info" title="Tambah Data Upload" data-target="#dataupload" data-toggle="modal"><i class="fa fa-upload"></i> Tambah Data Komoditas</span></a>
        </div>
        <div class="box-body">
            <form method="POST" action="{{route('detail.index')}}">
                @csrf
dasda
                <div class="row">
                    @if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin')
                    <div class="col-md-3">
                        <label for="pasar_id">Nama Pasar</label>
                        <select class="form-control" id="pasar_id" name="pasar_id">
                            <option value="">Semua Pasar</option>
                            @foreach ($pasar as $i)
                            <option <?php if($a == $i->id){echo 'selected';} ?> value="{{$i->id}}">{{$i->namapasar}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="col-md-3">
                        <label for="pasar_id">Tanggal Observasi</label>
                        <input data-date-format="yyyy-mm-dd" value="{{$b}}" name="tanggal" class="form-control datepicker">
                    </div>
                    <div class="col-md-6">
                        <label for="pasar_id">&nbsp;</label>
                        </br>
                        <button type="submit" class="btn btn-danger" title="Cari"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            </br>
            <div class="row">
                <div class="col-sm-12">
                    <table id="datakomoditas" class="table table-bordered table-hover table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasar</th>
                                <th>Nama Petugas</th>
                                <th>Komoditas</th>
                                <th>Tanggal</th>
                                <th>Harga</th>
                                <th>Status Harga</th>    
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($select as $i)
                            <tr>
                                <td style="vertical-align: middle;">{{ $no++ }}</td>
                                <td style="vertical-align: middle;">{{ $i->namapasar }}</td>
                                <td style="vertical-align: middle;">{{ $i->name }}</td>
                                <td style="vertical-align: middle;">{{ $i->namakomoditas }}</td>
                                <td style="vertical-align: middle;">
                                    <span class="label label-warning">Input. {{ $i->tanggal }}</span></br>
                                    <span class="label label-success">Update. {{ $i->tanggal_update }}</span>
                                </td>
                                <td style="vertical-align: middle;">Rp. {{ $i->harga_publish }}</td>
                                <td style="vertical-align: middle;">
                                    
                                        <?php 
                                            if($i->kondisi == 'naik'){
                                                echo '<span class="label label-danger">'.$i->kondisi.'</span>';
                                            }elseif($i->kondisi == 'stabil'){
                                                echo '<span class="label label-default">'.$i->kondisi.'</span>';
                                            }elseif($i->kondisi == 'turun'){
                                                echo '<span class="label label-success">'.$i->kondisi.'</span>';
                                            }else{
                                                echo '-';
                                            }
                                        ?>
                                </td>
                                
                                <td style="width: 16%;text-align: center">
                                    
                                        <a href="" class="btn btn-success" title="Ubah Data" data-target="#ubahdatainput{{$i->id}}" data-toggle="modal"><i class="fa fa-refresh"></i></span></a>
                                    @if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin')
										<a href="" class="btn btn-warning" title="Lihat Data" data-target="#lihat{{$i->id}}" data-toggle="modal"><i class="fa fa-eye"></i></span></a>
                                    @endif
                                        <a href="{{route('detail.destroy',[$i->id])}}" class="btn btn-danger" title="Hapus Data"><i class="fa fa-remove"></i></a>
                                    @if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin')
									<div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="text-align: left">
                                                <form role="form" action="{{route('detail.update',[$i->id])}}" method="post" enctype="multipart/form-data">
                                                    {{method_field('PUT')}} @csrf
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">EDIT DATA TRANSAKSI</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="text" style="display: none" class="form-control" id="tanggal" name="tanggal" placeholder="..." value="{{$b}}">
														<input type="text" style="display:none" id="status" name="status" value="admin">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="name">Nama Petugas</label>
                                                                <select class="form-control" id="name" name="name">
                                                                    @foreach ($petugas as $item)
                                                                    <option <?php if($item->id == $i->users_id){echo 'selected'; } ?> value="{{ $i->users_id }}">{{ $i->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="namapasar">Area Observasi</label>
                                                                <select class="form-control" id="pasar_id" name="pasar_id">
                                                                    @foreach ($pasar as $item)
                                                                    <option <?php if($item->id == $i->pasar_id){echo 'selected'; } ?> value="{{ $item->id }}">{{ $item->namapasar }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="komoditas">Komoditas (item)</label>
                                                                <select class="form-control" id="komoditas-id" name="komoditas_id">
                                                                    @foreach ($komoditas as $item)
                                                                    <option <?php if($item->id == $i->komoditas_id){echo 'selected'; } ?> value="{{ $item->id }}">{{ $item->namakomoditas }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="harga">Harga Pasar (Rp.)</label>
                                                                <input type="text" class="form-control" id="harga" name="harga_pasar" placeholder="..." value="{{$i->harga_pasar}}" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="harga">Harga Admin (Rp.)</label>
                                                                <input type="text" class="form-control" id="harga" placeholder="Diisi jika ada perubahan harga" name="harga_admin" placeholder="..." value="{{$i->harga_admin}}" >
                                                            </div>
                                                            <div class="form-group">
                                                                    <label for="harga">Harga Publish (Rp.)</label>
                                                                    <input type="text" class="form-control" id="harga" name="harga_publish" placeholder="..." value="{{$i->harga_publish}}" readonly>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-mail-reply"></i> Kembali</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
									@elseif(Auth::user()->akses == 'user' or Auth::user()->akses == 'User')
<div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="{{route('detail.update',[$i->id])}}" method="post" enctype="multipart/form-data">
                {{method_field('PUT')}} @csrf
                <div class="modal-header" style="text-align: left">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">EDIT DATA TRANSAKSI</h4>
                </div>
                <div class="modal-body" style="text-align: left">
                    <div class="box-body">
                        <div class="form-group">
						<input type="text" style="display:none" id="status" name="status" value="user">
						<input type="text" style="display: none" class="form-control" id="tanggal" name="tanggal" placeholder="..." value="{{$b}}">
                            <label for="users_id">Nama Petugas</label>
                            <select class="form-control" 
                            <?php if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin'){
                                echo 'id="users_id" name="users_id"';
                                }
                            ?>
                            <?php
                                if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
                                    echo 'disabled';
                                }   
                            ?>
                            >
                                @foreach ($petugas as $items)
                                    <option <?php 
                                        if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
                                            if( Auth::user()->id == $items->id){
                                                echo 'selected';
                                            }
                                        }
                                    ?> value="{{$items->id}}">{{$items->name}}</option>
                                @endforeach
                            </select>
                            <?php
                                if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
                                    echo '<input type="text" id="users_id" name="users_id" value="'.Auth::user()->id.'" style="display: none">';
                                }   
                            ?>
                            
                        </div>
                        <div class="form-group">
                            <label for="pasar_id">Area Observasi</label>
                            <select class="form-control" 
                            <?php if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin'){
                                echo 'id="pasar_id" name="pasar_id"';
                                }
                            ?>
                            <?php
                                if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
                                    echo 'disabled';
                                }   
                            ?>
                            >
                                @foreach ($pasar as $items)
                                    <option 
                                    <?php 
                                        if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
                                            if( Auth::user()->pasar_id == $items->id){
                                                echo 'selected';
                                            }
                                        }
                                    ?> value="{{$items->id}}">{{$items->namapasar}}</option>
                                @endforeach
                            </select>
                            <?php
                            if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
                                echo '<input type="text" id="pasar_id" name="pasar_id" value="'.Auth::user()->pasar_id.'" style="display: none">';
                            }   
                        ?>
                        </div>
                        <div class="form-group">
                            <label for="komoditas_id">Komoditas (item)</label>
                            <select class="form-control" id="komoditas_id" name="komoditas_id">
                                @foreach ($komoditas as $items)
                                <option <?php if($items->id == $i->komoditas_id){echo 'selected';} ?> value="{{$items->id}}">{{$items->namakomoditas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Riil Observasi (Rp.)</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="{{$i->harga_pasar}}" placeholder="...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-mail-reply"></i> Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>
									@endif
                                    <div class="modal fade" id="lihat{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="lihat{{$i->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form role="form" action="" method="post">
                                                    @csrf
                                                    <div class="modal-header" style="text-align: left">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">Data Transaksi Komoditas</h4>
                                                    </div>
                                                    <div class="modal-body" style="text-align: left">
                                                        <input type="text" class="form-control" style="display: none;" id="datainput" name="datainput" value="datainput">
                                                        <div class="box-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <b>
                                                                            Nama Petugas <br>
                                                                            Komoditas <br>
                                                                            Area Observasi <br>
                                                                            Tanggal Observasi <br>
                                                                            Harga Pasar <br>
                                                                            Harga Admin <br>
                                                                            Harga Publish <br>
                                                                            Tanggal Update Harga<br>
                                                                            </b>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    : {{ $i->name }}
                                                                    <br> : {{ $i->namakomoditas }}
                                                                    <br> : {{ $i->namapasar }}
                                                                    <br> : {{ $i->tanggal }}
                                                                    <br> : Rp.{{ $i->harga_pasar }}
                                                                    <br> : Rp.{{ $i->harga_admin }}
                                                                    <br> : Rp.{{ $i->harga_publish }}
                                                                    <br> : {{ $i->tanggal_update }}
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
            <form role="form" action="{{route('detail.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">TAMBAH DATA TRANSAKSI</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="users_id">Nama Petugas</label>
                            <select class="form-control" 
                            <?php if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin'){
                                echo 'id="users_id" name="users_id"';
                                }
                            ?>
                            <?php
                                if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
                                    echo 'disabled';
                                }   
                            ?>
                            >
                                @foreach ($petugas as $i)
                                    <option <?php 
                                        if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
                                            if( Auth::user()->id == $i->id){
                                                echo 'selected';
                                            }
                                        }
                                    ?> value="{{$i->id}}">{{$i->name}}</option>
                                @endforeach
                            </select>
                            <?php
                                if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
                                    echo '<input type="text" id="users_id" name="users_id" value="'.Auth::user()->id.'" style="display: none">';
                                }   
                            ?>
                            
                        </div>
                        <div class="form-group">
                            <label for="pasar_id">Area Observasi</label>
                            <select class="form-control" 
                            <?php if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin'){
                                echo 'id="pasar_id" name="pasar_id"';
                                }
                            ?>
                            <?php
                                if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
                                    echo 'disabled';
                                }   
                            ?>
                            >
                                @foreach ($pasar as $i)
                                    <option 
                                    <?php 
                                        if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
                                            if( Auth::user()->pasar_id == $i->id){
                                                echo 'selected';
                                            }
                                        }
                                    ?> value="{{$i->id}}">{{$i->namapasar}}</option>
                                @endforeach
                            </select>
                            <?php
                            if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
                                echo '<input type="text" id="pasar_id" name="pasar_id" value="'.Auth::user()->pasar_id.'" style="display: none">';
                            }   
                        ?>
                        </div>
                        <div class="form-group">
                            <label for="komoditas_id">Komoditas (item)</label>
                            <select class="form-control" id="komoditas_id" name="komoditas_id">
                                @foreach ($komoditas as $i)
                                <option value="{{$i->id}}">{{$i->namakomoditas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Riil Observasi (Rp.)</label>
                            <input type="text" class="form-control" id="harga" name="harga" placeholder="...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-mail-reply"></i> Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="dataupload" tabindex="-1" role="dialog" aria-labelledby="dataupload">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="{{route('detail.import')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">UNGGAH DATA KOMODITAS BARU</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <a href="{{URL::to('document_/Format.xlsx')}}">Download Format Upload.xlsx</a>
                        </div>
                        <div class="form-group">
                            <label for="dataupload1">File (.xlsx - Max 5mb)</label>
                            <input type="file" id="dataupload" name="dataupload">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Unggah</button>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-mail-reply"></i> Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#datakomoditas').dataTable({
            "lengthMenu": [
                [19],
                ["19"]
            ],
            //paging: false,
            dom: 'Bfrtip',
            buttons: [
                //'copy', 'csv', 'excel', 'pdf', 'print',
			{
                extend: 'copy',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
			{
                extend: 'print',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
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
            }
        });
        $('.datepicker').datepicker();
        $('#datatester').dataTable();
    });
</script>
@endsection