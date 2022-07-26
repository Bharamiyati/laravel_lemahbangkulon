<?php

namespace App\Http\Controllers\Admin;

use App\datapindah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataPindahController extends Controller
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
        $pagename="Data Pindah";
        $data=datapindah::all();
        return view('admin.datapindah.index', compact('data','pagename'));
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
        $pagename='Update Data';
        $data=datapindah::find($id);
        return view('admin.datapindah.edit', compact('pagename', 'data'));
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
            'txt_tglpindah' => 'required',
            'txt_tujuan' => 'required'
        ]);

        $data_pindah=datapindah::find($id);
        $data_pindah->tanggal_pindah = $request->get('txt_tglpindah');
        $data_pindah->tujuan_pindah = $request->get('txt_tujuan');

        $data_pindah->save();
        return redirect('admin/datapindah')->with('sukses', 'data berhasil diupdate');
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
        $data = datapindah::find($id);
        $gambar = datapindah::where('id', $id)->first();
        File::delete('foto'.$gambar->foto);
        $data->delete();
        return redirect('admin/datapindah')->with('sukses', 'Data nerhasil Dihapus');
    }
}
