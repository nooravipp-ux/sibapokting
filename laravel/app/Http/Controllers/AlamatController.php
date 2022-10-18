<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\requests;
use Illuminate\Support\Facades\DB;
use Carbon;

class AlamatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		Carbon\Carbon::setLocale('id');
    }
    public function index(){
        $alamat1 = DB::table('alamat')->where('type','informasi')->get();
        $alamat2 = DB::table('alamat')->where('type','instansi')->get();

        return view('pages.alamat',[
            'alamat1' => $alamat1,
            'alamat2' => $alamat2,
        ]);
    }

    public function informasistore(Request $request){
        DB::table('alamat')->insert([
            'judul' => $request->judul,
            'sumber' => $request->sumber,
            'type' => 'informasi',
        ]);
        return redirect()->route('link'); 
    }

    public function instansiterkaitstore(Request $request){
        DB::table('alamat')->insert([
            'judul' => $request->judul,
            'sumber' => $request->sumber,
            'type' => 'instansi',
        ]);
        return redirect()->route('link'); 
    }

    public function informasiupdate(Request $request,$id){
        DB::table('alamat')->where('id',$id)->update([
            'judul' => $request->judul,
            'sumber' => $request->sumber,
            'type' => 'informasi',
        ]);
        return redirect()->route('link'); 
    }

    public function instansiterkaitupdate(Request $request,$id){
        DB::table('alamat')->where('id',$id)->update([
            'judul' => $request->judul,
            'sumber' => $request->sumber,
            'type' => 'instansi',
        ]);
        return redirect()->route('link'); 
    }

    public function informasidestroy($id){
        DB::table('alamat')->where('id',$id)->delete();
        return redirect()->route('link'); 
    }

    public function instansiterkaitdestroy($id){
        DB::table('alamat')->where('id',$id)->delete();
        return redirect()->route('link'); 
    }


}
