<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\statustempattinggal;
use Illuminate\Http\Request;

class TempattinggalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'halaman kategori Tempat Tinggal';
        $data = statustempattinggal::all();
        return view('admin.tempattinggal.index', compact('pagename', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form kategori Status Tempat Tinggal';
        $data = statustempattinggal::all();
        return view('admin.tempattinggal.create', compact('pagename', 'data'));
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
            'txt_tempattinggal' => 'required'
        ]);

        $data = new statustempattinggal();
        $data->status = $request->txt_tempattinggal;

        $data->save();
        return redirect('admin/tempattinggal');
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
        $pagename = 'Form kategori Status Tempat Tinggal';
        $data = statustempattinggal::find($id);
        return view('admin.tempattinggal.edit', compact('pagename', 'data'));
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
            'txt_tempattinggal' => 'required'
        ]);

        $data = statustempattinggal::find($id);
        $data->status = $request->get('txt_tempattinggal');

        $data->save();
        return redirect('admin/tempattinggal');
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
        $data=statustempattinggal::find($id);
        $data->delete();
        return redirect()->route('tempattinggal.index');
    }
}
