<?php
// Route::get('fun', ['uses' => 'FunController@index'])->name('pdf');
Route::match(['get', 'post'], 'mobile/pdf/{tgl}/{pasar}', ['uses' => 'DashboardController@pdf'])->middleware('cors');

Route::match(['get', 'post'], 'admin', 'HomeController@index')->name('admin');

Route::resource('admin/pasar', 'PasarController');
Route::get('admin/pasar/delete/{id}', 'PasarController@destroy')->name('pasar.delete');

Route::resource('admin/lpg', 'LpgController');
Route::get('admin/lpg/delete/{id}', 'LpgController@destroy')->name('lpg.delete');

Route::resource('admin/pupuk', 'PupukController');
Route::get('admin/pupuk/delete/{id}', 'PupukController@destroy')->name('pupuk.delete');

Route::resource('admin/distributor', 'DistributorController');
Route::get('admin/distributor/delete/{id}', 'DistributorController@destroy')->name('distributor.delete');

Route::resource('admin/barang', 'StokController');
Route::get('admin/barang/delete/{id}', 'StokController@destroy')->name('barang.delete');

Route::resource('admin/komoditas', 'KomoditasController');
Route::get('admin/komoditas/delete/{id}', 'KomoditasController@destroy')->name('komoditas.delete');

Route::resource('admin/master-barang', 'BarangController');
Route::get('admin/master-barang/delete/{id}', 'BarangController@destroy')->name('master-barang.delete');

Route::resource('admin/user-management', 'UserController');
Route::get('admin/user-management/delete/{id}', 'UserController@destroy')->name('user.delete');

Route::get('admin/user-detail/', 'UserController@index_user')->name('userdetail');
Route::post('admin/user-detail/update/{id}', 'UserController@update_user')->name('userdetailupdate');

Route::get('admin/berita', ['uses' => 'ArticlesController@index'])->name('articles');
Route::post('admin/articles/store', ['uses' => 'ArticlesController@store'])->name('articlesstore');
Route::get('admin/articles/destroy/{id}', ['uses' => 'ArticlesController@destroy'])->name('articlesdestroy');
Route::post('admin/articles/update/{id}', ['uses' => 'ArticlesController@update'])->name('articlesupdate');
Route::get('admin/articles/edit/{id}', ['uses' => 'ArticlesController@edit'])->name('articlesedit');

Route::match(['get', 'post'], 'admin/update-harga-komoditas/', ['uses' => 'KomoditasDetailController@index'])->name('detail.index');
Route::post('admin/update-harga-komoditas/create', ['uses' => 'KomoditasDetailController@create'])->name('detail.create');
Route::post('admin/update-harga-komoditas/store', ['uses' => 'KomoditasDetailController@store'])->name('detail.store');
Route::get('admin/update-harga-komoditas/destroy/{id}', ['uses' => 'KomoditasDetailController@destroy'])->name('detail.destroy');
Route::put('admin/update-harga-komoditas/update/{id}', ['uses' => 'KomoditasDetailController@update'])->name('detail.update');
Route::post('admin/update-harga-komoditas/show/{id}', ['uses' => 'KomoditasDetailController@show'])->name('detail.show');
Route::post('admin/update-harga-komoditas/edit/{id}', ['uses' => 'KomoditasDetailController@edit'])->name('detail.edit');
Route::post('admin/update-harga-komoditas/upload/', ['uses' => 'KomoditasDetailController@import'])->name('detail.import');

Route::get('admin/banner-poster', ['uses' => 'BannerController@index'])->name('banner');
Route::post('admin/banner/store/header', ['uses' => 'BannerController@headerstore'])->name('headerstore');
Route::post('admin/banner/store/content', ['uses' => 'BannerController@contentstore'])->name('contentstore');
Route::post('admin/banner/store/footer', ['uses' => 'BannerController@footerstore'])->name('footerstore');
Route::post('admin/banner/update/header/{id}', ['uses' => 'BannerController@headerupdate'])->name('headerupdate');
Route::post('admin/banner/update/content/{id}', ['uses' => 'BannerController@contentupdate'])->name('contentupdate');
Route::post('admin/banner/update/footer/{id}', ['uses' => 'BannerController@footerupdate'])->name('footerupdate');
Route::get('admin/banner/destroy/header/{id}', ['uses' => 'BannerController@headerdestroy'])->name('headerdestroy');
Route::get('admin/banner/destroy/content/{id}', ['uses' => 'BannerController@contentdestroy'])->name('contentdestroy');
Route::get('admin/banner/destroy/footer/{id}', ['uses' => 'BannerController@footerdestroy'])->name('footerdestroy');

Route::get('admin/link-alamat', ['uses' => 'AlamatController@index'])->name('link');
Route::post('admin/link/store/informasi', ['uses' => 'AlamatController@informasistore'])->name('informasistore');
Route::post('admin/link/store/instansiterkait', ['uses' => 'AlamatController@instansiterkaitstore'])->name('instansiterkaitstore');
Route::post('admin/link/update/informasi/{id}', ['uses' => 'AlamatController@informasiupdate'])->name('informasiupdate');
Route::post('admin/link/update/instansiterkait/{id}', ['uses' => 'AlamatController@instansiterkaitupdate'])->name('instansiterkaitupdate');
Route::get('admin/link/destroy/informasi/{id}', ['uses' => 'AlamatController@informasidestroy'])->name('informasidestroy');
Route::get('admin/link/destroy/instansiterkait/{id}', ['uses' => 'AlamatController@instansiterkaitdestroy'])->name('instansiterkaitdestroy');

Route::get('admin/pengaturan-tentang-kami', ['uses' => 'TentangController@index'])->name('tentang');
Route::post('admin/tentang/store/', ['uses' => 'TentangController@tentangstore'])->name('tentangstore');
Route::post('admin/tentang/update/{id}', ['uses' => 'TentangController@tentangupdate'])->name('tentangupdate');
Route::get('admin/tentang/destroy/{id}', ['uses' => 'TentangController@tentangdestroy'])->name('tentangdestroy');

Route::get('admin/struktur-organisasi', ['uses' => 'StrukturOrganisasiController@index'])->name('admin.strukturOrganisasi');
Route::post('admin/struktur-organisasi/store/', ['uses' => 'StrukturOrganisasiController@store'])->name('admin.strukturOrganisasi.store');
Route::post('admin/struktur-organisasi/update/{id}', ['uses' => 'StrukturOrganisasiController@update'])->name('admin.strukturOrganisasi.update');
Route::get('admin/struktur-organisasi/destroy/{id}', ['uses' => 'StrukturOrganisasiController@destroy'])->name('admin.strukturOrganisasi.destroy');

Route::get('admin/galeri', ['uses' => 'GaleriController@index'])->name('admin.galeri');
Route::post('admin/galeri/store/', ['uses' => 'GaleriController@store'])->name('admin.galeri.store');
Route::post('admin/galeri/update/{id}', ['uses' => 'GaleriController@update'])->name('admin.galeri.update');
Route::get('admin/galeri/destroy/{id}', ['uses' => 'GaleriController@destroy'])->name('admin.galeri.destroy');

Route::get('admin/pengaturan-kontak-kami', ['uses' => 'KontakController@index'])->name('kontak');
Route::post('admin/kontak/store/', ['uses' => 'KontakController@kontakstore'])->name('kontakstore');
Route::post('admin/kontak/update/{id}', ['uses' => 'KontakController@kontakupdate'])->name('kontakupdate');
Route::get('admin/kontak/destroy/{id}', ['uses' => 'KontakController@kontakdestroy'])->name('kontakdestroy');

// Router untuk front end
Route::match(['get', 'post'], '/', ['uses' => 'DashboardController@index'])->name('dashboard')->middleware('visitor');
Route::match(['get', 'post'], '/result', ['uses' => 'DashboardController@index'])->name('dashboard')->middleware('visitor');
Route::get('chartPasar', ['uses' => 'DashboardController@chartPasar'])->name('chartPasar')->middleware('visitor');
Route::get('chartKomoditas', ['uses' => 'DashboardController@chartKomoditas'])->name('chartKomoditas')->middleware('visitor');
Route::get('chartPasarStatistik', ['uses' => 'DashboardController@chartPasarStatistik'])->name('chartPasarStatistik')->middleware('visitor');
Route::get('chartDetailKomoditas', ['uses' => 'DashboardController@chartDetailKomoditas'])->name('chartDetailKomoditas')->middleware('visitor');
Route::get('berita', ['uses' => 'DashboardController@articles_list'])->name('articleslist')->middleware('visitor');
Route::get('berita/post/{id}', ['uses' => 'DashboardController@articles_detail'])->name('articlesdetail')->middleware('visitor');
Route::get('peta-pasar', ['uses' => 'DashboardController@peta'])->name('peta')->middleware('visitor');
Route::get('tentang', ['uses' => 'DashboardController@tentang'])->name('tentangdepan')->middleware('visitor');
Route::get('galeri-kegiatan', ['uses' => 'DashboardController@galeri'])->name('galeri')->middleware('visitor');
Route::get('tentang/struktur-organisasi', ['uses' => 'DashboardController@strukturOrganisasi'])->name('struktur-organisasi')->middleware('visitor');
Route::match(['get', 'post'], 'kontak', ['uses' => 'DashboardController@kontak'])->name('kontakdepan')->middleware('visitor');
Route::post('kontak/store', ['uses' => 'DashboardController@kontakstore'])->name('kontakdepanstore')->middleware('visitor');
// Router untuk front end

Route::get('admin/server', ['uses' => 'FirebaseController@index'])->name('firebase');
Route::post('admin/server', ['uses' => 'FirebaseController@update'])->name('firebaseupdate');

Route::get('admin/tentang-mobile', ['uses' => 'TentangController@index_mobile'])->name('tentangmobile');
Route::post('admin/tentang-mobile/store', ['uses' => 'TentangController@store_mobile'])->name('tentangmobilestore');
Route::post('admin/tentang-mobile/update/{id}', ['uses' => 'TentangController@update_mobile'])->name('tentangmobileupdate');
Route::get('admin/tentang-mobile/delete/{id}', ['uses' => 'TentangController@delete_mobile'])->name('tentangmobiledelete');

Route::get('admin/pesan', ['uses' => 'PesanController@index'])->name('pesan');
Route::get('admin/pesan/destroy/{id}', ['uses' => 'PesanController@pesandestroy'])->name('pesandestroy');

Route::match(['get', 'post'], 'pasar/komoditas', ['uses' => 'DashboardController@perpasar'])->name('perpasar');
Route::match(['get', 'post'], 'komoditas/pasar', ['uses' => 'DashboardController@perkomoditas'])->name('perkomoditas');
Route::match(['get', 'post'], 'data/lpg', ['uses' => 'DashboardController@lpg'])->name('lpg');
Route::match(['get', 'post'], 'data/pupuk', ['uses' => 'DashboardController@pupuk'])->name('pupuk');
Route::match(['get', 'post'], 'data/distributor', ['uses' => 'DashboardController@distributor'])->name('distributor');
Route::match(['get', 'post'], 'data/stok', ['uses' => 'DashboardController@stok'])->name('stok');



//mobile
//Route::match(['get','post'],'mobile/harga-pangan',['uses'=>'DashboardController@hargapangan'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/berita', ['uses' => 'DashboardController@berita'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/berita-detail/{no}', ['uses' => 'DashboardController@berita_detail'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/tentang-kami', ['uses' => 'DashboardController@tentang_kami'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/kontak-kami', ['uses' => 'DashboardController@kontak_kami'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/berita/limit', ['uses' => 'DashboardController@berita_limit'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/peta', ['uses' => 'DashboardController@peta_pasar'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/pasar', ['uses' => 'DashboardController@pasar'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/pesan/', ['uses' => 'DashboardController@pesan'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/komoditas', ['uses' => 'DashboardController@komoditas'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/barang', ['uses' => 'DashboardController@barang'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/tentang-mobile', ['uses' => 'DashboardController@tentangmobile'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/chart/{state}', ['uses' => 'DashboardController@chart'])->name('chart');
Route::match(['get', 'post'], 'mobile/table-komoditas/{komoditas}/{mulai}/{selesai}', ['uses' => 'DashboardController@table_perkomoditas'])->name('table-komoditas');
Route::match(['get', 'post'], 'mobile/table-pasar/{pasars}/{mulai}/{selesai}', ['uses' => 'DashboardController@table_perpasar'])->name('table-pasar');
Route::match(['get', 'post'], 'mobile/login/', ['uses' => 'DashboardController@login'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/input/', ['uses' => 'DashboardController@inputitem'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/detail-item/{tgl}/{pasar}', ['uses' => 'DashboardController@detail_item'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/detail-delete/{id}', ['uses' => 'DashboardController@detail_detele'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/banner/{id}', ['uses' => 'DashboardController@banner'])->middleware('cors');

Route::match(['get', 'post'], 'mobile/stok-barang/', ['uses' => 'DashboardController@inputstok'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/detail-item-barang/{tgl}/{pasar}', ['uses' => 'DashboardController@detail_item_barang'])->middleware('cors');
Route::match(['get', 'post'], 'mobile/detail-delete-barang/{id}', ['uses' => 'DashboardController@detail_delete_barang'])->middleware('cors');

Route::match(['get', 'post'], 'api/pasar/', ['uses' => 'DashboardController@apipasar'])->middleware('cors');
Route::match(['get', 'post'], 'api/komoditas/', ['uses' => 'DashboardController@apikomoditas'])->middleware('cors');
Route::match(['get', 'post'], 'api/hargakomoditas/', ['uses' => 'DashboardController@apihargakomoditas'])->middleware('cors');
// Route::match(['get', 'post'], 'mobile/stok-barang/', ['uses' => 'DashboardController@inputstok'])->middleware('cors');
// Route::match(['get', 'post'], 'mobile/stok-barang/', ['uses' => 'DashboardController@inputstok'])->middleware('cors');

Auth::routes();

app('debugbar')->disable();
