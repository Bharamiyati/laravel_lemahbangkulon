<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
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
        $pagename = 'halaman kategori pekerjaan';
        $data = pekerjaan::all();
        return view('admin.pekerjaan.index', compact('pagename', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form kategori pekerjaan';
        $data = pekerjaan::all();
        return view('admin.pekerjaan.create', compact('pagename', 'data'));
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
            'txt_pekerjaan' => 'required'
        ]);

        $data = new pekerjaan();
        $data->jenis_pekerjaan = $request->txt_pekerjaan;

        $data->save();
        return redirect('admin/pekerjaan');
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
        $pagename = 'Form kategori Pekerjaan';
        $data = pekerjaan::find($id);
        return view('admin.pekerjaan.edit', compact('pagename', 'data'));
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
            'txt_pekerjaan' => 'required'
        ]);

        $data = pekerjaan::find($id);
        $data->jenis_pekerjaan = $request->get('txt_pekerjaan');

        $data->save();
        return redirect('admin/pekerjaan');
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
        $data=pekerjaan::find($id);
        $data->delete();
        return redirect()->route('pekerjaan.index');
    }
}
