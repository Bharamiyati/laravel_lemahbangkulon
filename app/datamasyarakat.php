<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datamasyarakat extends Model
{
    //

    protected $fillable=[
        'foto',
        'nama_lengkap',
        'NIK',
        'nomorkk',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'RT',
        'RW',
        'alamat_dusun',
        'status_perkawinan',
        'pekerjaan'
    ];
}