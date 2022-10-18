<?php

namespace App\Imports;

use App\KomoditasDetailModel;
use Maatwebsite\Excel\Concerns\ToModel;
Use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
Use DB;
use Carbon;
use Auth;

class KomoditasDetailImport implements ToModel, WithStartRow, WithMultipleSheets
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $time = Carbon\carbon::now()->format('H:i:s');
        $pasar = DB::table('pasar')->where('namapasar',$row[1])->get();
        $komoditas = DB::table('komoditas')->where('namakomoditas',$row[2])->get();

        foreach($pasar as $a){
            $pasar_id = $a->id;
        }
        
        foreach($komoditas as $b){
            $komoditas_id = $b->id;
        }


        if(Auth::user()->akses == 'user' or Auth::user()->akses == 'User'){
            $users_id = Auth::user()->id;
        }else{
            $select = DB::table('users')->where('pasar_id',$pasar_id)->get();
            foreach($select as $c){
                $users_id = $c->id;
            } 
            //dd($users_id);
        }
        return new KomoditasDetailModel([
            'tanggal' => $row[0].' '.$time,
            'pasar_id' => $pasar_id,
            'users_id' => $users_id,
            'komoditas_id' => $komoditas_id,
            'harga_publish' => $row[3],
            'harga_pasar' => $row[3],
            'detail_tgl' => $row[0]
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }

    public function sheets(): array
    {
        return [
            0 => $this,
        ];
    }
}
