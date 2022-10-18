<div class="az-navbar">
    <div class="container">
        <div>
            <a href="{{route('dashboard')}}" class="az-logo"><img style="max-width: 100%;height:55px;" src="{{asset('logo2.png')}}">
        </div>
        <ul class="nav">
            <li class="nav-label">MAIN MENU</li>
            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link"><i class="typcn typcn-home"></i>Beranda</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link with-sub"><i class="typcn typcn-chart-bar-outline"></i>Harga Pangan</a>
                <nav class="nav-sub">
                    <a href="{{route('perkomoditas')}}" class="nav-sub-link">Harga Perkomoditas</a>
                    <a href="{{route('perpasar')}}" class="nav-sub-link">Herga Perpasar</a>
                </nav>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link with-sub"><i class="typcn typcn-info-large"></i>Informasi</a>
                <nav class="nav-sub">
                    <a href="{{route('articleslist')}}" class="nav-link"><i class="typcn typcn-news"></i>Berita</a>
                    <a href="{{route('tentangdepan')}}" class="nav-link"><i class="typcn typcn-calendar"></i>Tentang Kami</a>
                    <a href="{{route('kontakdepan')}}" class="nav-link"><i class="typcn typcn-business-card"></i>Kontak Kami</a>
                </nav>
            </li>
            <li class="nav-item">
                <a href="{{route('peta')}}" class="nav-link"><i class="typcn typcn-map"></i>Peta Pasar</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link with-sub"><i class="typcn typcn-database"></i>Data</a>
                <nav class="nav-sub">
                    <a href="{{route('lpg')}}" class="nav-link"><i class="typcn typcn-archive"></i>Data LPG</a>
                    <a href="{{route('pupuk')}}" class="nav-link"><i class="typcn typcn-tree"></i>Data Pupuk</a>
                    <a href="{{route('distributor')}}" class="nav-link"><i class="typcn typcn-arrow-loop-outline"></i>Data Distributor</a>
                    <a href="{{route('stok')}}" class="nav-link"><i class="typcn typcn-download-outline"></i>Data Stok Barang</a>
                </nav>
            </li>
        </ul>
    </div>
</div>