<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datameninggal extends Model
{
    //
    protected $fillable = [
        'nama_lengkap',
        'nik',
        'nomor_kk',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'RT',
        'RW',
        'alamat_dusun',
        'status_perkawinan',
        'pekerjaan',
        'tanggal_meninggal'
    ];
}
