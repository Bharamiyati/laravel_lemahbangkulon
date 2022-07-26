<?php

namespace App\Http\Controllers\Admin;

use App\alamat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Alamat';
        $data=alamat::all();
        return view('admin.alamat.index', compact('pagename', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $alamat = alamat::all();
        $pagename = 'Form Data Alamat';
        return view('admin.alamat.create', compact('alamat', 'pagename'));

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
        $request->validate([
            'txt_rt' => 'required',
            'txt_rw' => 'required',
            'txt_dusun' => 'required',
        ]);

        $data_alamat = new alamat();
        $data_alamat->rt = $request->txt_rt;
        $data_alamat->nama_ketua_rt = $request->txt_ketuart;
        $data_alamat->rw = $request->txt_rw;
        $data_alamat->nama_ketua_rw = $request->txt_ketuarw;
        $data_alamat->dusun = $request->txt_dusun;
        $data_alamat->nama_kepala_dusun = $request->txt_kepaladusun;
        
        $data_alamat->save();
        return redirect('admin/alamat')->with('sukses', 'Data Berhasil Disimpan');
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
        $pagename = 'Edit Data Alamat';
        $data_alamat = alamat::find($id);

        return view('admin.alamat.edit', compact('pagename', 'data_alamat'));
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
            'txt_rt' => 'required',
            'txt_rw' => 'required',
            'txt_dusun' => 'required',
        ]);

        $data_alamat = alamat::find($id);
        $data_alamat->rt = $request->txt_rt;
        $data_alamat->nama_ketua_rt = $request->txt_ketuart;
        $data_alamat->rw = $request->txt_rw;
        $data_alamat->nama_ketua_rw = $request->txt_ketuarw;
        $data_alamat->dusun = $request->txt_dusun;
        $data_alamat->nama_kepala_dusun = $request->txt_kepaladusun;

        $data_alamat->save();
        return redirect('admin/alamat')->with('sukses', 'Data Berhasil Dirubah');
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
        $data_alamat=alamat::find($id);
        $data_alamat->delete();
        return redirect()->route('alamat.index')->with('sukses', 'Data Berhasil Dihapus');
    }
}
