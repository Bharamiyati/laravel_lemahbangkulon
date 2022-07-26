<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    //
    protected $fillable = [
        'rw',
        'nama_ketua_rw'
    ];

    public function dusun() {
        return $this->belongsTo(dusun::class, 'dusun_id');
    }
}
