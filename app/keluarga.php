<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keluarga extends Model
{
    //
    protected $fillable = [
        'sumber_air',
        'fasilitas_mck',
        'peserta_jkn',
        'peserta_pkh',
        'nilai_aset',
        'pendapatan',
        'tempat_tinggal',
        'listrik',
        'bahan_bakar_memasak'
    ];
}
