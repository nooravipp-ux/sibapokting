<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>LAPORAN REKAP DATA KOMODITAS {{date('d-m-Y')}}</title>

    <link href="https://kendo.cdn.telerik.com/2022.2.621/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="https://kendo.cdn.telerik.com/2022.2.621/styles/kendo.default.min.css" rel="stylesheet" />
    <script src="https://kendo.cdn.telerik.com/2022.2.621/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2022.2.621/js/kendo.all.min.js"></script>
    <!--<script src="https://kendo.cdn.telerik.com/2022.2.621/js/messages/kendo.messages.fr-FR.min.js"></script>-->
  </head>
  <body>

   
    <div id="pdfviewer">
    <style>
table,
th,
td {
    margin: 2px;
    border: 1px solid black;
    border-collapse: collapse;
}

</style>
<center>
    <div class="judul-main">{{strtoupper('REKAP DATA KOMODITAS ' .$pasar->namapasar)}}  </div><br>
    <div class="judul">TANGGAL {{date('d-m-Y')}} </div>
</center>
@section('title', strtoupper('REKAP DATA KOMODITAS ' .$pasar->namapasar) . ' - ' . date('d-m-Y'))
<BR>
<table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer table-striped" id="datatable">
    <thead>
        <tr class="fw-bolder bg-dark text-white">
            <th>NO</th>
            <th style="width: 301px;">NAMA KOMODITAS</th>
            <th style="width: 111px;">HARGA SEBELUMNYA</th>
            <th style="width: 111px;">HARGA SEKARANG</th>
            <th style="width: 111px;">PERUBAHAN HARGA</th>
            <th style="width: 111px;">STATUS</th>

        </tr>
    </thead>
    <tbody class="text-gray-600 fw-bold">
        <?php 
            $x=0; 
        ?>
        <?php foreach($data as $komoditas){?>
        <?php $x++ ?>
        <tr>
            <td>{{ $x }}</td>
            <td>{{ $komoditas->namakomoditas }}</td>
            <td>
              <?php
                if($komoditas->kondisi == 'naik'){
                  echo 'Rp. '.number_format($komoditas->harga_publish - $komoditas->harga_dinamik ,0);
                }else if($komoditas->kondisi == 'turun'){
                  echo 'Rp. '.number_format($komoditas->harga_publish + $komoditas->harga_dinamik ,0);
                }else if($komoditas->kondisi == 'stabil'){
                  echo 'Rp. '.number_format($komoditas->harga_publish,0);
                }
              ?>
            </td>
            <td><b>Rp. {{ number_format($komoditas->harga_publish,0) }}</b></td>
            <td>Rp. {{ number_format($komoditas->harga_dinamik,0) }}</td>
            <td>
              <?php
              if($komoditas->kondisi == 'naik'){
                echo '<div style="color:red;"><b>'.$komoditas->kondisi.'</b></div>';
              }else if($komoditas->kondisi == 'turun'){
                echo '<div style="color:green;"><b>'.$komoditas->kondisi.'</b></div>';
              }else if($komoditas->kondisi == 'stabil'){
                echo '<div><b>'.$komoditas->kondisi.'</b></div>';
              }
              ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

    </div>
    
  <style type="text/css">
    h1,h2{font-family: arial;margin-top: 0px;text-transform: uppercase;}
    .header{text-align: center;line-height: 10px;}
    .content{font-size: 10px;}
    .kotak{width: 100%;}
    h1,h2{line-height: 5px}
    h1{margin-bottom: 14px;font-size: 15px}
    h2{margin-bottom: 22px}
    .kiri{width: 55%;float: left;text-align: left;}
    .kanan{width: 45%;float: right;}
    .header-kiri{width: 15%;float: left;}
    .header-kanan{width: 85%;float: right;}
    .konten-header-kanan{margin-top: 11px;}
    .isi, .jadwal{width: 95%;float: right;}
    .judul-main{font-size: 22px;font-family: tahoma;line-height: 18px;font-weight: 700}
    .judul{font-size: 16px;font-family: tahoma;line-height: 18px;font-weight: 700}
    .judul-sub{font-size: 14px;font-family: tahoma;line-height: 16px;}
    .info{font-size: 14px;
      margin-bottom: 5px;
      letter-spacing: 2px;}
      .subinfo{font-size: 12px;margin-bottom: 2px;letter-spacing: 0px;}
      body{font-size: 13px;font-family: arial;color:#000000;}
      .line{background: #FFF;padding: 0px;margin-top: 2px}
      .line2{background: #FFF;padding: 1px;margin-top: 2px}
      .line3{background: #FFF;padding: 2px;margin-top: 2px}

      .question{width: 30px;color:#000;color:#000;}
      .answer{font-weight: 700;color:#27ae60;}
      .blok-sub{margin-left:25px;}
      .blok-pertanyaan{margin-left:25px;}


      .tables.table-style-one {
        font-size:12px;
        color:#000;
        border-width: 0px;
        border-color: #3A3A3A;
        border-collapse: collapse;
        width: 100%;
        padding: 1px;
      }
      .tables.table-style-one th, thead {
        border-width: 0px;
        padding: 8px;
        border-style: solid;
        border-color: #3A3A3A;
        background-color: #B3B3B3;
      }
      .tables.table-style-one td {
        border-width: 0px;
        padding: 8px;
        border-style: solid;
        border-color: #3A3A3A;
        background-color: #ffffff;
      }

      .watermarked {
        position: relative;
        overflow: hidden;
        z-index: -1;
      }

      .watermarked img {
        width: 100%;
      }

      .watermarked::before {
        position: absolute;
        top: -75%;
        left: -75%;

        display: block;
        width: 350%;
        height: 350%;

        transform: rotate(-45deg);
        content: attr(data-watermark);

        opacity: 0.7;
        line-height: 3em;
        letter-spacing: 2px;
        color: #EEE;
      }
    </style>


    <script src="https://kendo.cdn.telerik.com/2017.2.621/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.2.621/js/jszip.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>
    @stack('js')

    <script>
      $(document).ready(function() {

        Array.from(document.querySelectorAll('.watermarked')).forEach(function(el) {
          el.dataset.watermark = (el.dataset.watermark + ' ').repeat(1000);
        });

        $(window).load(function() {
        //   alert("Klik OK untuk Download Dokumen");
          ExportPdf();
        });
      });

      function ExportPdf(){
        kendo.drawing
        .drawDOM("#pdfviewer",
        {
          paperSize: "A4",
          margin: { top: "1cm", left: "1cm", right: "1cm", bottom: "1cm" },
          scale: 0.7,
          height: 500,
          landscape: false
        })
        .then(function(group){
          kendo.drawing.pdf.saveAs(group, "@yield('title').pdf")
        });
      }
    </script>


  </body>
</html>