<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\requests;
use Illuminate\Support\Facades\DB;
use Carbon;

class TentangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $tentang = DB::table('tentang')->get();
        return view('pages.tentang',[
            'tentang' => $tentang,
        ]);
    }

    public function index_mobile(){
        $no = 1;
        $select = DB::table('tentang-mobile')->get();

        return view('pages.tentang-mobile',[
            'select' => $select,
            'no' => $no
        ]);
    }

    public function store_mobile(Request $request){
        DB::table('tentang-mobile')->insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'sumber' => $request->sumber,
        ]);

        return redirect()->route('tentangmobile'); 
    }

    public function update_mobile(Request $request,$id){
        DB::table('tentang-mobile')->where('id',$id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'sumber' => $request->sumber,
        ]);

        return redirect()->route('tentangmobile'); 
    }

    public function delete_mobile($id){
        DB::table('tentang-mobile')->where('id',$id)->delete();
        return redirect()->route('tentangmobile'); 
    }

    public function tentangstore(Request $request){
        $files = $request->file('gambar');
        if($files == null){
            $namefile = 'komoditas.jpg';
        }else{
            $b = $files->getClientOriginalExtension();
		    $c = $files->getSize();
		    $namefile = $request->judul."-".rand(100000,1001238912).".".$b;
            $path = 'tentang_';
            $files->move($path,$namefile);
        }
        DB::table('tentang')->insert([
            'judul' => $request->judul,
            'isi' => $request->konten,
            'gambar' => $namefile,
        ]);
        return redirect()->route('tentang');   
    }
    public function tentangupdate(Request $request,$id){
        $files = $request->file('gambar');
        if($files == null){
            $query = DB::table('tentang')->where('id',$id)->get();
			foreach ($query as $i) {
				$code = $i->gambar;
			}
			$namefile = $code;
        }else{
            //dd($files);
            $b = $files->getClientOriginalExtension();
		    $c = $files->getSize();
		    $namefile = $request->judul.'-'.rand(100000,1001238912).'.'.$b;
            $path = 'tentang_';
            $files->move($path,$namefile);
        }

        DB::table('tentang')->where('id',$id)->update([
            'judul' => $request->judul,
            'isi' => $request->konten,
            'gambar' => $namefile,
        ]);
        return redirect()->route('tentang');  
    }
    public function tentangdestroy($id){
        DB::table('tentang')->where('id',$id)->delete();
        return redirect()->route('tentang'); 
    }
}
