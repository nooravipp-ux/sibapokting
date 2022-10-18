  <!-- Start Footer Area -->
  <section class="footer-area" style="
    background-color: darkcyan;
">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="single-footer-widget">
                        <h3>Contact Info</h3>

                        <ul class="footer-contact-info">
                        @foreach ($kontak as $i)
                            <!-- <p>
                               {!! html_entity_decode($i->namakantor) !!}<br>
                               {!! html_entity_decode($i->email) !!}<br>
                               {!! html_entity_decode($i->tlp) !!}<br>
                               {!! html_entity_decode($i->alamat) !!}<br>
                            </p> -->
                            <li>
                                <i class="flaticon-phone-call"></i>
                                <span> {!! html_entity_decode($i->namakantor) !!}</span>
                                <a style="font-size: 12px;" href="tel:1235421457852"> {!! html_entity_decode($i->tlp) !!}</a>
                            </li>
                            <li>
                                <i class="flaticon-email"></i>
                                <span>Kirimkan pesan jika ada pertanyaan</span>
                                <a style="font-size: 12px;" href="mailto:{!! html_entity_decode($i->email) !!}"><span class="__cf_email__" data-cfemail="6001120f0e091820070d01090c4e030f0d">{!! html_entity_decode($i->email) !!}</span></a>
                            </li>
                            <li>
                                <i class="flaticon-achievement"></i>
                                <span>Alamat</span>
                                <!-- <p> -->
                                    {!! html_entity_decode($i->alamat) !!}
                                <!-- </p> -->
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="single-footer-widget">
                    <h3>Pengunjung Website</h3>

                        <ul class="footer-contact-info">
                            <li>
                                <i class="flaticon-analytics"></i>
                                <span>Pengujung Hari Ini: <b>{{$today[0]->today}}</b></span>
                                <span>Pengujung Kemarin : <b>{{$yesterday[0]->yesterday}}</b></span>
                                <span>Jumlah Semua Pengunjung : <b>{{$totalVisitor[0]->total_visitor}}</b></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="copyright-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <p>Copyright @ 2021 Diskominfo.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Footer Area -->

    <div class="go-top"><i class="fas fa-chevron-up"></i></div>