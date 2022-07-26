<?php

namespace App\Http\Controllers\Admin;

use App\datamasyarakat;
use App\datameninggal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class DataMeninggalController extends Controller
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
        $pagename="Data Meninggal";
        $data=datameninggal::all();
        return view('admin.datameninggal.index', compact('data','pagename'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

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
        $data = datameninggal::find($id);
        return view('admin.datameninggal.edit', compact('pagename', 'data'));
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
            'txt_tglwafat' => 'required'
        ]);

        $data_meninggal=datameninggal::find($id);

        $data_meninggal->tanggal_meninggal = $request->get('txt_tglwafat');

        $data_meninggal->save();
        return redirect('admin/datameninggal')->with('sukses', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // //
        $data = datameninggal::find($id);
        $gambar = datameninggal::where('id', $id)->first();
        File::delete('public/foto'.$gambar->foto);   
        $data->delete();
        return redirect('admin/datameninggal')->with('sukses', 'data berhasil dihapus');
    }
}
