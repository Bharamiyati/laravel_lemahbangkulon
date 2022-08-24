<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\pendapatan;
use Illuminate\Http\Request;

class PendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'halaman kategori pendapatan';
        $data = pendapatan::all();
        return view('admin.pendapatan.index', compact('pagename', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form kategori pendapatan';
        $data = pendapatan::all();
        return view('admin.pendapatan.create', compact('pagename', 'data'));
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
            'txt_pendapatan' => 'required'
        ]);

        $data = new pendapatan();
        $data->pendapatan = $request->txt_pendapatan;

        $data->save();
        return redirect('admin/pendapatan');
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
        $pagename = 'Form kategori pendapatan';
        $data = pendapatan::find($id);
        return view('admin.pendapatan.edit', compact('pagename', 'data'));
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

        $data = pendapatan::find($id);
        $data->pendapatan = $request->get('txt_pendapatan');

        $data->save();
        return redirect('admin/pendapatan');
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
        $data=pendapatan::find($id);
        $data->delete();
        return redirect()->route('pendapatan.index');
    }
}
