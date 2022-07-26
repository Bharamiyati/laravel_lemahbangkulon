<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datapenduduk extends Model
{
    
    protected $fillable = [
        'foto',
        'nama_lengkap',
        'nik',
        'nomor_kk',
        'status',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'RT',
        'RW',
        'alamat_dusun',
        'status_perkawinan',
        'pekerjaan',
        'status_penduduk'
    ];
}
