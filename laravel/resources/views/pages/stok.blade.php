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
            <a href="" class="btn btn-success" title="Tambah Data Input" data-target="#datainput1" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Stok Barang</span></a>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="data" class="table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Nama Pasar</th>
                                <th>Stok Awal</th>
                                <th>Barang Masuk</th>
                                <th>Penjualan</th>
                                <th>Stok Akhir</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($select as $i)
                            <tr>
                                <td style="vertical-align: middle;">{{ $no++ }}</td>
                                <td style="vertical-align: middle;">{{ $i->namabarang }}</td>
                                <td style="vertical-align: middle;">{{ $i->namapasar }}</td>
                                <td style="vertical-align: middle;">{{ $i->stok_awal }}</td>
                                <td style="vertical-align: middle;">{{ $i->pemasok }}</td>
                                <td style="vertical-align: middle;">{{ $i->kebutuhan}}</td>
                                <td style="vertical-align: middle;">{{ $i->ketersediaan}}</td>
                                <td style="width: 16%;text-align: center">
                                    <a href="" class="btn btn-success" title="Ubah Data" data-target="#ubahdatainput{{$i->id}}" data-toggle="modal"><i class="fa fa-refresh"></i></span></a>
                                    <a href="" class="btn btn-warning" title="Lihat Data" data-target="#lihat{{$i->id}}" data-toggle="modal"><i class="fa fa-eye"></i></span></a>
                                    <?php if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin'){?>
                                    <a href="{{route('barang.delete',[$i->id])}}" class="btn btn-danger" title="Hapus Data"><i class="fa fa-remove"></i></span></a>
                                    <?php } ?>
                                    <! model ubah>
                                        <div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="text-align: left">
                                                    <form role="form" action="{{route('barang.update',[$i->id])}}" method="post" enctype="multipart/form-data">
                                                        {{method_field('PUT')}}
                                                        @csrf
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title">EDIT DATA BARU</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="box-body">
                                                                <?php if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin'){?>
                                                                <div class="form-group">
                                                                    <label for="users_id">Nama Petugas</label>
                                                                    <select class="form-control" id="users_id" name="users_id">
                                                                        @foreach ($petugas as $item)
                                                                        <option <?php if($item->id == $i->iduser){echo 'selected'; } ?> value="{{ $i->iduser }}">{{ $item->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="namapasar">Area Observasi</label>
                                                                    <select class="form-control" id="idpasar" name="idpasar">
                                                                        @foreach ($pasar as $item)
                                                                        <option <?php if($item->id == $i->pasar_id){echo 'selected'; } ?> value="{{ $item->id }}">{{ $item->namapasar }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label for="idbarang">Tanggal Observasi</label>
                                                                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="..." value="{{$i->detail_tgl}}">

                                                                </div>
                                                                <?php } ?>
                                                                <div class="form-group">
                                                                    <label for="nama_barang">Nama Barang</label>
                                                                    <select class="form-control" id="idbarang" name="idbarang" >
                                                                    <option value="{{$i->barang_id}}">{{$i->namabarang}}</option>
                                                                    @foreach ($barang as $activ) 
                                                                        <option value="{{$activ->id}}">{{$activ->namabarang}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pemasok">Stok Awal</label>
                                                                    <input type="number" class="form-control" id="stok_awal" name="stok_awal" placeholder="" value="{{$i->stok_awal}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pemasok">Barang Masuk</label>
                                                                    <input type="number" class="form-control" id="pemasok" name="pemasok" placeholder="" value="{{$i->pemasok}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kebutuhan">Penjualan</label>
                                                                    <input type="number" class="form-control" id="kebutuhan" name="kebutuhan" placeholder="" value="{{$i->kebutuhan}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ketersediaan">Stok Akhir</label>
                                                                    <input type="number" class="form-control" id="ketersediaan" name="ketersediaan" placeholder="" value="{{$i->ketersediaan}}">
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
                                                                <h4 class="modal-title">{{$i->namabarang}}</h4>
                                                            </div>
                                                            <div class="modal-body" style="text-align: left">
                                                                <input type="text" class="form-control" style="display: none;" id="datainput" name="datainput" value="datainput">
                                                                <div class="box-body">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <b>
                                                                                Nama Barang <br>
                                                                                Nama Pasar <br>
                                                                                Stok Awal <br>
                                                                                Barang Masuk <br>
                                                                                Penjualan <br>
                                                                                Stok Awal <br>
                                                                            </b>
                                                                        </div>
                                                                        <div class="col-md-8">

                                                                            : {{ $i->namabarang }}
                                                                            <br> : {{ $i->namapasar }}
                                                                            <br> : {{ $i->stok_awal }}
                                                                            <br> : {{ $i->pemasok }}
                                                                            <br> : {{ $i->kebutuhan}}
                                                                            <br> : {{ $i->ketersediaan}}
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
            <form role="form" action="{{route('barang.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">TAMBAH DATA STOK</h4>
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
                            <label for="idpasar">Area Observasi</label>
                            <select class="form-control" 
                            <?php if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin'){
                                echo 'id="idpasar" name="idpasar"';
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
                                echo '<input type="text" id="idpasar" name="idpasar" value="'.Auth::user()->pasar_id.'" style="display: none">';
                            }   
                        ?>
                        </div>
                        <div class="form-group">
                            <label for="idbarang">Nama Barang</label>
                            <select class="form-control" id="idbarang" name="idbarang" >
                            @foreach ($barang as $activ) 
                                <option value="{{$activ->id}}">{{$activ->namabarang}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idbarang">Tanggal Observasi</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="..." value="{{$b}}">

                        </div>
                        <div class="form-group">
                            <label for="stok_awal">Stok Awal</label>
                            <input type="number" class="form-control" id="stok_awal" name="stok_awal">
                        </div>
                        <div class="form-group">
                            <label for="pemasok">Barang Masuk</label>
                            <input type="number" class="form-control" id="pemasok" name="pemasok">
                        </div>
                        <div class="form-group">
                            <label for="kebutuhan">Penjualan</label>
                            <input type="number" class="form-control" id="kebutuhan" name="kebutuhan">
                        </div>
                        <div class="form-group">
                            <label for="ketersediaan">Stok Akhir</label>
                            <input type="number" class="form-control" id="ketersediaan" name="ketersediaan">
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
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
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