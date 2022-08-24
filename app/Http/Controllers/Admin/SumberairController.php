<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\sumberair;
use Illuminate\Http\Request;

class SumberairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'halaman kategori sumber air';
        $data = sumberair::all();
        return view('admin.sumberair.index', compact('pagename', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form kategori sumber air';
        $data = sumberair::all();
        return view('admin.sumberair.create', compact('pagename', 'data'));
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
            'txt_sumberair' => 'required'
        ]);

        $data = new sumberair();
        $data->sumber_air = $request->txt_sumberair;

        $data->save();
        return redirect('admin/sumberair');
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
        $pagename = 'Form kategori Sumber Air';
        $data = sumberair::find($id);
        return view('admin.sumberair.edit', compact('pagename', 'data'));
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
            'txt_sumberair' => 'required'
        ]);

        $data = sumberair::find($id);
        $data->sumber_air = $request->get('txt_sumberair');

        $data->save();
        return redirect('admin/sumberair');
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
        $data=sumberair::find($id);
        $data->delete();
        return redirect()->route('sumberair.index');
    }
}
