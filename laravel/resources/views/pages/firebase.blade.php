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
                <h4>SERVER UNTUK MOBILE</h4>
                <div id="datatable_button_stack" class="pull-right text-right hidden-xs"></div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="data" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>Server (Mobile)</th>
                                    <th style="width: 30%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td style="vertical-align: middle;"><font size="4">{{$data}}</font></td>
                                <td style="width: 16%;text-align: center">
                                    <a href="" class="btn btn-success" title="Edit Data" data-target="#ubahdatainput" data-toggle="modal"><i class="fa fa-eye"></i> UPDATE SERVER</a> 
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>
    
    

    <div class="modal fade" id="ubahdatainput" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput">
        <div class="modal-dialog">
            <div class="modal-content">
            <form role="form" action="{{route('firebaseupdate')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">UPDATE SERVER MOBILE</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="judul">Alamat Server Mobile (Pastikan Sudah Sesuai Dengan Alamat Server / Domain-hosting)<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="namaserver" name="namaserver" placeholder="..." value="{{URL::to('/')}}">
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
