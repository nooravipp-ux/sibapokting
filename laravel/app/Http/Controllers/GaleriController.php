<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    public function index(){
        $galeri = DB::table('galeri')->get();
        return view('pages.galeri.index', [
            'data' => $galeri
        ]);
    }

    public function store(Request $request){

        $file = $request->file('foto');
        if($file != null){
		    $namafile = date('YmdHi').$file->getClientOriginalName();
            $path = 'galeri';
            $file->move($path,$namafile);
        }

        DB::table('galeri')->insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namafile
        ]);

        return redirect()->back();
    }

    public function destroy($id){
        DB::table('galeri')->where('id',$id)->delete();
        return redirect()->back();
    }
}
