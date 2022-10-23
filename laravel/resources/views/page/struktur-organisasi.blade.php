@extends('layouts.front-second')
@section('css')
<style>
    .row-flex {
        display: flex;
        flex-wrap: wrap;
    }

    .content {
        background-size: cover;
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
                    <h2>Struktur Organisasi</h2>

                    <ul>
                        <li><a href="{{route('dashboard')}}">Home</a></li>
                        <li>Struktur Organisasi</li>
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
        <div class="row border pt-3 pb-3">
            <div class="col-md-12">
                <div class="row d-flex justify-content-center">
                    @foreach($pejabat as $pj)
                    @if($pj->urutan == 1)
                    <div class="col-md-3">
                        <div class="content">
                            <img style="display:block;margin-left: auto;margin-right: auto;width:200px; height:250px" class="shadow-sm circle" src="{{asset('struktur-organisasi/'.$pj->foto)}}" alt="">
                        </div>
                        
                        <h5 class="text-center  pt-2">{{$pj->jabatan}}</h5>
                        <h6 class="text-center">{{$pj->nama}}</h6>
                        
                    </div>
                    @endif
                    @endforeach
                </div>

              <div class="row">
                    @foreach($pejabat as $pj)
                    @if($pj->urutan != 1)
                    <div class="col-md-3">
                        <img style="display:block;margin-left: auto;margin-right: auto;" class="shadow-sm circle" src="{{asset('struktur-organisasi/'.$pj->foto)}}" alt="" height="300" width="200">
                        <h5 class="text-center  pt-2">{{$pj->nama}}</h5>
                        <h6 class="text-center">{{$pj->jabatan}}</h6>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Details Area -->

@endsection

@section('js')

@endsection