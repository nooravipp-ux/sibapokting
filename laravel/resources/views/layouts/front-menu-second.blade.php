 <!-- Start Navbar Area -->
 <div class="navbar-area">
        <div class="aronix-responsive-nav">
            <div class="container">
                <div class="aronix-responsive-menu">
                    <div class="logo">
                        <a href="{{route('dashboard')}}">
                            <img src="{{ asset('aronix/assets/img/logo.png') }}" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="aronix-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('aronix/assets/img/logo.png') }}" class="black-logo" alt="logo">
                        <!-- <img src="{{ asset('aronix/assets/img/white-logo.png') }}" class="white-logo" alt="logo"> -->
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{route('dashboard')}}" class="nav-link">
                                    Beranda
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Harga Pangan <i class="fas fa-chevron-down"></i>
                                    </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{route('perkomoditas')}}" class="nav-link">Harga Komoditas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('perpasar')}}" class="nav-link">Statistik Komoditas</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Informasi <i class="fas fa-chevron-down"></i>
                                    </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{route('articleslist')}}" class="nav-link">Berita</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('tentangdepan')}}" class="nav-link">Tentang Kami</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('struktur-organisasi')}}" class="nav-link">Struktur Organisasi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('kontakdepan')}}" class="nav-link">Kontak Kami</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('galeri')}}" class="nav-link">
                                Galeri
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('peta')}}" class="nav-link">
                                Peta Pasar
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Data <i class="fas fa-chevron-down"></i>
                                    </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{route('lpg')}}" class="nav-link">Data LPG</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('pupuk')}}" class="nav-link">Data Kios Pupuk</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('distributor')}}" class="nav-link">Data Distributor Pupuk</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('stok')}}" class="nav-link">Data Stok Barang</a>
                                    </li>
                                </ul>
                            </li>

                            
                        </ul>

                        <!-- <div class="others-options">

                            <div class="burger-menu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div> -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->

     <!-- Sidebar Modal -->
     <div class="sidebar-modal">
        <div class="sidebar-modal-inner">
            <div class="sidebar-about-area">
                <div class="title">
                    <h2>About Us</h2>
                    <p>We believe brand interaction is key in communication. Real innovations and a positive customer experience are the heart of successful communication. No fake products and services. The customer is king, their lives and needs are the
                        inspiration.
                    </p>
                </div>
            </div>

            <div class="sidebar-instagram-feed">
                <h2>Instagram</h2>

                <ul>
                    <li>
                        <a href="single-blog.html"><img src="assets/img/blog-image/1.jpg" alt="image"></a>
                    </li>
                    <li>
                        <a href="single-blog.html"><img src="assets/img/blog-image/2.jpg" alt="image"></a>
                    </li>
                    <li>
                        <a href="single-blog.html"><img src="assets/img/blog-image/3.jpg" alt="image"></a>
                    </li>
                    <li>
                        <a href="single-blog.html"><img src="assets/img/blog-image/4.jpg" alt="image"></a>
                    </li>
                    <li>
                        <a href="single-blog.html"><img src="assets/img/blog-image/5.jpg" alt="image"></a>
                    </li>
                    <li>
                        <a href="single-blog.html"><img src="assets/img/blog-image/6.jpg" alt="image"></a>
                    </li>
                    <li>
                        <a href="single-blog.html"><img src="assets/img/blog-image/7.jpg" alt="image"></a>
                    </li>
                    <li>
                        <a href="single-blog.html"><img src="assets/img/blog-image/8.jpg" alt="image"></a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-contact-area">
                <div class="contact-info">
                    <div class="contact-info-content">
                        <h2>
                            <a href="tel:+0881306298615">+088 130 629 8615</a>
                            <span>OR</span>
                            <a href="https://templates.envytheme.com/cdn-cgi/l/email-protection#95f4e7fafbfcedd5f2f8f4fcf9bbf6faf8"><span class="__cf_email__" data-cfemail="80e1f2efeee9f8c0e7ede1e9ecaee3efed">[email&#160;protected]</span></a>
                        </h2>

                        <ul class="social">
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <span class="close-btn sidebar-modal-close-btn"><i class="flaticon-close"></i></span>
        </div>
    </div>
    <!-- End Sidebar Modal -->