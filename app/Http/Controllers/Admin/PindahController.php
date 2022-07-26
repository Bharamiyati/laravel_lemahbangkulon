<?php

namespace App\Http\Controllers\Admin;

use App\datakeluarga;
use App\datapenduduk;
use App\datapindah;
use App\Http\Controllers\Controller;
use App\keluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PindahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = datapenduduk::find($id);

        $data_pindah = new datapindah([
            'foto' => $data->foto,
            'nama_lengkap' => $data->nama_lengkap,
            'nik' => $data->nik,
            'nomor_kk' => $data->nomor_kk,
            'jenis_kelamin' => $data->jenis_kelamin,
            'tempat_lahir' => $data->tempat_lahir,
            'tanggal_lahir' => $data->tanggal_lahir,
            'RT' => $data->RT,
            'RW' => $data->RW,
            'alamat_dusun' => $data->alamat_dusun,
            'status_perkawinan' => $data->status_perkawinan,
            'pekerjaan' => $data->pekerjaan,
        ]);
        $data_pindah->save();
        
        $gambar = datapenduduk::where('id',$id)->first();
        File::delete('photo'.$gambar->foto);
        $datakeluarga = keluarga::find($id);
        if ($datakeluarga != null) {
            $datakeluarga->delete();
            return redirect('admin/datapenduduk')->with('sukses', 'Data berhasil Dihapus');
        }
        $data->delete();
        return redirect('admin/datapenduduk')->with('sukses', 'Data berhasil Dihapus');
    }
}
