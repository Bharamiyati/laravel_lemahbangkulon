<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\listrik;
use Illuminate\Http\Request;

class ListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'halaman kategori listrik';
        $data = listrik::all();
        return view('admin.listrik.index', compact('pagename', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagename = 'Form kategori listrik';
        $data = listrik::all();
        return view('admin.listrik.create', compact('pagename', 'data'));
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
            'txt_listrik' => 'required'
        ]);

        $data = new listrik();
        $data->listrik = $request->txt_listrik;

        $data->save();
        return redirect('admin/listrik');
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
        $pagename = 'Form kategori listrik';
        $data = listrik::find($id);
        return view('admin.listrik.edit', compact('pagename', 'data'));
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
            'txt_listrik' => 'required'
        ]);

        $data = listrik::find($id);
        $data->listrik = $request->get('txt_listrik');

        $data->save();
        return redirect('admin/listrik');
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
        $data=listrik::find($id);
        $data->delete();
        return redirect()->route('listrik.index');
    }
}
