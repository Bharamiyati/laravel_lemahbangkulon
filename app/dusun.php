<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dusun extends Model
{
    //
    protected $fillable = [
        'nama_dusun'
    ];

    public function rw() {
        return $this->hasOne(rw::class);
    }
}
