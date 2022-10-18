@extends('layouts.front-second')

@section('content')

        <!-- Start Page Title Area -->
        <div class="page-title-area page-title-bg1">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>Berita Detail</h2>

                            <ul>
                                <li><a href="{{route('dashboard')}}">Home</a></li>
                                <li>Berita Detail</li>
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
        <section class="blog-details-area ptb-100">
            <div class="container">
                <div class="row">
                    @foreach ($articlesdetail as $i)
                    <div class="col-lg-8 col-md-12">
                        <div class="blog-details-desc">
                            <div class="article-image">
                                <img src="{{URL::to('/')}}/articles_/{{$i->gambar}}" alt="image">
                            </div>

                            <div class="article-content">
                                <div class="entry-meta">
                                    <ul>
                                        <li><span>Posted On:</span> <a href="#"> <?php
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
                                                {{ substr($i->tanggal,0,4) }}</a></li>
                                        <li><span>Posted By:</span> <a href="{{$i->sumber}}">{{$i->sumber}}</a></li>
                                    </ul>
                                </div>

                                <h3>{{$i->judul}}</h3>

                                {!! html_entity_decode($i->konten) !!}
                                
                            </div>

                            <div class="article-footer">
                                <!-- <div class="article-tags">
                                </div>
                                <div class="article-share">
                                    <ul class="social">
                                        <li><span>Share:</span></li>
                                        <li><a href="https://www.facebook.com/share.php?u=" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    @endforeach

                    

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
        <!-- End Blog Details Area -->

@endsection

@section('js')
  
@endsection