<aside class="main-sidebar">
    <! sidebar: style can be found in sidebar.less>
        <section class="sidebar">
            <! Sidebar user panel>
                <div class="user-panel" style="background-color: #00a65a;color:#fff;">
                    <div class="pull-left image">
                        <img src="{{asset('logo_/profil.png')}}" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p>{{Auth::user()->name}}</p>

                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li>
                        <a href="{{route('admin')}}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                </ul>

                <ul class="sidebar-menu">
                    <li class="header" style="background-color: #00a65a;color:#fff;">DATA MASTER</li>
                    @if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin')
                    <li class="{{set_active('pasar.index')}}">
                        <a href="{{route('pasar.index')}}">
                            <i class="fa fa-home"></i> <span>Data Pasar</span>
                        </a>
                    </li>
                    <li class="{{set_active('komoditas.index')}}">
                        <a href="{{route('komoditas.index')}}">
                            <i class="fa fa-cart-plus"></i> <span>Data Komoditas</span>
                        </a>
                    </li>
                    <li class="{{set_active('master-barang.index')}}">
                        <a href="{{route('master-barang.index')}}">
                            <i class="fa fa-cart-plus"></i> <span>Data Barang</span>
                        </a>
                    </li>
                    @endif
                    <li class="{{set_active('detail.index')}}">
                        <a href="{{route('detail.index')}}">
                            <i class="fa fa-bar-chart"></i> <span>Update Harga Komoditas</span>
                        </a>
                    </li>
                </ul>

                <ul class="sidebar-menu">
                    <li class="header" style="background-color: #00a65a;color:#fff;">DATA UPDATE</li>
                    @if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin')
                    <li class="{{set_active('pupuk.index')}}">
                        <a href="{{route('pupuk.index')}}">
                            <i class="fa fa-tree"></i> <span>Data Pupuk</span>
                        </a>
                    </li>
                    <li class="{{set_active('lpg.index')}}">
                        <a href="{{route('lpg.index')}}">
                            <i class="fa fa-archive"></i> <span>Data LPG</span>
                        </a>
                    </li>
                    <li class="{{set_active('distributor.index')}}">
                        <a href="{{route('distributor.index')}}">
                            <i class="fa fa-road"></i> <span>Data Distributor</span>
                        </a>
                    </li>
                    
                    @endif
                    <li class="{{set_active('barang.index')}}">
                        <a href="{{route('barang.index')}}">
                            <i class="fa fa-cube"></i> <span>Data Stok Barang</span>
                        </a>
                    </li>
                </ul>


                @if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin')
                <ul class="sidebar-menu">
                    <li class="header" style="background-color: #00a65a;color:#fff;">BERITA DAN PESAN</li>
                    <li class="{{set_active('articles')}}">
                        <a href="{{route('articles')}}">
                            <i class="fa fa-newspaper-o"></i> <span>Berita</span>
                        </a>
                    </li>
                    <li class="{{set_active('pesan')}}">
                        <a href="{{route('pesan')}}">
                            <i class="fa  fa-wechat"></i> <span>Pesan</span>
                        </a>
                    </li>
                </ul>
                <ul class="sidebar-menu">
                    <li class="header" style="background-color: #00a65a;color:#fff;">PENGATURAN CONTENT</li>
                    <li class="{{set_active('tentang')}}">
                        <a href="{{route('tentang')}}">
                            <i class="fa fa-info"></i> <span>Tentang Untuk Web</span>
                        </a>
                    </li>
                    <li class="{{set_active('admin.strukturOrganisasi')}}">
                        <a href="{{route('admin.strukturOrganisasi')}}">
                            <i class="fa fa-info"></i> <span>Struktur Organisasi</span>
                        </a>
                    </li>
                    <li class="{{set_active('admin.galeri')}}">
                        <a href="{{route('admin.galeri')}}">
                            <i class="fa fa-info"></i> <span>Galeri</span>
                        </a>
                    </li>
                    <li class="{{set_active('tentangmobile')}}">
                        <a href="{{route('tentangmobile')}}">
                            <i class="fa fa-info"></i> <span>Tentang Untuk Mobile</span>
                        </a>
                    </li>
                    <li class="{{set_active('kontak')}}">
                        <a href="{{route('kontak')}}">
                            <i class="fa fa-phone-square"></i> <span>Kontak Kontak</span>
                        </a>
                    </li>
                    <li class="{{set_active('banner')}}">
                        <a href="{{route('banner')}}">
                            <i class="fa fa-file-image-o"></i> <span>Banner / Poster</span>
                        </a>
                    </li>
                    <li class="{{set_active('link')}}">
                        <a href="{{route('link')}}">
                            <i class="fa  fa-external-link"></i> <span>Link / Alamat</span>
                        </a>
                    </li>
                    <li class="{{set_active('firebase')}}">
                        <a href="{{route('firebase')}}">
                            <i class="fa  fa-external-link"></i> <span>Alamat Server</span>
                        </a>
                    </li>
                </ul>
                @endif
                <ul class="sidebar-menu">
                    <li class="header" style="background-color: #00a65a;color:#fff;">MANAGEMEN USER</li>
                    @if(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin')
                    <li class="{{set_active('user-management.index')}}">
                        <a href="{{route('user-management.index')}}">
                            <i class="fa fa-users"></i> <span>Data Management User</span>
                        </a>
                    </li>
                    @endif
                    <li class="{{set_active('userdetail')}}">
                        <a href="{{route('userdetail')}}">
                            <i class="fa fa-user"></i> <span>Data User</span>
                        </a>
                    </li>
                    <ul>
        </section>
        <! /.sidebar>
</aside>