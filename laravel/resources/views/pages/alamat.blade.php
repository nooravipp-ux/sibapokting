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
                <h4>MENU INFORMASI</h4>
                <a href="" class="btn btn-success" title="Tambah Data Input" data-target="#datainput1" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Alamat / Link Informasi</span></a>
                <div id="datatable_button_stack" class="pull-right text-right hidden-xs"></div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="data" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Alamat / Link</th>
                                    <th>Type</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alamat1 as $i) 
                                <tr>
                                <td style="vertical-align: middle;">{{$i->judul}}</td>
                                <td style="vertical-align: middle;">{{$i->sumber}}</td>
                                <td style="vertical-align: middle;">{{$i->type}}</td>
                                <td style="width: 16%;text-align: center">
                                    <a href="" class="btn btn-success" title="Edit Data" data-target="#ubahdatainput{{$i->id}}" data-toggle="modal"><i class="fa fa-eye"></i></span></a> 
                                    <a href="{{route('informasidestroy',[$i->id])}}" class="btn btn-danger" title="Hapus Data"><i class="fa fa-remove"></i></span></a>
                                    <!-- model ubah -->
                                    <div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form role="form" action="{{route('informasiupdate',[$i->id])}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-header" style="text-align: left">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title">UBAH BANNER BARU</h4>
                                                    </div>
                                                    <div class="modal-body" style="text-align: left">
                                                        <input type="text" class="form-control" style="display: none;" id="id" name="id" value="{{$i->id}}">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="judul">Judul<span style="color: red;">*</span></label>
                                                                <input type="text" class="form-control" id="judul" name="judul" placeholder="..." value="{{$i->judul}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sumber">Alamat Link<span style="color: red;">*</span></label>
                                                                <input type="text" class="form-control" id="sumber" name="sumber" placeholder="..." value="{{$i->sumber}}">
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
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- level --}}
        <div class="box box-default">
                <div class="box-header hidden-print with-border">
                        <h4>MENU INSTANSI</h4>
                    <a href="" class="btn btn-success" title="Tambah Data Input" data-target="#datainput2" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Alamat / Link Instansi Terkait</span></a>
                <div id="datatable_button_stack" class="pull-right text-right hidden-xs"></div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="data" class="table table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Alamat / Link</th>
                                        <th>Type</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alamat2 as $i) 
                                    <tr>
                                    <td style="vertical-align: middle;">{{$i->judul}}</td>
                                    <td style="vertical-align: middle;">{{$i->sumber}}</td>
                                    <td style="vertical-align: middle;">{{$i->type}}</td>
                                    <td style="width: 16%;text-align: center">
                                        <a href="" class="btn btn-success" title="Edit Data" data-target="#ubahdatainput{{$i->id}}" data-toggle="modal"><i class="fa fa-eye"></i></span></a> 
                                        <a href="{{route('instansiterkaitdestroy',[$i->id])}}" class="btn btn-danger" title="Hapus Data"><i class="fa fa-remove"></i></span></a>
                                        <!-- model ubah -->
                                        <div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form role="form" action="{{route('instansiterkaitupdate',[$i->id])}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-header" style="text-align: left">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                <h4 class="modal-title">UBAH BANNER BARU</h4>
                                                        </div>
                                                        <div class="modal-body" style="text-align: left">
                                                            <input type="text" class="form-control" style="display: none;" id="id" name="id" value="{{$i->id}}">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="judul">Judul<span style="color: red;">*</span></label>
                                                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="..." value="{{$i->judul}}">
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="sumber">Alamat Link<span style="color: red;">*</span></label>
                                                                        <input type="text" class="form-control" id="sumber" name="sumber" placeholder="..." value="{{$i->sumber}}">
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
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- level --}}
    </section>
    
    

    <div class="modal fade" id="datainput1" tabindex="-1" role="dialog" aria-labelledby="datainput1">
        <div class="modal-dialog">
            <div class="modal-content">
            <form role="form" action="{{route('informasistore')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">TAMBAH INFOMASI BARU</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="judul">Judul Konten<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="...">
                        </div>
                        <div class="form-group">
                                <label for="sumber">Alamat Link<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="sumber" name="sumber" placeholder="..." >
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
    <div class="modal fade" id="datainput2" tabindex="-1" role="dialog" aria-labelledby="datainput2">
        <div class="modal-dialog">
            <div class="modal-content">
            <form role="form" action="{{route('instansiterkaitstore')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">TAMBAH INSTANSI BARU</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="judul">Judul Konten<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="...">
                        </div>
                        <div class="form-group">
                                <label for="sumber">Alamat Link<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="sumber" name="sumber" placeholder="..." >
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
@endsection

@section('js')

@endsection
