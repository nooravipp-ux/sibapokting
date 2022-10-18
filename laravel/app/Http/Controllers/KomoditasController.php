<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\requests;
use Illuminate\Support\Facades\DB;
use Carbon;

class KomoditasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		Carbon\Carbon::setLocale('id');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $select = DB::table('komoditas')->get();
        return view('pages.komoditas',[
            'select' => $select,
            'no' => $no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->file('gambar');
        if($files == null){
            $namefile = 'komoditas.jpg';
        }else{
            $b = $files->getClientOriginalExtension();
		    $c = $files->getSize();
		    $namefile = $request->komoditas."-".rand(100000,1001238912).".".$b;
            $path = 'komoditas_';
            $files->move($path,$namefile);
        }
        DB::table('komoditas')->insert([
            'namakomoditas' => $request->komoditas,
            'satuan' => $request->satuan,
            'gambar' => $namefile,
        ]);

        return redirect()->route('komoditas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $files = $request->file('gambar');
        if($files == null){
            $query = DB::table('komoditas')->where('id',$id)->get();
			foreach ($query as $i) {
				$code = $i->gambar;
			}
			$namefile = $code;
        }else{
            //dd($files);
            $b = $files->getClientOriginalExtension();
		    $c = $files->getSize();
		    $namefile = $request->komoditas.'-'.rand(100000,1001238912).'.'.$b;
            $path = 'komoditas_';
            $files->move($path,$namefile);
        }

        DB::table('komoditas')->where('id',$id)->update([
            'namakomoditas' => $request->komoditas,
            'satuan' => $request->satuan,
            'gambar' => $namefile,
        ]);
        return redirect()->route('komoditas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        DB::table('komoditas')->where('id',$id)->delete();
        return redirect()->route('komoditas.index');
    }

    public function import(Request $request){
        
    }
}
