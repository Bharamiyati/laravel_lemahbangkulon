<?php

namespace App\Http\Controllers\Admin;

use App\datakeluarga;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatakkController extends Controller
{
    //
    public function tambah($id)
    {
        $pagename = 'Form Data Keluarga';
        $air = ["1", "0"];
        $jamban = ["1", "0"];
        $jkn = ["1", "0"];
        $pkh = ["1", "0"];
        
        $datakk = DB::table('datapenduduks AS a')
            ->select('a.id', 'a.nama_lengkap', 'a.nik', 'b.ketersediaan_air_bersih', 'b.ketersediaan_jamban_keluarga', 'b.kepesertaan_jamkesmas', 'b.kepesertaan_pkh', 'b.kepemilikan_aset')
            ->leftJoin('datakeluargas AS b', 'a.id', '=', 'b.id_dp')
            ->where('a.id', '=', $id)
            ->first();

        return view('admin.datakeluarga.create', compact('pagename', 'air', 'jamban', 'jkn', 'pkh', 'datakk'));
    }

    public function simpan(Request $request, $id)
    {
        $request->validate([
            'option_air' => 'required',
            'option_jamban' => 'required',
            'option_jkn' => 'required',
            'option_pkh' => 'required',
            'txt_aset' => 'required'
        ]);

        $cek = DB::table('datakeluargas')
            ->where('id_dp', '=', $id)
            ->count();

            $data = array(
                'id_dp'=>$id,
                'ketersediaan_air_bersih'=>$request->get('option_air'),
                'ketersediaan_jamban_keluarga'=>$request->get('option_jamban'),
                'kepesertaan_jamkesmas'=>$request->get('option_jkn'),
                'kepesertaan_pkh'=>$request->get('option_pkh'),
                'kepemilikan_aset'=>$request->get('txt_aset')
            );
        if($cek == 0){
            DB::table('datakeluargas')->insert($data);
        } else {
           DB::table("datakeluargas")->where('id_dp','=',$id)->update($data);
        }

        return redirect('admin/datakeluarga')->with('sukses', 'data berhasil diupdate');   
    }
}
