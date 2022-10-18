<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\requests;
use Illuminate\Support\Facades\DB;
use Carbon;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $banner1 = DB::table('banner')->where('type','header')->get();
        $banner2 = DB::table('banner')->where('type','content')->get();
        $banner3 = DB::table('banner')->where('type','footer')->get();

        return view('pages.banner',[
            'banner1' => $banner1,
            'banner2' => $banner2,
            'banner3' => $banner3,
        ]);
    }

    public function headerstore(Request $request){
        $files = $request->file('gambar');
        if($files == null){
            $namefile = 'komoditas.jpg';
        }else{
            $b = $files->getClientOriginalExtension();
		    $c = $files->getSize();
		    $namefile = $request->judul."-".rand(100000,1001238912).".".$b;
            $path = 'banner_';
            $files->move($path,$namefile);
        }
        DB::table('banner')->insert([
            'judul' => $request->judul,
            'sumber' => $request->sumber,
            'deskripsi' => $request->deskripsi,
            'type' => 'header',
            'gambar' => $namefile,
        ]);
        return redirect()->route('banner');
    }
    public function contentstore(Request $request){
        $files = $request->file('gambar');
        if($files == null){
            $namefile = 'komoditas.jpg';
        }else{
            $b = $files->getClientOriginalExtension();
		    $c = $files->getSize();
		    $namefile = $request->judul."-".rand(100000,1001238912).".".$b;
            $path = 'banner_';
            $files->move($path,$namefile);
        }
        DB::table('banner')->insert([
            'judul' => $request->judul,
            'sumber' => $request->sumber,
            'deskripsi' => $request->deskripsi,
            'type' => 'content',
            'gambar' => $namefile,
        ]);
        return redirect()->route('banner');
    }
    public function footerstore(Request $request){
        $files = $request->file('gambar');
        if($files == null){
            $namefile = 'komoditas.jpg';
        }else{
            $b = $files->getClientOriginalExtension();
		    $c = $files->getSize();
		    $namefile = $request->judul."-".rand(100000,1001238912).".".$b;
            $path = 'banner_';
            $files->move($path,$namefile);
        }
        DB::table('banner')->insert([
            'judul' => $request->judul,
            'sumber' => $request->sumber,
            'deskripsi' => $request->deskripsi,
            'type' => 'footer',
            'gambar' => $namefile,
        ]);
        return redirect()->route('banner');
    }

    public function headerupdate(Request $request,$id){
        $files = $request->file('gambar');
        if($files == null){
            $query = DB::table('banner')->where('id',$id)->get();
			foreach ($query as $i) {
				$code = $i->gambar;
			}
			$namefile = $code;
        }else{
            //dd($files);
            $b = $files->getClientOriginalExtension();
		    $c = $files->getSize();
		    $namefile = $request->judul.'-'.rand(100000,1001238912).'.'.$b;
            $path = 'banner_';
            $files->move($path,$namefile);
        }

        DB::table('banner')->where('id',$id)->update([
            'judul' => $request->judul,
            'sumber' => $request->sumber,
            'deskripsi' => $request->deskripsi,
            'type' => 'header',
            'gambar' => $namefile,
        ]);
        return redirect()->route('banner');
    }
    public function contentupdate(Request $request,$id){
        $files = $request->file('gambar');
        if($files == null){
            $query = DB::table('banner')->where('id',$id)->get();
			foreach ($query as $i) {
				$code = $i->gambar;
			}
			$namefile = $code;
        }else{
            //dd($files);
            $b = $files->getClientOriginalExtension();
		    $c = $files->getSize();
		    $namefile = $request->judul.'-'.rand(100000,1001238912).'.'.$b;
            $path = 'banner_';
            $files->move($path,$namefile);
        }

        DB::table('banner')->where('id',$id)->update([
            'judul' => $request->judul,
            'sumber' => $request->sumber,
            'deskripsi' => $request->deskripsi,
            'type' => 'content',
            'gambar' => $namefile,
        ]);
        return redirect()->route('banner');
    }
    public function footerupdate(Request $request,$id){
        $files = $request->file('gambar');
        if($files == null){
            $query = DB::table('banner')->where('id',$id)->get();
			foreach ($query as $i) {
				$code = $i->gambar;
			}
			$namefile = $code;
        }else{
            //dd($files);
            $b = $files->getClientOriginalExtension();
		    $c = $files->getSize();
		    $namefile = $request->judul.'-'.rand(100000,1001238912).'.'.$b;
            $path = 'banner_';
            $files->move($path,$namefile);
        }

        DB::table('banner')->where('id',$id)->update([
            'judul' => $request->judul,
            'sumber' => $request->sumber,
            'deskripsi' => $request->deskripsi,
            'type' => 'footer',
            'gambar' => $namefile,
        ]);
        return redirect()->route('banner');
    }

    public function headerdestroy($id){
        DB::table('banner')->where('id',$id)->delete();
        return redirect()->route('banner');
    }
    public function contentdestroy($id){
        DB::table('banner')->where('id',$id)->delete();
        return redirect()->route('banner');
    }
    public function footerdestroy($id){
        DB::table('banner')->where('id',$id)->delete();
        return redirect()->route('banner');
    }
}
