<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrukturOrganisasiController extends Controller
{
    public function index(){
        $strukturOrganisasi = DB::table('struktur_organisasi')->orderBy('urutan', 'asc')->get();
        return view('pages.struktur-organisasi.index', [
            'data' => $strukturOrganisasi
        ]);
    }

    public function store(Request $request){

        $file = $request->file('foto');
        if($file != null){
		    $namafile = date('YmdHi').$file->getClientOriginalName();
            $path = 'struktur-organisasi';
            $file->move($path,$namafile);
        }

        DB::table('struktur_organisasi')->insert([
            'nama' => $request->nama,
            'NIP' => $request->NIP,
            'jabatan' => $request->jabatan,
            'pangkat' => $request->pangkat,
            'golongan' => $request->golongan,
            'urutan' => $request->urutan,
            'foto' => $namafile,
        ]);

        return redirect()->back();
    }

    public function destroy($id){
        DB::table('struktur_organisasi')->where('id',$id)->delete();
        return redirect()->back();
    }
}
