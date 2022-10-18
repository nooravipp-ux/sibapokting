@extends('layouts.front-second')
@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area page-title-bg1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Kontak</h2>

                        <ul>
                            <li><a href="{{route('dashboard')}}">Home</a></li>
                            <li>Kontak</li>
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

    <!-- Start Contact Area -->
    <section class="contact-area ptb-100">
        <div class="container">
            @foreach ($kontak as $i)
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="contact-info-box">
                        <div class="icon">
                            <i class="flaticon-email"></i>
                        </div>

                        <h3>Email Here</h3>
                        <p><a href="mailto:{!! html_entity_decode($i->email) !!}"><span class="__cf_email__" data-cfemail="6b0a0f0602052b0a190405021345080406">{{$i->email}}</span></a></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="contact-info-box">
                        <div class="icon">
                            <i class="flaticon-phone-call"></i>
                        </div>

                        <h3>{{$i->namakantor}}</h3>
                        <p><a href="#" target="_blank">{!! html_entity_decode($i->alamat) !!}</a></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
                    <div class="contact-info-box">
                        <div class="icon">
                            <i class="flaticon-marker"></i>
                        </div>

                        <h3>Call Here</h3>
                        <p><a href="tel:{{$i->tlp}}">{{$i->tlp}}</a></p>
                    </div>
                </div>
            </div>

            <div class="section-title">
                <span class="sub-title">Contact Us</span>
                <h2>Kirim pesan disini</h2>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
            </div>

            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4">
                    <div class="contact-image">
                        <img src="{{ asset('aronix/assets/img/contact.png') }}" alt="image">
                    </div>
                </div>

                <div class="col-lg-8 col-md-8">
                    <div class="contact-form">
                            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('kontakdepanstore')}}">
                                @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="nama" id="nama" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="pesan" class="form-control" id="pesan" cols="30" rows="5" required data-error="Write your message" placeholder="Your Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">Kirim <span></span></button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- End Contact Area -->

@endsection

@section('css')

@endsection

@section('js')

@endsection