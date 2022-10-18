<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    protected $table = 'komoditas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'namakomoditas',
        'satuan',
        'gambar'
    ];

    public $timestamps = false;

    public function detail(){
        return $this->hasMany(KomoditasDetailModel::class,'komoditas_id');
    }
}
