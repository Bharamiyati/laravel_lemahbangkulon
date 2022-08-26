<?php

namespace App\Http\Controllers\Admin;

use App\aset;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('permission:data-list', ['only' => ['index']]);
        $this->middleware('permission:data-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:data-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:data-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        //
        $pagename = 'halaman aset';
        $data = aset::all();
        return view('admin.aset.index', compact('pagename', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form kategori aset';
        $data = aset::all();
        return view('admin.aset.create', compact('pagename', 'data'));
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
            'txt_aset' => 'required'
        ]);

        $data_aset = new aset();
        $data_aset->nilai_aset = $request->txt_aset;

        $data_aset->save();
        return redirect('admin/aset');
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
        $pagename = 'Form kategori aset';
        $data = aset::find($id);
        return view('admin.aset.edit', compact('pagename', 'data'));
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
            'txt_aset' => 'required'
        ]);

        $data_aset = aset::find($id);
        $data_aset->nilai_aset = $request->get('txt_aset');

        $data_aset->save();
        return redirect('admin/aset');
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
        $data=aset::find($id);
        $data->delete();
        return redirect()->route('aset.index');
    }
}
