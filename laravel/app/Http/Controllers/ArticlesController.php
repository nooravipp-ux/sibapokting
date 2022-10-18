<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\requests;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Carbon;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		Carbon\Carbon::setLocale('id');
    }
    public function index(Request $request){
        
        $select = DB::table('articles')->orderBy('tanggal','asc')->get();
        return view('pages.articles',[
            'select' => $select,
        ]);
    }
    public function view(){

    }
    public function destroy(Request $request,$id){
        DB::table('articles')->where('id',$id)->delete();
        return redirect()->route('articles');
    }
    public function edit(Request $request,$id){
        DB::table('articles')->where('id',$id)->update([
            'status' => 'PUBLISED'
        ]);
        return redirect()->route('articles');
    }
    public function update(Request $request,$id){
        $date = Carbon\Carbon::now()->format('Y-m-d');
        $files = $request->file('gambar');
        //dd($files);
        if($files == null){
            $query = DB::table('articles')->where('id',$id)->get();
			foreach ($query as $i) {
				$code = $i->gambar;
			}
			$namefile = $code;
        }else{
            $b = $files->getClientOriginalExtension();
		    $c = $files->getSize();
		    $namefile = $request->judul."-".rand(100000,1001238912).".".$b;
            $path = 'articles_';
            $files->move($path,$namefile);
        }
        DB::table('articles')->where('id',$id)->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul,'-'),
            'tanggal' => $date,
            'gambar' => $namefile,
            'konten' => $request->konten,
            'sumber' => $request->sumber,
            'kategori' => $request->kategori
        ]);
        return redirect()->route('articles');
    }
    public function store(Request $request){
        $date = Carbon\Carbon::now()->format('Y-m-d');
        $files = $request->file('gambar');
        if($files == null){
            $namefile = 'articles.jpg';
        }else{
            $b = $files->getClientOriginalExtension();
		    $c = $files->getSize();
		    $namefile = $request->judul."-".rand(100000,1001238912).".".$b;
            $path = 'articles_';
            $files->move($path,$namefile);
        }
        DB::table('articles')->insert([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul,'-'),
            'tanggal' => $date,
            'gambar' => $namefile,
            'sumber' => $request->sumber,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'status' => 'DRAFT'
        ]);
        return redirect()->route('articles');
    }

}
