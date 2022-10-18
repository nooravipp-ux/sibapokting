<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\requests;
use App\KomoditasDetailModel;
use App\Imports\KomoditasDetailImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Carbon;
use App\Komoditas;
use Auth;

class KomoditasDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		config(['app.locale' => 'id']);
		Carbon\Carbon::setLocale('id');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $no = 1;
        $petugas = DB::table('users')->where('akses','User')->get();
        $komoditas = DB::table('komoditas')->get();
        $pasar = DB::table('pasar')->get();
        $date = Carbon\carbon::now()->format('Y-m-d');
       
        if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
            if($request->has('_token')){
                $a = $request->pasar_id;
                $b = $request->tanggal;
                $select = DB::table('detail')
                ->join('komoditas','komoditas.id','=','detail.komoditas_id')
                ->join('pasar','pasar.id','=','detail.pasar_id')
                ->join('users','users.id','=','detail.users_id')
                ->select(
                    'detail.*',
                    'komoditas.namakomoditas',
                    'komoditas.satuan',
                    'pasar.namapasar',
                    'pasar.wilayahkecamatan',
                    'users.name'
                )
                ->where('users_id',Auth::user()->id)
                ->where('detail.pasar_id',Auth::user()->pasar_id)
                ->where('detail.detail_tgl',$request->tanggal)
                ->orderBy('tanggal','asc')
                ->get();
            }else{
                $a = '';
                $b = $date;
                $select = DB::table('detail')
                ->join('komoditas','komoditas.id','=','detail.komoditas_id')
                ->join('pasar','pasar.id','=','detail.pasar_id')
                ->join('users','users.id','=','detail.users_id')
                ->select(
                    'detail.*',
                    'komoditas.namakomoditas',
                    'komoditas.satuan',
                    'pasar.namapasar',
                    'pasar.wilayahkecamatan',
                    'users.name'
                )
                ->where('users_id',Auth::user()->id)
                ->where('detail.pasar_id',Auth::user()->pasar_id)
                ->where('detail.detail_tgl',$b)
                ->orderBy('tanggal','asc')
                ->get();
            }
        }elseif(Auth::user()->akses == 'admin' or Auth::user()->akses == 'Admin'){
            if($request->has('_token')){
                if($request->pasar_id == ''){
                    $a = '';
                    $b = $request->tanggal;
                    $select = DB::table('detail')
                    ->join('komoditas','komoditas.id','=','detail.komoditas_id')
                    ->join('pasar','pasar.id','=','detail.pasar_id')
                    ->join('users','users.id','=','detail.users_id')
                    ->select(
                        'detail.*',
                        'komoditas.namakomoditas',
                        'komoditas.satuan',
                        'pasar.namapasar',
                        'pasar.wilayahkecamatan',
                        'users.name'
                    )
                    ->where('detail.detail_tgl',$request->tanggal)
                    ->orderBy('tanggal','asc')
                    ->get();
                }else{
                    $a = $request->pasar_id;
                    $b = $request->tanggal;
                    $select = DB::table('detail')
                    ->join('komoditas','komoditas.id','=','detail.komoditas_id')
                    ->join('pasar','pasar.id','=','detail.pasar_id')
                    ->join('users','users.id','=','detail.users_id')
                    ->select(
                        'detail.*',
                        'komoditas.namakomoditas',
                        'komoditas.satuan',
                        'pasar.namapasar',
                        'pasar.wilayahkecamatan',
                        'users.name'
                    )
                    ->where('detail.pasar_id',$request->pasar_id)
                    ->where('detail.detail_tgl',$request->tanggal)
                    ->orderBy('tanggal','asc')
                    ->get();
                }
            }else{
                
                $a = '';
                $b = $date;
                $select = DB::table('detail')
                ->join('komoditas','komoditas.id','=','detail.komoditas_id')
                ->join('pasar','pasar.id','=','detail.pasar_id')
                ->join('users','users.id','=','detail.users_id')
                ->select(
                    'detail.*',
                    'komoditas.namakomoditas',
                    'komoditas.satuan',
                    'pasar.namapasar',
                    'pasar.wilayahkecamatan',
                    'users.name'
                )
                //->whereBetween('detail.tanggal',['2019-11-19','2019-11-20'])
                //->where('detail.komoditas_id','1')
                //->where('detail.pasar_id','1')
                ->where('detail.detail_tgl',$date)
                ->orderBy('tanggal','asc')
                //->groupBy('komoditas_id')
                ->get();
                //dd($select);
            }
        }

        return view('pages.detail',[
            'select' => $select,
            'no' => $no,
            'pasar' => $pasar,
            'komoditas' => $komoditas,
            'petugas' => $petugas,
            'date' => $date,
            'a' => $a,
            'b' => $b
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
        $datesekarang = Carbon\carbon::now()->format('Y-m-d H:i:s');
        $datekemaren = Carbon\carbon::parse($request->tanggal)->addDay(-1)->format('Y-m-d');

       // $datesekarang = Carbon\carbon::parse('2019-12-12');
       // $datekemaren = Carbon\carbon::parse('2019-12-12')->addDay(-1);

       //dd($datesekarang.$datekemaren);
       DB::table('detail')->insert([
           'komoditas_id' => $request->komoditas_id,
           'pasar_id' => $request->pasar_id,
           'users_id' => $request->users_id,
           'tanggal' => $datesekarang,
           'detail_tgl' => $datesekarang,
           'harga_pasar' => $request->harga,
           'harga_publish' => $request->harga,
       ]);

       $select = DB::table('detail')
       ->select('harga_publish')
       ->where('detail_tgl',$datekemaren)
       ->where('pasar_id', $request->pasar_id)
       ->where('komoditas_id',$request->komoditas_id)
       ->get();
        $hargakemarin = '';
       foreach($select as $i){
           $hargakemarin = $i->harga_publish;
       }

       $query = DB::table('detail')
       ->select('harga_publish')
       ->where('tanggal',$datesekarang)
       ->where('pasar_id', $request->pasar_id)
       ->where('komoditas_id',$request->komoditas_id)
       ->get();
       
       foreach($query as $i){
           $hargasekarang = $i->harga_publish;
       }

       if($hargakemarin == null){
                DB::table('detail')
                    ->where('tanggal', $datesekarang)
                    ->where('pasar_id', $request->pasar_id)
                    ->where('komoditas_id', $request->komoditas_id)
                    ->update([
                        'harga_dinamik' => 0,
                        'kondisi' => 'stabil',
                        'status' => 'harga pasar',
                    ]);
            return redirect()->route('detail.index');
       }else{

        if($hargasekarang > $hargakemarin){
            $hargadinamik = (int)$hargasekarang - (int)$hargakemarin;
            $kondisi = 'naik';
            DB::table('detail')
            ->where('tanggal',$datesekarang)
            ->where('pasar_id',$request->pasar_id)
            ->where('komoditas_id',$request->komoditas_id)
            ->update([
                'harga_dinamik' => $hargadinamik,
                'kondisi' => $kondisi,
                'status' => 'harga pasar',
            ]);
        }elseif($hargasekarang == $hargakemarin){
            $hargadinamik = '0';
            $kondisi = 'stabil';
            DB::table('detail')
            ->where('tanggal',$datesekarang)
            ->where('pasar_id',$request->pasar_id)
            ->where('komoditas_id',$request->komoditas_id)
            ->update([
                'harga_dinamik' => $hargadinamik,
                'kondisi' => $kondisi,
                'status' => 'harga pasar',
            ]);
        }elseif($hargasekarang < $hargakemarin){
            $hargadinamik = (int)$hargakemarin - (int)$hargasekarang;
            $kondisi = 'turun';
            DB::table('detail')
            ->where('tanggal',$datesekarang)
            ->where('pasar_id',$request->pasar_id)
            ->where('komoditas_id',$request->komoditas_id)
            ->update([
                'harga_dinamik' => $hargadinamik,
                'kondisi' => $kondisi,
                'status' => 'harga pasar',
            ]);
        }
            return redirect()->route('detail.index');
       }





        //dd($request->tanggal);
        // DB::table('detail')->insert([
        //     'komoditas_id' => $request->komoditas_id,
        //     'pasar_id' => $request->pasar_id,
        //     'users_id' => $request->users_id,
        //     'tanggal' => config('global.date'),
        //     'harga' => $request->harga,
        // ]);

        
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
		if($request->status == 'user'){
			
			DB::table('detail')
			->where('id',$id)
			->update([
				'komoditas_id' => $request->komoditas_id,
				'harga_pasar' => $request->harga
			]);
		
		}elseif($request->status == 'admin'){
			$date = Carbon\carbon::now();
			$dateto = Carbon\carbon::now()->addDays(-1)->format('Y-m-d');
        if($request->harga_admin == ''){
            $select = DB::table('detail')
            ->select('harga_publish')
            ->where('detail_tgl',$dateto)
            ->where('pasar_id',$request->pasar_id)
            ->where('komoditas_id',$request->komoditas_id)
            ->get();

            $hargakemarin = '';
            foreach($select as $i){
                $hargakemarin = $i->harga_publish;
            }
            //dd($hargakemarin);
            $query = DB::table('detail')
            ->select('harga_publish')
            ->where('id',$id)
            ->get();

            foreach($query as $i){
                $hargasekarang = $i->harga_publish;
            }
            if($hargakemarin == null){
                $hargadinamik = 0;
                $kondisi = 'stabil';
            }else{
                if($hargasekarang >= $hargakemarin){
                    $hargadinamik = (int)$hargasekarang - (int)$hargakemarin;
                    $kondisi = 'naik';
                    //dd('nn');
                }elseif($hargasekarang == $hargakemarin){
                    
                    $hargadinamik = $hargakemarin;
                    $kondisi = 'stabil';
                }elseif($hargasekarang <= $hargakemarin){
                    $hargadinamik = (int)$hargakemarin - (int)$hargasekarang;
                    $kondisi = 'turun';
                }
            }

            DB::table('detail')
            ->where('id',$id)
            ->update([
                'harga_dinamik' => $hargadinamik,
                'kondisi' => $kondisi,
                'tanggal_update' => $date,
                'status' => 'revisi harga pasar',
            ]);
        }else{
            $hargaadmin = $request->harga_admin;
            $hargapasar = $request->harga_pasar;

            $select = DB::table('detail')
            ->select('harga_publish')
            ->where('detail_tgl',$dateto)
            ->where('pasar_id',$request->pasar_id)
            ->where('komoditas_id',$request->komoditas_id)
            ->get();

            $hargakemarin = '';
            foreach($select as $i){
                $hargakemarin = $i->harga_publish;
            }

            DB::table('detail')
            ->where('id',$id)
            ->update([
                'harga_publish' => $hargaadmin,
                'harga_admin' => $hargaadmin,
                'harga_pasar' => $hargapasar,
                'tanggal_update' => $date,
            ]);

            $query = DB::table('detail')
            ->select('harga_publish')
            ->where('id',$id)
            ->get();

            foreach($query as $i){
                $hargasekarang = $i->harga_publish;
            }
            if($hargakemarin == null){
                $hargadinamik = 0;
                $kondisi = 'stabil';

                DB::table('detail')
                ->where('id',$id)
                ->update([
                    'harga_dinamik' => $hargadinamik,
                    'kondisi' => $kondisi,
                    'tanggal_update' => $date,
                    'status' => 'revisi harga pasar',
                ]);
            }else{
                if($hargasekarang >= $hargakemarin){
                    $hargadinamik = (int)$hargasekarang - (int)$hargakemarin;
                    $kondisi = 'naik';
                    DB::table('detail')
                    ->where('id',$id)
                    ->update([
                        'harga_dinamik' => $hargadinamik,
                        'kondisi' => $kondisi,
                        'tanggal_update' => $date,
                        'status' => 'revisi harga pasar',
                    ]);
                }elseif($hargasekarang == $hargakemarin){
                    $hargadinamik = '0';
                    $kondisi = 'stabil';
                    DB::table('detail')
                    ->where('id',$id)
                    ->update([
                        'harga_dinamik' => $hargadinamik,
                        'kondisi' => $kondisi,
                        'tanggal_update' => $date,
                        'status' => 'revisi harga pasar',
                    ]);
                }elseif($hargasekarang <= $hargakemarin){
                    $hargadinamik = (int)$hargakemarin - (int)$hargasekarang;
                    $kondisi = 'turun';
                    DB::table('detail')
                    ->where('id',$id)
                    ->update([
                        'harga_dinamik' => $hargadinamik,
                        'kondisi' => $kondisi,
                        'tanggal_update' => $date,
                        'status' => 'revisi harga pasar',
                    ]);
                }
            }
 
        }
		}
        return redirect()->route('detail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('detail')->where('id',$id)->delete();
        return redirect()->route('detail.index');
    }

    public function import(Request $request){
        //dd($request->dataupload);
        Excel::import(new KomoditasDetailImport, $request->dataupload);
        return redirect()->route('detail.index');
    }
}
