<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomoditasDetailModel extends Model
{
    protected $table = 'detail';

    //protected $primaryKey = 'id';

    protected $fillable = [
        'komoditas_id',
        'pasar_id',
        'users_id',
        'tanggal',
        'harga_publish',
        'harga_pasar',
        'harga_admin',
        'harga_dinamik',
        'kondisi',
        'status',
        'tanggal_update',
        'detail_tgl',
    ];

    public $timestamps = false;

    public function komoditas(){
        return $this->belongTo(Komoditas::class,'id');
    }
}
