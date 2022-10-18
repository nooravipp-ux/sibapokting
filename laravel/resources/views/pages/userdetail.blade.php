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
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="data" class="table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                @if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User')
                                    <th>Area Observasi</th>
                                @endif
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($select as $i)
                            <tr>
                                <td style="vertical-align: middle;">{{ $i->name }}</td>
                                <td style="vertical-align: middle;">{{ $i->email }}</td>
                                @if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User')
                                    <td style="vertical-align: middle;">{{ $i->namapasar }}</td>
                                @endif
                                <td style="width: 16%;text-align: center">
                                    <a href="" class="btn btn-success" title="Ubah Data" data-target="#ubahdatainput{{$i->id}}" data-toggle="modal"><i class="fa fa-refresh"></i> Ganti Password Baru</span></a>
                                    </a>
                                    <div class="modal fade" id="ubahdatainput{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="ubahdatainput{{$i->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="text-align: left">
                                                <form role="form" action="{{route('userdetailupdate',[$i->id])}}" method="post" enctype="multipart/form-data">
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
@endsection 

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#data').dataTable({
            "dom":t,
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