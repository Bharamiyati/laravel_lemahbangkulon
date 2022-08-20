<?php

namespace App\Http\Controllers\Admin;

use App\datameninggal;
use App\datapenduduk;
use App\dusun;
use App\Http\Controllers\Controller;
use App\keluarga;
use App\pekerjaan;
use App\rt;
use App\rw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FacadesFile;

class DataPendudukController extends Controller
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
        $pagename = 'Data Penduduk';
        $data = datapenduduk::all();
        $data = DB::table('datapenduduks')
            ->orderBy('id', 'desc')
            ->get();
        $jumlah = datapenduduk::count();
        $data_dusun = dusun::all();
        $data_rw = rw::all();
        $data_rt = rt::all();
        $data_pekerjaan = pekerjaan::all();
        $status = ["1", "0"];
        $jeniskelamin = ["1", "0"];
        $statuspenduduk = ['1', '0'];
        $statuspernikahan = ['Belum', 'Sudah'];
        
        //mengelompokkan usia dihitung berdasarkan antara tanggal lahir hingga tahun sekarang
        $now = Carbon::now();
        $dataPendudukTagllahir = datapenduduk::select('tanggal_lahir')->get();
        $pendudukAge = [];
        foreach ($dataPendudukTagllahir as $tgl) {
            # code...
            $dattgl = Carbon::parse($tgl->tanggal_lahir);
            $age = $dattgl->diffInYears($now);
            array_push($pendudukAge, $age);
        }

        $ageproduktiv = array_filter($pendudukAge, function ($value) {
            return $value <= 40 && $value >= 20;
        });
      $ageParameter =   count($ageproduktiv);

        return view('admin.datapenduduk.index', compact('jumlah', 'data', 'data_dusun', 'data_rw', 'data_rt', 'pagename', 'status', 'jeniskelamin', 'statuspernikahan', 'statuspenduduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_dusun = dusun::all();
        $data_pekerjaan = pekerjaan::all();
        $data_rw = rw::all();
        $data_rt = rt::all();
        $data_kab = DB::table('kota_kabupaten')->get();
        //dd($data_kab);

        $status = ["1", "0"];
        $jeniskelamin = ["1", "0"];
        $statuspenduduk = ['1', '0'];
        $statuspernikahan = ['Belum', 'Sudah'];
        $pagename = "Form Data Penduduk";
        return view('admin.datapenduduk.create', compact('data_pekerjaan', 'data_dusun', 'data_kab', 'data_rw', 'data_rt', 'pagename', 'status', 'jeniskelamin', 'statuspernikahan', 'statuspenduduk'));
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
            'photo' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'txt_nama' => 'required',
            'txt_nik' => 'required',
            'txt_nomorkk' => 'required',
            'option_status' => 'required',
            'option_jeniskelamin' => 'required',
            'txt_tmptlhr' => 'required',
            'txt_tgllhr' => 'required',
            'option_rt' => 'required',
            'option_rw' => 'required',
            'option_dusun' => 'required',
            'option_statuspernikahan' => 'required',
            'option_pekerjaan' => 'required',
            'option_statuspenduduk' => 'required',
        ]);

        $file = $request->file('photo');
        if ($file == '') {
            $nama_file = "";
        } else {
            $nama_file = time() . "_" . $file->getClientOriginalName();

            //folder tujuan upload foto
            $tujuan_upload = 'public/photo';

            //upload file
            $file->move($tujuan_upload, $nama_file);
        }


        $data_penduduk = new datapenduduk([
            'foto' => $nama_file,
            'nama_lengkap' => $request->get('txt_nama'),
            'nik' => $request->get('txt_nik'),
            'nomor_kk' => $request->get('txt_nomorkk'),
            'status' => $request->get('option_status'),
            'jenis_kelamin' => $request->get('option_jeniskelamin'),
            'tempat_lahir' => $request->get('txt_tmptlhr'),
            'tanggal_lahir' => $request->get('txt_tgllhr'),
            'RT' => $request->get('option_rt'),
            'RW' => $request->get('option_rw'),
            'alamat_dusun' => $request->get('option_dusun'),
            'status_perkawinan' => $request->get('option_statuspernikahan'),
            'pekerjaan' => $request->get('option_pekerjaan'),
            'status_penduduk' => $request->get('option_statuspenduduk'),
        ]);



        $data_penduduk->save();
        return redirect('admin/datapenduduk')->with('sukses', 'data berhasil disimpan');
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
        $data_dusun = dusun::all();
        $data_rw = rw::all();
        $data_rt = rt::all();
        $data_kab = DB::table('kota_kabupaten')->get();
        $data_pekerjaan = pekerjaan::all();
        $status = ["1", "0"];
        $jeniskelamin = ["1", "0"];
        $statuspenduduk = ['1', '0'];
        $statuspernikahan = ['Belum', 'Sudah'];
        $pagename = 'Update Data';
        $data = datapenduduk::find($id);
        return view('admin.datapenduduk.edit', compact('data_pekerjaan', 'data', 'data_kab', 'data_dusun', 'data_rw', 'data_rt', 'pagename', 'status', 'statuspernikahan', 'statuspenduduk', 'jeniskelamin'));
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
            'photo' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'txt_nama' => 'required',
            'txt_nik' => 'required',
            'txt_nomorkk' => 'required',
            'option_status' => 'required',
            'option_jeniskelamin' => 'required',
            'txt_tmptlhr' => 'required',
            'txt_tgllhr' => 'required',
            'option_rt' => 'required',
            'option_rw' => 'required',
            'option_dusun' => 'required',
            'option_statuspernikahan' => 'required',
            'option_pekerjaan' => 'required',
            'option_statuspenduduk' => 'required',
        ]);

        $data_penduduk = datapenduduk::find($id);

        $file = $request->file('photo');

        if ($file == "") {
            $nama_file = $data_penduduk->foto;
        } else {
            $gambar = datapenduduk::where('id', $id)->first();
            FacadesFile::delete('photo/' . $gambar->photo);
            $nama_file = time() . "_" . $file->getClientOriginalName();
            //folder tujuan upload foto
            $tujuan_upload = 'photo';
            //upload file
            $file->move($tujuan_upload, $nama_file);
        }

        $data_penduduk->foto = $nama_file;
        $data_penduduk->nama_lengkap = $request->get('txt_nama');
        $data_penduduk->nik = $request->get('txt_nik');
        $data_penduduk->nomor_kk = $request->get('txt_nomorkk');
        $data_penduduk->status = $request->get('option_status');
        $data_penduduk->jenis_kelamin = $request->get('option_jeniskelamin');
        $data_penduduk->tempat_lahir = $request->get('txt_tmptlhr');
        $data_penduduk->tanggal_lahir = $request->get('txt_tgllhr');
        $data_penduduk->RT = $request->get('option_rt');
        $data_penduduk->RW = $request->get('option_rw');
        $data_penduduk->alamat_dusun = $request->get('option_dusun');
        $data_penduduk->status_perkawinan = $request->get('option_statuspernikahan');
        $data_penduduk->pekerjaan = $request->get('option_pekerjaan');
        $data_penduduk->status_penduduk = $request->get('option_statuspenduduk');

        $data_penduduk->save();
        return redirect('admin/datapenduduk')->with('sukses', 'Data berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = datapenduduk::find($id);

        $data_meninggal = new datameninggal([
            'foto' => $data->foto,
            'nama_lengkap' => $data->nama_lengkap,
            'nik' => $data->nik,
            'nomor_kk' => $data->nomor_kk,
            'jenis_kelamin' => $data->jenis_kelamin,
            'tempat_lahir' => $data->tempat_lahir,
            'tanggal_lahir' => $data->tanggal_lahir,
            'RT' => $data->RT,
            'RW' => $data->RW,
            'alamat_dusun' => $data->alamat_dusun,
            'status_perkawinan' => $data->status_perkawinan,
            'pekerjaan' => $data->pekerjaan,
        ]);

        $data_meninggal->save();

        $gambar = datapenduduk::where('id', $id)->first();
        FacadesFile::delete('photo' . $gambar->foto);
        $datakeluarga = keluarga::find($id);
        if ($datakeluarga != null) {
            $datakeluarga->delete();
            return redirect('admin/datapenduduk')->with('sukses', 'Data berhasil dipindah');
        }
        $data->delete();
        return redirect('admin/datapenduduk')->with('sukses', 'Data berhasil dipindah');
    }
}
