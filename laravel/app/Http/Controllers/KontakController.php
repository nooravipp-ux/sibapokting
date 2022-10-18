<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\requests;
use Illuminate\Support\Facades\DB;
use Carbon;

class KontakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $kontak = DB::table('kontak')->get();
        return view('pages.kontak',[
            'kontak' => $kontak
        ]);
    }

    public function kontakstore(Request $request){
        DB::table('kontak')->insert([
            'namakantor' => $request->judul,
            'alamat' => $request->konten,
            'tlp' => $request->telp,
            'email' => $request->email,
        ]);
        return redirect()->route('kontak');   
    }
    public function kontakupdate(Request $request,$id){
        DB::table('kontak')->where('id',$id)->update([
            'namakantor' => $request->judul,
            'alamat' => $request->konten,
            'tlp' => $request->telp,
            'email' => $request->email
        ]);
        return redirect()->route('kontak');  
    }
    public function kontakdestroy($id){
        DB::table('kontak')->where('id',$id)->delete();
        return redirect()->route('kontak'); 
    }
}
