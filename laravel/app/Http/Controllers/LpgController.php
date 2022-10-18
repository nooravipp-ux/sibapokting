<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\requests;
use Illuminate\Support\Facades\DB;

class LpgController extends Controller
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
        $select = DB::table('lpg')->get();
        return view('pages.lpg', [
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
        DB::table('lpg')->insert([
            'nama_agen' => $request->nama_agen,
            'alamat_agen' => $request->alamat_agen,
            'nama_pangkalan' => $request->nama_pangkalan,
            'alamat_pangkalan' => $request->alamat_pangkalan,

        ]);

        return redirect()->route('lpg.index');
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
        DB::table('lpg')->where('id', $id)->update([
            'nama_agen' => $request->nama_agen,
            'alamat_agen' => $request->alamat_agen,
            'nama_pangkalan' => $request->nama_pangkalan,
            'alamat_pangkalan' => $request->alamat_pangkalan,
        ]);
        return redirect()->route('lpg.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('lpg')->where('id', $id)->delete();
        return redirect()->route('lpg.index');
    }
}
