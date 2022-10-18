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
                <h4>BANNER / POSTER HEADER</h4>
                <a href="" class="btn btn-success" title="Tambah Data Input" data-target="#datainput1" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Banner Header</span></a>
                <div id="datatable_button_stack" class="pull-right text-right hidden-xs"></div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="data" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Desripsi</th>
                                    <th>Alamat/Link</th>
                                    <th>Type</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banner1 as $i) 
                                <tr>
                                <td style="vertical-align: middle;">{{$i->judul}}</td>
                                <td style="vertical-align: middle;">{{$i->deskripsi}}</td>
                                <td style="vertical-align: middle;">{{$i->sumber}}</td>
                                <td style="vertical-align: middle;">{{$i->type}}</td>
                                <td style="width: 16%;text-align: center">
                                    <a href="" class="btn btn-success" title="Edit Data" data-target="#ubahdatainput{{$i->id}}" data-toggle="modal"><i class="fa fa-eye"></i></span></a> 
                                    <a href="{{route('headerdestroy',[$i->id])}}" class="btn btn-danger" title="Hapus Data"><i class="fa fa-remove"></i></span></a>
                                    <!-- model ubah -->
                                    <div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form role="form" action="{{route('headerupdate',[$i->id])}}" method="post" enctype="multipart/form-data">
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
                                                                <label for="deskripsi">Deskripsi<span style="color: red;">*</span></label>
                                                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="..." value="{{$i->deskripsi}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sumber">Alamat Link<span style="color: red;">*</span></label>
                                                                <input type="text" class="form-control" id="sumber" name="sumber" placeholder="..." value="{{$i->sumber}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="gambar">Gambar (Ukuran:1903 x 620px)<span style="color: red;">*</span></label>
                                                                <input type="file" class="form-control" id="gambar" name="gambar">
                                                              </div>
                                                              <img style="width: 100%;height:100%" src="{{URL::to('/')}}/banner_/{{$i->gambar}}">
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
                        <h4>BANNER / POSTER CONTENT</h4>
                        @if ($banner2->count() <= '2')
                        <a href="" class="btn btn-success" title="Tambah Data Input" data-target="#datainput2" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Banner Content</span></a>
                        @endif
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
                                    @foreach ($banner2 as $i) 
                                    <tr>
                                    <td style="vertical-align: middle;">{{$i->judul}}</td>
                                    <td style="vertical-align: middle;">{{$i->sumber}}</td>
                                    <td style="vertical-align: middle;">{{$i->type}}</td>
                                    <td style="width: 16%;text-align: center">
                                        <a href="" class="btn btn-success" title="Edit Data" data-target="#ubahdatainput{{$i->id}}" data-toggle="modal"><i class="fa fa-eye"></i></span></a> 
                                        <a href="{{route('contentdestroy',[$i->id])}}" class="btn btn-danger" title="Hapus Data"><i class="fa fa-remove"></i></span></a>
                                        <!-- model ubah -->
                                        <div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form role="form" action="{{route('contentupdate',[$i->id])}}" method="post" enctype="multipart/form-data">
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
                                                                    <label for="deskripsi">Deskripsi<span style="color: red;">*</span></label>
                                                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="..." value="{{$i->deskripsi}}">
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="sumber">Alamat Link<span style="color: red;">*</span></label>
                                                                        <input type="text" class="form-control" id="sumber" name="sumber" placeholder="..." value="{{$i->sumber}}">
                                                                    </div>
                                                                <div class="form-group">
                                                                    <label for="gambar">Gambar (Ukuran:380 x 250px)<span style="color: red;">*</span></label>
                                                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                                                  </div>
                                                                  <img style="width: 100%;height:100%" src="{{URL::to('/')}}/banner_/{{$i->gambar}}">
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
                            <h4>BANNER / POSTER FOOTER</h4>
                        <a href="" class="btn btn-success" title="Tambah Data Input" data-target="#datainput3" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Banner Footer</span></a>
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
                                        @foreach ($banner3 as $i) 
                                        <tr>
                                        <td style="vertical-align: middle;">{{$i->judul}}</td>
                                        <td style="vertical-align: middle;">{{$i->sumber}}</td>
                                        <td style="vertical-align: middle;">{{$i->type}}</td>
                                        <td style="width: 16%;text-align: center">
                                            <a href="" class="btn btn-success" title="Edit Data" data-target="#ubahdatainput{{$i->id}}" data-toggle="modal"><i class="fa fa-eye"></i></span></a> 
                                            <a href="{{route('footerdestroy',[$i->id])}}" class="btn btn-danger" title="Hapus Data"><i class="fa fa-remove"></i></span></a>
                                            <!-- model ubah -->
                                            <div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form role="form" action="{{route('footerupdate',[$i->id])}}" method="post" enctype="multipart/form-data">
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
                                                                        <label for="deskripsi">Deskripsi<span style="color: red;">*</span></label>
                                                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="..." value="{{$i->deskripsi}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="sumber">Alamat Link<span style="color: red;">*</span></label>
                                                                            <input type="text" class="form-control" id="sumber" name="sumber" placeholder="..." value="{{$i->sumber}}">
                                                                        </div>
                                                                    <div class="form-group">
                                                                        <label for="gambar">Gambar (Ukuran:1180x200px)<span style="color: red;">*</span></label>
                                                                        <input type="file" class="form-control" id="gambar" name="gambar">
                                                                      </div>
                                                                      <img style="width: 100%;height:100%" src="{{URL::to('/')}}/banner_/{{$i->gambar}}">
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
    </section>
    
    

    <div class="modal fade" id="datainput1" tabindex="-1" role="dialog" aria-labelledby="datainput1">
        <div class="modal-dialog">
            <div class="modal-content">
            <form role="form" action="{{route('headerstore')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">TAMBAH BANNER BARU</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="judul">Judul Konten<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="...">
                        </div>
                        <div class="form-group">
                                <label for="deskripsi">Deskripsi<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="..." >
                        </div>
                        <div class="form-group">
                                <label for="sumber">Alamat Link<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="sumber" name="sumber" placeholder="..." >
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar (Ukuran:1903 x 620px)<span style="color: red;">*</span></label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
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
            <form role="form" action="{{route('contentstore')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">TAMBAH BANNER BARU</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="judul">Judul Konten<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="...">
                        </div>
                        <div class="form-group">
                                <label for="deskripsi">Deskripsi<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="..." >
                        </div>
                        <div class="form-group">
                                <label for="sumber">Alamat Link<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="sumber" name="sumber" placeholder="..." >
                            </div>
                        <div class="form-group">
                            <label for="gambar">Gambar (Ukuran:380 x 250px)<span style="color: red;">*</span></label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
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
    <div class="modal fade" id="datainput3" tabindex="-1" role="dialog" aria-labelledby="datainput3">
        <div class="modal-dialog">
            <div class="modal-content">
            <form role="form" action="{{route('footerstore')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">TAMBAH BANNER BARU</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="judul">Judul Konten<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="...">
                        </div>
                        <div class="form-group">
                                <label for="deskripsi">Deskripsi<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="..." >
                        </div>
                        <div class="form-group">
                                <label for="sumber">Alamat Link<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="sumber" name="sumber" placeholder="..." >
                            </div>
                        <div class="form-group">
                            <label for="gambar">Gambar (Ukuran:1180x200px)<span style="color: red;">*</span></label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
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
