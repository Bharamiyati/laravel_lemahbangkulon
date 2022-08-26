<?php

namespace App\Http\Controllers\Admin;

use App\bahanbakar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BahanbakarController extends Controller
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
        $pagename = 'halaman bahan bakar';
        $data = bahanbakar::all();
        return view('admin.bahanbakar.index', compact('pagename', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form kategori bahan bakar';
        $data = bahanbakar::all();
        return view('admin.bahanbakar.create', compact('pagename', 'data'));
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
            'txt_bahan' => 'required'
        ]);

        $data = new bahanbakar();
        $data->jenis = $request->txt_bahan;

        $data->save();
        return redirect('admin/bahanbakar');
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
        $pagename = 'Form kategori bahan bakar';
        $data = bahanbakar::find($id);
        return view('admin.bahanbakar.edit', compact('pagename', 'data'));
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
            'txt_bahan' => 'required'
        ]);

        $data = bahanbakar::find($id);
        $data->jenis = $request->get('txt_bahan');

        $data->save();
        return redirect('admin/bahanbakar');
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
        $data=bahanbakar::find($id);
        $data->delete();
        return redirect()->route('bahanbakar.index');
    }
}
