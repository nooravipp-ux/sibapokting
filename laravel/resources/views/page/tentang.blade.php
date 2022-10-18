@extends('layouts.front-second')

@section('content')

        <!-- Start Page Title Area -->
        <div class="page-title-area page-title-bg1">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>Tentang Kami</h2>

                            <ul>
                                <li><a href="{{route('dashboard')}}">Home</a></li>
                                <li>Tentang Kami</li>
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

        <!-- Start About Area -->
        <section class="about-area ptb-100">
            <div class="container">
                @foreach ($tentang as $i)
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-image">
                            <img src="{{ asset('aronix/assets/img/about-img1.png') }}" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="about-content">
                            <span class="sub-title">Tentang Kami</span>
                            <h2>{{$i->judul}}</h2>
                            <p>{!! html_entity_decode($i->isi) !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="shape-img3"><img src="{{ asset('aronix/assets/img/shape/3.svg') }}" alt="image"></div>
            <div class="shape-img2"><img src="{{ asset('aronix/assets/img/shape/2.svg') }}" alt="image"></div>
        </section>
        <!-- End About Area -->


@endsection

@section('css')

@endsection

@section('js')

@endsection