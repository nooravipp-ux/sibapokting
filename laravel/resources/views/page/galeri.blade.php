@extends('layouts.front-second')

@section('css')
<style>
    .gallery-image {
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .gallery-image img {
        height: 250px;
        width: 350px;
        transform: scale(1.0);
        transition: transform 0.4s ease;
    }

    .img-box {
        box-sizing: content-box;
        margin: 10px;
        height: 250px;
        width: 350px;
        overflow: hidden;
        display: inline-block;
        color: white;
        position: relative;
        background-color: white;
    }

    .caption {
        position: absolute;
        bottom: 5px;
        left: 20px;
        opacity: 0.0;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .transparent-box {
        height: 250px;
        width: 350px;
        background-color: rgba(0, 0, 0, 0);
        position: absolute;
        top: 0;
        left: 0;
        transition: background-color 0.3s ease;
    }

    .img-box:hover img {
        transform: scale(1.1);
    }

    .img-box:hover .transparent-box {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .img-box:hover .caption {
        transform: translateY(-20px);
        opacity: 1.0;
    }

    .img-box:hover {
        cursor: pointer;
    }

    .caption>p:nth-child(2) {
        font-size: 0.8em;
    }

    .opacity-low {
        opacity: 0.5;
    }
</style>
@endsection
@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area page-title-bg1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>Galeri</h2>

                    <ul>
                        <li><a href="{{route('dashboard')}}">Home</a></li>
                        <li>galeri</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="shape-img2"><img src="{{ asset('aronix/assets/img/shape/2.svg')}}" alt="image"></div>
    <div class="shape-img3"><img src="{{ asset('aronix/assets/img/shape/3.svg')}}" alt="image"></div>
    <div class="shape-img4"><img src="{{ asset('aronix/assets/img/shape/4.png')}}" alt="image"></div>
    <div class="shape-img5"><img src="{{ asset('aronix/assets/img/shape/5.png')}}" alt="image"></div>
    <div class="shape-img7"><img src="{{ asset('aronix/assets/img/shape/7.png')}}" alt="image"></div>
    <div class="shape-img8"><img src="{{ asset('aronix/assets/img/shape/8.png')}}" alt="image"></div>
    <div class="shape-img9"><img src="{{ asset('aronix/assets/img/shape/9.png')}}" alt="image"></div>
    <div class="shape-img10"><img src="{{ asset('aronix/assets/img/shape/10.png')}}" alt="image"></div>
</div>
<!-- End Page Title Area -->

<!-- Start Blog Details Area -->
<section class="blog-details-area pb-100">
    <div class="container">
        <div class="gallery-image">
            @foreach($galeri as $gl)
            <div class="card" style="width: 18rem;">
                <img src="{{asset('galeri/'.$gl->gambar)}}" alt="" />
                <div class="transparent-box">
                    <div class="caption">
                        <p>{{$gl->judul}}</p>
                        <p class="opacity-low">{{$gl->deskripsi}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Blog Details Area -->

@endsection

@section('js')
@endsection