<?php

namespace App\Http\Controllers\Admin;

use App\aset;
use App\bahanbakar;
use App\datakeluarga;
use App\datapenduduk;
use App\fasilitasmck;
use App\Http\Controllers\Controller;
use App\keluarga;
use App\listrik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\pendapatan;
use App\statustempattinggal;
use App\sumberair;

class DataKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:data-list',['only'=>['index']]);
        $this->middleware('permission:data-create',['only'=>['create', 'store']]);
        $this->middleware('permission:data-edit',['only'=>['edit', 'update']]);
        $this->middleware('permission:data-delete',['only'=>['destroy']]);  
    }

    public function index()
    {
        //
        
        $pagename='Data Keluarga';
        $datakk = DB::table('datapenduduks AS a')
            ->select('a.id', 'a.nama_lengkap', 'a.nik', 'b.sumber_air', 'b.fasilitas_mck', 'b.peserta_jkn', 'b.peserta_pkh', 'b.nilai_aset', 'b.pendapatan', 'b.tempat_tinggal', 'b.listrik', 'b.bahan_bakar_memasak')
            ->leftJoin('keluargas AS b', 'a.id', '=', 'b.id_dp')
            ->where('a.status', '=', '1')
            ->orderBy('a.id', 'desc')
            ->get();
        $data=keluarga::all();
        $jumlah=DB::table('datapenduduks AS a')
                ->where('a.status', '=' , '1')
                ->count();
        return view('admin.datakeluarga.index', compact('data', 'pagename', 'jumlah', 'datakk'));
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
    public function store(Request $request, $id)
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
        $pagename = 'Form Data Keluarga';
        $air = sumberair::all();
        $mck = fasilitasmck::all();
        $jkn = ["1", "0"];
        $pkh = ["1", "0"];
        $aset = aset::all();
        $bahanbakar = bahanbakar::all();
        $listrik = listrik::all();
        $pendapatan = pendapatan::all();
        $tempattinggal = statustempattinggal::all();
        
        $datakk = DB::table('datapenduduks AS a')
            ->select('a.id', 'a.nama_lengkap', 'a.nik', 'b.sumber_air', 'b.fasilitas_mck', 'b.peserta_jkn', 'b.peserta_pkh', 'b.nilai_aset', 'b.pendapatan', 'b.tempat_tinggal', 'b.listrik', 'b.bahan_bakar_memasak')
            ->leftJoin('keluargas AS b', 'a.id', '=', 'b.id_dp')
            ->where('a.id', '=', $id)
            ->first();

        return view('admin.datakeluarga.edit', compact(
            'pagename', 
            'air', 
            'mck', 
            'jkn', 
            'pkh',
            'aset',
            'bahanbakar',
            'listrik',
            'pendapatan',
            'tempattinggal', 
            'datakk'
        ));
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
        $request->validate([
            'option_air' => 'required',
            'option_mck' => 'required',
            'option_jkn' => 'required',
            'option_pkh' => 'required',
            'option_aset' => 'required',
            'option_pendapatan' => 'required',
            'option_status' => 'required',
            'option_listrik' => 'required',
            'option_bahan' => 'required',
        ]);

        $cek = DB::table('keluargas')
            ->where('id_dp', '=', $id)
            ->count();

        $data = array(
            'id_dp'=>$id,
            'sumber_air'=>$request->get('option_air'),
            'fasilitas_mck'=>$request->get('option_mck'),
            'peserta_jkn'=>$request->get('option_jkn'),
            'peserta_pkh'=>$request->get('option_pkh'),
            'nilai_aset'=>$request->get('option_aset'),
            'pendapatan'=>$request->get('option_pendapatan'),
            'tempat_tinggal'=>$request->get('option_status'),
            'listrik'=>$request->get('option_listrik'),
            'bahan_bakar_memasak'=>$request->get('option_bahan'),
        );
        
        if($cek == null){
            DB::table('keluargas')->insert($data);
        } else {
           DB::table('keluargas')->where('id_dp','=',$id)->update($data);
        }

        return redirect('admin/datakeluarga')->with('sukses', 'data berhasil diupdate');   
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
    
    }
}
