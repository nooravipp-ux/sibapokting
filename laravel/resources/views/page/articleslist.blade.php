@extends('layouts.front-second')

@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area page-title-bg2">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>Berita</h2>

                            <ul>
                                <li><a href="{{route('dashboard')}}">Home</a></li>
                                <li>Berita</li>
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
   <!-- Start Blog Area -->
   <section class="blog-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        @foreach ($articles as $i)
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-post">
                                <div class="post-image">
                                    <a href="single-blog.html"><img src="{{URL::to('/')}}/articles_/{{$i->gambar}}" alt="image"></a>
                                </div>

                                <div class="post-content">
                                    <div class="post-meta">
                                        <ul>
                                            <!-- <li>By: <a href="blog-2.html">{{$i->judul}}</a></li> -->
                                            <li> 
                                                <?php
                                                    if(substr($i->tanggal,5,2) == '01'){
                                                        echo 'Januari, '.substr($i->tanggal,8,2);
                                                    }elseif(substr($i->tanggal,5,2) == '02'){
                                                        echo 'Februari, '.substr($i->tanggal,8,2);
                                                    }elseif(substr($i->tanggal,5,2) == '03'){
                                                        echo 'Maret, '.substr($i->tanggal,8,2);
                                                    }elseif(substr($i->tanggal,5,2) == '04'){
                                                        echo 'April, '.substr($i->tanggal,8,2);
                                                    }elseif(substr($i->tanggal,5,2) == '05'){
                                                        echo 'Mei, '.substr($i->tanggal,8,2);
                                                    }elseif(substr($i->tanggal,5,2) == '06'){
                                                        echo 'Juni, '.substr($i->tanggal,8,2);
                                                    }elseif(substr($i->tanggal,5,2) == '07'){
                                                        echo 'Juli, '.substr($i->tanggal,8,2);
                                                    }elseif(substr($i->tanggal,5,2) == '08'){
                                                        echo 'Agustus, '.substr($i->tanggal,8,2);
                                                    }elseif(substr($i->tanggal,5,2) == '09'){
                                                        echo 'September, '.substr($i->tanggal,8,2);
                                                    }elseif(substr($i->tanggal,5,2) == '10'){
                                                        echo 'Oktober, '.substr($i->tanggal,8,2);
                                                    }elseif(substr($i->tanggal,5,2) == '11'){
                                                        echo 'November, '.substr($i->tanggal,8,2);
                                                    }elseif(substr($i->tanggal,5,2) == '12'){
                                                        echo 'Desember, '.substr($i->tanggal,8,2);
                                                    }
                                                    ?>
                                                {{ substr($i->tanggal,0,4) }}
                                            </li>
                                        </ul>
                                    </div>

                                    <h3><a href="#">{{$i->judul}}</a></h3>
                                    <p>{{ strip_tags(substr($i->konten, 0, 250)) }}...</p>

                                    <a href="{{route('articlesdetail',[$i->id])}}" class="read-more-btn">Baca Selengkapnya <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach  
                        {{$articles->links()}} 
                        <!-- <div class="col-lg-12 col-md-12">
                            <div class="pagination-area">
                                <a href="#" class="prev page-numbers"><i class="fas fa-angle-double-left"></i></a>
                                <a href="#" class="page-numbers">1</a>
                                <span class="page-numbers current" aria-current="page">2</span>
                                <a href="#" class="page-numbers">3</a>
                                <a href="#" class="page-numbers">4</a>
                                <a href="#" class="next page-numbers"><i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area" id="secondary">
                        <section class="widget widget_aronix_posts_thumb">
                            <h3 class="widget-title">Popular Posts</h3>
                            @foreach ($beritalama as $i)
                            <article class="item">
                                <div class="info">
                                    <!-- <time datetime="2021-06-30">June 10, 2021</time> -->
                                    <h4 class="title usmall"><a href="{{route('articlesdetail',[$i->id])}}">{{$i->judul}}</a></h4>
                                </div>

                                <div class="clear"></div>
                            </article>
                            @endforeach
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Area -->

@endsection

@section('js')