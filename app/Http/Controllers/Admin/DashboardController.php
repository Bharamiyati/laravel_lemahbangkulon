<?php

namespace App\Http\Controllers\Admin;


use App\datapenduduk;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $jumlah = datapenduduk::count();
        $jumlahkk = DB::table('datapenduduks AS a')->where('a.status', '=', '1')->count();

        $dtm1 = DB::table('datameninggals AS a')->whereYear('a.tanggal_meninggal', '=', '2022')->count();
        $dtm2 = DB::table('datameninggals AS a')->whereYear('a.tanggal_meninggal', '=', '2023')->count();
        $dtm3 = DB::table('datameninggals AS a')->whereYear('a.tanggal_meninggal', '=', '2024')->count();
        $dtm4 = DB::table('datameninggals AS a')->whereYear('a.tanggal_meninggal', '=', '2025')->count();
        $dtm5 = DB::table('datameninggals AS a')->whereYear('a.tanggal_meninggal', '=', '2026')->count();

        $dtp1 = DB::table('datapindahs AS a')->whereYear('a.tanggal_pindah', '=', '2022')->count();
        $dtp2 = DB::table('datapindahs AS a')->whereYear('a.tanggal_pindah', '=', '2023')->count();
        $dtp3 = DB::table('datapindahs AS a')->whereYear('a.tanggal_pindah', '=', '2024')->count();
        $dtp4 = DB::table('datapindahs AS a')->whereYear('a.tanggal_pindah', '=', '2025')->count();
        $dtp5 = DB::table('datapindahs AS a')->whereYear('a.tanggal_pindah', '=', '2026')->count();

        //Data Jenis Kelamin
        $jklkrajanlor = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '1')->where('a.alamat_dusun', '=', '1')->count();
        $jkpkrajanlor = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '0')->where('a.alamat_dusun', '=', '1')->count();
        $jklkrajankidul = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '1')->where('a.alamat_dusun', '=', '2')->count();
        $jkpkrajankidul = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '0')->where('a.alamat_dusun', '=', '2')->count();
        $jkltalangrejo = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '1')->where('a.alamat_dusun', '=', '4')->count();
        $jkptalangrejo = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '0')->where('a.alamat_dusun', '=', '4')->count();
        $jklsukorejo = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '1')->where('a.alamat_dusun', '=', '3')->count();
        $jkpsukorejo = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '0')->where('a.alamat_dusun', '=', '3')->count();
        $jklbarurejo = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '1')->where('a.alamat_dusun', '=', '5')->count();
        $jkpbarurejo = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '0')->where('a.alamat_dusun', '=', '5')->count();

        //Data Keluarga
        $terdata =DB::table('datapenduduks AS a')->where('a.status_penduduk', '=' , '1')->count();
        $belumterdata = DB::table('datapenduduks AS a')->where('a.status_penduduk', '=' , '0')->count();
        $jkn = DB::table('keluargas AS a')->where('a.peserta_jkn', '=', '1')->count();
        $jknx = DB::table('keluargas AS a')->where('a.peserta_jkn', '=', '0')->count();
        $pkh = DB::table('keluargas AS a')->where('a.peserta_pkh', '=', '1')->count();
        $pkhx = DB::table('keluargas AS a')->where('a.peserta_pkh', '=', '0')->count();
        $air = DB::table('keluargas AS a')->where('a.sumber_air', '=', 1)->count();
        $airx = DB::table('keluargas AS a')->where('a.sumber_air', '=', 2)->count();
        $airz = DB::table('keluargas AS a')->where('a.sumber_air', '=', 3)->count();
        $mck = DB::table('keluargas AS a')->where('a.fasilitas_mck', '=', 1)->count();
        $mckx = DB::table('keluargas AS a')->where('a.fasilitas_mck', '=', 2)->count();
        $mckz = DB::table('keluargas AS a')->where('a.fasilitas_mck', '=', 3)->count();
        $aset = DB::table('keluargas AS a')->where('a.nilai_aset', '=', 1)->count();
        $asetx = DB::table('keluargas AS a')->where('a.nilai_aset', '=', 2)->count();
        $asetz = DB::table('keluargas AS a')->where('a.nilai_aset', '=', 3)->count();
        $pendapatan = DB::table('keluargas AS a')->where('a.pendapatan', '=', 1)->count();
        $pendapatanx = DB::table('keluargas AS a')->where('a.pendapatan', '=', 2)->count();
        $pendapatanz = DB::table('keluargas AS a')->where('a.pendapatan', '=', 3)->count();
        $tempattinggal = DB::table('keluargas AS a')->where('a.tempat_tinggal', '=', 1)->count();
        $tempattinggalx = DB::table('keluargas AS a')->where('a.tempat_tinggal', '=', 2)->count();
        $tempattinggalz = DB::table('keluargas AS a')->where('a.tempat_tinggal', '=', 3)->count();
        $listrik = DB::table('keluargas AS a')->where('a.listrik', '=', 1)->count();
        $listrikx = DB::table('keluargas AS a')->where('a.listrik', '=', 2)->count();
        $listrikz = DB::table('keluargas AS a')->where('a.listrik', '=', 3)->count();
        $bahan = DB::table('keluargas AS a')->where('a.bahan_bakar_memasak', '=', 1)->count();
        $bahanx = DB::table('keluargas AS a')->where('a.bahan_bakar_memasak', '=', 2)->count();
        $bahanz = DB::table('keluargas AS a')->where('a.bahan_bakar_memasak', '=', 3)->count();
        
        //data Penduduk per dusun
        $krajanlor = DB::table('datapenduduks AS a')->where('a.alamat_dusun', '=', '1')->count();
        $krajankidul = DB::table('datapenduduks AS a')->where('a.alamat_dusun', '=', '2')->count();
        $talangrejo = DB::table('datapenduduks AS a')->where('a.alamat_dusun', '=', '3')->count();
        $sukorejo = DB::table('datapenduduks AS a')->where('a.alamat_dusun', '=', '4')->count();
        $barurejo = DB::table('datapenduduks AS a')->where('a.alamat_dusun', '=', '5')->count();

        //Data Pekerjaan Penduduk
        $pns = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', '1')->count();
        $wiraswasta = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', '2')->count();
        $guru = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', '5')->count();
        $petani = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', '6')->count();
        $medis = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', '7')->count();
        $karyawan = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', '8')->count();
        $peternak = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', '9')->count();
        $nelayan = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', '10')->count();
        $sopir = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', '11')->count();
        $bumn = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', '12')->count();
        $pelajar = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', '13')->count();
        $lain = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', '14')->count();
        $belum = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', '15')->count();

        //mengelompokkan usia dihitung berdasarkan antara tanggal lahir hingga tahun sekarang
        $now = Carbon::now();
        $dptgllhr = datapenduduk::select('tanggal_lahir')->get();
        $usiapenduduk = [];
        foreach ($dptgllhr as $tgl) {
            $datatgl = Carbon::parse($tgl->tanggal_lahir);
            $usia = $datatgl->diffInYears($now);
            array_push($usiapenduduk, $usia);
        }

        $usiaproduktiv = array_filter($usiapenduduk, function ($value) {
            return $value <= 40 && $value >= 20;
        });
        $usiap = count($usiaproduktiv);

        $usiabalita = array_filter($usiapenduduk, function ($value) {
            return $value <= 5 && $value >=0;
        });
        $usiab = count($usiabalita);

        $usiasekolah = array_filter($usiapenduduk, function ($value) {
            return $value <=19 && $value >=6;
        });
        $usias = count($usiasekolah);

        return view('admin.dashboard', compact(
                'usiap',
                'usiab',
                'pns',
                'wiraswasta',
                'guru',
                'petani',
                'medis',
                'karyawan',
                'peternak',
                'nelayan',
                'sopir',
                'bumn',
                'pelajar',
                'lain',
                'belum',
                'krajanlor',
                'krajankidul',
                'talangrejo',
                'barurejo',
                'sukorejo',
                'jumlah', 
                'jumlahkk', 
                'terdata', 
                'belumterdata', 
                'jkn', 
                'jknx', 
                'pkh', 
                'pkhx', 
                'air', 
                'airx',
                'airz', 
                'mck', 
                'mckx',
                'mckz',
                'aset',
                'asetx',
                'asetz',
                'pendapatan',
                'pendapatanx',
                'pendapatanz',
                'tempattinggal',
                'tempattinggalx',
                'tempattinggalz',
                'listrik',
                'listrikx',
                'listrikz',
                'bahan',
                'bahanx',
                'bahanz',
                'jklkrajanlor',
                'jkpkrajanlor',
                'jklkrajankidul',
                'jkpkrajankidul',
                'jkltalangrejo',
                'jkptalangrejo',
                'jklsukorejo',
                'jkpsukorejo',
                'jklbarurejo',
                'jkpbarurejo',
                'dtm1',
                'dtm2',
                'dtm3',
                'dtm4',
                'dtm5',
                'dtp1',
                'dtp2',
                'dtp3',
                'dtp4',
                'dtp5',
            ));
    }

}