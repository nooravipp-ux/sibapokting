<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\requests;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon;

class StokController extends Controller
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
        if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
            $select = DB::table('stok')
            ->select('stok.*', 'pasar.id as pasar_id','pasar.namapasar', 'barang.id as barang_id','barang.namabarang')
            ->join('barang','barang.id','=','stok.idbarang')
            ->join('pasar','pasar.id','=','stok.idpasar')
            ->where('iduser',Auth::user()->id)
            ->get();
        }else{
            $select = DB::table('stok')
            ->select('stok.*', 'pasar.id as pasar_id','pasar.namapasar', 'barang.id as barang_id','barang.namabarang')
            ->join('barang','barang.id','=','stok.idbarang')
            ->join('pasar','pasar.id','=','stok.idpasar')
            ->get();
        }
        $date = Carbon\carbon::now()->format('Y-m-d');
        $barang = DB::table('barang')->get();
        $pasar = DB::table('pasar')->get();
        $petugas = DB::table('users')->where('akses','User')->get();

        return view('pages.stok', [
            'select' => $select,
            'barang' => $barang,
            'pasar' => $pasar,
            'petugas' => $petugas,
            'no' => $no,
            'b' => $date        ]);
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
        $datesekarang = Carbon\carbon::parse($request->tanggal)->format('Y-m-d H:i:s');
        $datekemaren = Carbon\carbon::parse($request->tanggal)->addDay(-1);
        DB::table('stok')->insert([
            'idbarang' => $request->idbarang,
            'idpasar' => $request->idpasar,
            'iduser' => $request->users_id,
            'tanggal' => $datesekarang,
            'detail_tgl' => $datesekarang,
            'pemasok' => $request->pemasok,
            'stok_awal' => $request->stok_awal,
            'kebutuhan' => $request->kebutuhan,
            'ketersediaan' => $request->ketersediaan,
        ]);

        return redirect()->route('barang.index');
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
        $datesekarang = Carbon\carbon::parse($request->tanggal)->format('Y-m-d H:i:s');
        $datekemaren = Carbon\carbon::parse($request->tanggal)->addDay(-1);
      
        DB::table('stok')->where('id', $id)->update([
            'idbarang' => $request->idbarang,
            'idpasar' => $request->idpasar,
            'iduser' => $request->users_id,
            'tanggal' => $datesekarang,
            'detail_tgl' => $datesekarang,
            'pemasok' => $request->pemasok,
            'stok_awal' => $request->stok_awal,
            'kebutuhan' => $request->kebutuhan,
            'ketersediaan' => $request->ketersediaan,
        ]);
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('stok')->where('id', $id)->delete();
        return redirect()->route('barang.index');
    }
}
