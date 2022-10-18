@extends('layouts.front-second')

@section('content')

  <!-- Start Page Title Area -->
  <div class="page-title-area page-title-bg1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Data Agen LPG</h2>
                        <ul>
                            <li><a href="{{route('dashboard')}}">Home</a></li>
                            <li>Data Agen LPG</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="shape-img2"><img src="{{ asset('aronix/assets/img/shape/2.svg') }}" alt="image"></div>
        <div class="shape-img3"><img src="{{ asset('aronix/assets/img/shape/3.svg') }}" alt="image"></div>
        <div class="shape-img4"><img src="{{ asset('aronix/assets/img/shape/4.png') }}" alt="image"></div>
        <div class="shape-img5"><img src="{{ asset('aronix/assets/img/shape/5.png') }}" alt="image"></div>
        <div class="shape-img7"><img src="{{ asset('aronix/assets/img/shape/7.png') }}" alt="image"></div>
        <div class="shape-img8"><img src="{{ asset('aronix/assets/img/shape/8.png') }}" alt="image"></div>
        <div class="shape-img9"><img src="{{ asset('aronix/assets/img/shape/9.png') }}" alt="image"></div>
        <div class="shape-img10"><img src="{{ asset('aronix/assets/img/shape/10.png') }}" alt="image"></div>
    </div>
    <!-- End Page Title Area -->

    <section class="cart-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                       
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered" id="datatester">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pangkalan</th>
                                        <th>Alamat Pangkalan</th>
                                        <th>Nama Agen</th>
                                        <!-- <th>Harga</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lpg as $i)
                                    <tr>
                                        <td style="vertical-align: middle;">{{$no++}}</td>
                                        <td>{{$i->nama_pangkalan}}</td>
                                        <td>{{$i->alamat_pangkalan}}</td>
                                        <td>{{$i->nama_agen}}<br><b>Alamat : </b>{{$i->alamat_agen}}</td>

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

@section('css')
<link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
{{-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />  --}}
<link href="{{ asset('front/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ asset('front/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
</head>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
{{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>  --}}
<script src="{{ asset('front/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('front/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{ asset('front/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('front/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
{{-- <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatester').dataTable({
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
        $('.datepicker').datepicker();
    });
</script>
@endsection