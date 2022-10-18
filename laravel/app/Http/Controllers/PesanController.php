<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\requests;
use Illuminate\Support\Facades\DB;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $pesan = DB::table('pesan')->orderBy('tanggal','desc')->get();
        return view('pages.pesan',[
            'pesan' => $pesan
        ]);
    }
    public function pesandestroy($id){
        DB::table('pesan')->where('id',$id)->delete();
        return redirect()->route('pesan'); 
    }
}
