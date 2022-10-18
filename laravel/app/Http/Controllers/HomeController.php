<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {   
        // $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        // $firebase = (new Factory)
        //     ->withServiceAccount($serviceAccount)
        //     ->withDatabaseUri('https://server-sibapokting.firebaseio.com/1')
        //     ->create();
        // $database = $firebase->getDatabase();
        // $ref = $database->getReference('server')->getvalue();
        //$key = $ref->push()->getKey();
        //$a = $ref->getChild($key);
        //dd($ref);
        //return $key;


        //fungsi tahun laporan
        $db =  DB::table('tahun_laporan')
        ->where('tahun',Carbon\Carbon::now()->format('Y'))
        ->select('tahun')
        ->groupBy('tahun')
        ->get();

        $tahun = '';

        foreach($db as $a){
            $tahun = $a->tahun;
        }

        if($tahun == null){
            $create = Carbon\Carbon::createFromDate(substr(Carbon\Carbon::now()->format('Y'),0,4),1,0);
            for($i=0;$i<365;$i++){
                DB::table('tahun_laporan')->insert([
                    'tgl' => $create->addDay(1)->format('Y-m-d'),
                    'tahun' => $create->format('Y'),
                ]);
            }
        }

        //----------------------------------

        $komoditas = DB::table('komoditas')->count();
        $pasar = DB::table('pasar')->count();
        $user = DB::table('users')->where('akses','user')->count();

        $pasars = DB::table('pasar')->get();
        $kom = DB::table('komoditas')->get();
        $no = 1;
        $noo = 1;

        if($request->has('_token')){
                $mulai = $request->tanggal_mulai;
                $selesai = $request->tanggal_selesai;
            if($request->komoditas_id == null){
                $pasarid = $request->pasar_id;
                $komoditasid = '1';
            }elseif($request->pasar_id == null){
                $komoditasid = $request->komoditas_id;
                $pasarid = '1';
            }

                $tanggal = DB::table('tahun_laporan')
                ->whereBetween('tgl',[$mulai,$selesai])
                ->get();
        }else{
            $mulai = Carbon\carbon::now()->addDays(-5)->format('Y-m-d');
            $selesai = Carbon\carbon::now()->format('Y-m-d');
            $tanggal = DB::table('tahun_laporan')
            ->whereBetween('tgl',[$mulai,$selesai])
            ->get();
            $komoditasid = '1';
            $pasarid = '1';
        }
        if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
            $detail = DB::table('detail')
            ->where('users_id',Auth::user()->id)
            ->where('detail_tgl',Carbon\Carbon::now()->format('Y-m-d'))
            ->count();
            $item = DB::table('komoditas')->count(); 
        }elseif(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin'){
            $detail = DB::table('detail')
            ->where('detail_tgl',Carbon\Carbon::now()->format('Y-m-d'))
            ->count();
            $item = (int)$komoditas * (int)$pasar;
        }

        return view('pages.dashboard',[
            'kom' => $kom,
            'pasars' => $pasars,
            'no' => $no,
            'noo' => $noo,
            'tanggal' => $tanggal,
            'mulai' => $mulai,
            'selesai' => $selesai,
            'komoditasid' => $komoditasid,
            'komoditas' => $komoditas,
            'pasar' => $pasar,
            'user' => $user,
            'pasarid' => $pasarid,
            'detail' => $detail,
            'item' => $item
        ]);
    }
}
