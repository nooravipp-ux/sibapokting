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
            <a href="" class="btn btn-success" title="Tambah Data Input" data-target="#datainput" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Articles</span></a>
            <div id="datatable_button_stack" class="pull-right text-right hidden-xs"></div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="data" class="table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>status</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($select as $i) 
                            <tr>
                            <td style="vertical-align: middle;">{{$i->judul}}</td>
                            <td style="vertical-align: middle;">{{$i->tanggal}}</td>
                            <td style="vertical-align: middle;">{{$i->status}}</td>
                            <td style="vertical-align: middle;">{{$i->kategori}}</td>
                            <td style="width: 16%;text-align: center">
                                <a href="{{route('articlesedit',[$i->id])}}" class="btn btn-warning" title="Status Publised"><i class="fa fa-refresh"></i></span></a>
                                <a href="" class="btn btn-success" title="Edit Data" data-target="#ubahdatainput{{$i->id}}" data-toggle="modal"><i class="fa fa-eye"></i></span></a> 
                                <a href="{{route('articlesdestroy',[$i->id])}}" class="btn btn-danger" title="Hapus Data"><i class="fa fa-remove"></i></span></a>
                                <!-- model ubah -->
                                <div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form role="form" action="{{route('articlesupdate',[$i->id])}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header" style="text-align: left">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">UBAH DATA BARU</h4>
                                                </div>
                                                <div class="modal-body" style="text-align: left">
                                                    <input type="text" class="form-control" style="display: none;" id="id" name="id" value="{{$i->id}}">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="judul">Judul Konten<span style="color: red;">*</span></label>
                                                            <input type="text" class="form-control" id="judul" name="judul" placeholder="..." value="{{$i->judul}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="datepicker">Tanggal <span style="color: red;">*</span></label>
                                                            <input type="text" class="form-control" id="datepicker" name="tanggal" value="{{$i->tanggal}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gambar">Gambar <span style="color: red;">*</span></label>
                                                            <input type="file" class="form-control" id="gambar" name="gambar">
                                                          </div>
                                                        <div class="form-group">
                                                            <label for="konten">Isi Konten <span style="color: red;">*</span></label>
                                                            <textarea class="textarea" id="konten" name="konten" placeholder="Place some text here"
                                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                            {!! html_entity_decode($i->konten) !!}
                                                            </textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kategori">Kategori <span style="color: red;">*</span></label>
                                                            <select class="form-control" id="kategori" name="kategori">
                                                              <option <?php if($i->kategori == 'Event'){ echo 'selected';} ?> value="Event">Event</option>
                                                              <option <?php if($i->kategori == 'Berita'){ echo 'selected';} ?> value="Berita">Berita</option>
                                                            </select>
                                                          </div>
                                                        <div class="form-group">
                                                            <label for="sumber">Sumber <span style="color: red;">*</span></label>
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
</section>

<div class="modal fade" id="datainput" tabindex="-1" role="dialog" aria-labelledby="datainput">
    <div class="modal-dialog">
        <div class="modal-content">
        <form role="form" action="{{route('articlesstore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">TAMBAH ARTICLES BARU</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group">
                        <label for="judul">Judul Konten<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="...">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar <span style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                      </div>
                    <div class="form-group">
                        <label for="konten">Isi Konten <span style="color: red;">*</span></label>
                        <textarea class="textarea" id="konten" name="konten" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori <span style="color: red;">*</span></label>
                        <select class="form-control" id="kategori" name="kategori">
                          <option value="Event">Event</option>
                          <option value="Berita">Berita</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="sumber">Sumber <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="sumber" name="sumber" placeholder="...">
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
        $('#data').dataTable({
            "searching": true,
            "language": {
                "lengthMenu": "_MENU_ Data",
                "zeroRecords": "Tidak ada data yang tersedia pada tabel ini",
                "info": "Menampilkan _PAGE_ dari _PAGES_ entri",
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
        $('.textarea').wysihtml5();
    });
</script>
@endsection