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
                @if ($kontak->count() <= 0)
                <a href="" class="btn btn-success" title="Tambah Data Input" data-target="#datainput1" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Kontak</span></a>
                @endif
                <div id="datatable_button_stack" class="pull-right text-right hidden-xs"></div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="data" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>Nama Kantor</th>
                                    <th>Alamat</th>
                                    <th>No. Telp</th>
                                    <th>Email</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kontak as $i) 
                                <tr>
                                <td style="vertical-align: middle;">{{$i->namakantor}}</td>
                                <td style="vertical-align: middle;">{!! html_entity_decode($i->alamat) !!}</td>
                                <td style="vertical-align: middle;">{{$i->tlp}}</td>
                                <td style="vertical-align: middle;">{{$i->email}}</td>
                                <td style="width: 16%;text-align: center">
                                    <a href="" class="btn btn-success" title="Edit Data" data-target="#ubahdatainput{{$i->id}}" data-toggle="modal"><i class="fa fa-eye"></i></span></a> 
                                    <a href="{{route('kontakdestroy',[$i->id])}}" class="btn btn-danger" title="Hapus Data"><i class="fa fa-remove"></i></span></a>
                                    <!-- model ubah -->
                                    <div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form role="form" action="{{route('kontakupdate',[$i->id])}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-header" style="text-align: left">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title">UBAH</h4>
                                                    </div>
                                                    <div class="modal-body" style="text-align: left">
                                                        <input type="text" class="form-control" style="display: none;" id="id" name="id" value="{{$i->id}}">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="judul">Nama Kantor<span style="color: red;">*</span></label>
                                                                <input type="text" class="form-control" id="judul" name="judul" placeholder="..." value="{{$i->namakantor}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="judul">No. Telp<span style="color: red;">*</span></label>
                                                                <input type="text" class="form-control" id="telp" name="telp" placeholder="..." value="{{$i->tlp}}">
                                                            </div>
                                                            <div class="form-group">
                                                                    <label for="judul">Alamat Email<span style="color: red;">*</span></label>
                                                                    <input type="text" class="form-control" id="email" name="email" placeholder="..." value="{{$i->email}}">
                                                                </div>
                                                            <div class="form-group">
                                                                    <label for="konten">Isi Konten <span style="color: red;">*</span></label>
                                                                    <textarea class="textarea" id="konten" name="konten" placeholder="Place some text here"
                                                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                                    {!! html_entity_decode($i->alamat) !!}
                                                                    </textarea>
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
</section>
    <div class="modal fade" id="datainput1" tabindex="-1" role="dialog" aria-labelledby="datainput1">
        <div class="modal-dialog">
            <div class="modal-content">
            <form role="form" action="{{route('kontakstore')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">TAMBAH BARU</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="judul">Nama Kantor<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="...">
                        </div>
                        <div class="form-group">
                                <label for="judul">No. Telp<span style="color: red;">*</span></label>
                                <input type="number" class="form-control" id="telp" name="telp" placeholder="..." >
                            </div>
                        <div class="form-group">
                                <label for="judul">Alamat Email<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="..." >
                            </div>
                        <div class="form-group">
                                <label for="konten">Alamat <span style="color: red;">*</span></label>
                                <textarea  id="konten" name="konten" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('.textarea').wysihtml5();
    });
</script>
@endsection
