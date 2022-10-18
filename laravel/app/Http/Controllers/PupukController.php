<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\requests;
use Illuminate\Support\Facades\DB;

class PupukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $select = DB::table('pupuk')
        ->select('pupuk.*', 'distributor.id as distributor_id','distributor.nama_distributor')
        ->join('distributor','pupuk.id_distributor','=','distributor.id')
        ->get();
        $distributor = DB::table('distributor')->get();
       
        return view('pages.pupuk', [
            'select' => $select,
            'distributor' => $distributor,
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
        DB::table('pupuk')->insert([
            'nama_kios' => $request->nama_kios,
            'id_distributor' => $request->distributor,
            'alamat' => $request->alamat,

        ]);

        return redirect()->route('pupuk.index');
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
        DB::table('pupuk')->where('id', $id)->update([
            'nama_kios' => $request->nama_kios,
            'id_distributor' => $request->distributor,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('pupuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pupuk')->where('id', $id)->delete();
        return redirect()->route('pupuk.index');
    }
}
