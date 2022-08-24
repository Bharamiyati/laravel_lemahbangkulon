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
        $dsn = DB::table('dusuns')->get('nama_dusun');
        $jklkrajanlor = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '1')->where('a.alamat_dusun', '=', $dsn[0]->nama_dusun)->count();
        $jkpkrajanlor = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '0')->where('a.alamat_dusun', '=', $dsn[0]->nama_dusun)->count();
        $jklkrajankidul = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '1')->where('a.alamat_dusun', '=', $dsn[1]->nama_dusun)->count();
        $jkpkrajankidul = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '0')->where('a.alamat_dusun', '=', $dsn[1]->nama_dusun)->count();
        $jkltalangrejo = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '1')->where('a.alamat_dusun', '=', $dsn[3]->nama_dusun)->count();
        $jkptalangrejo = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '0')->where('a.alamat_dusun', '=', $dsn[3]->nama_dusun)->count();
        $jklsukorejo = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '1')->where('a.alamat_dusun', '=', $dsn[2]->nama_dusun)->count();
        $jkpsukorejo = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '0')->where('a.alamat_dusun', '=', $dsn[2]->nama_dusun)->count();
        $jklbarurejo = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '1')->where('a.alamat_dusun', '=', $dsn[4]->nama_dusun)->count();
        $jkpbarurejo = DB::table('datapenduduks AS a')->where('a.jenis_kelamin', '=', '0')->where('a.alamat_dusun', '=', $dsn[4]->nama_dusun)->count();

        //Data Keluarga
        $terdata =DB::table('datapenduduks AS a')->where('a.status_penduduk', '=' , '1')->count();
        $belumterdata = DB::table('datapenduduks AS a')->where('a.status_penduduk', '=' , '0')->count();
        $jkn = DB::table('keluargas AS a')->where('a.peserta_jkn', '=', '1')->count();
        $jknx = DB::table('keluargas AS a')->where('a.peserta_jkn', '=', '0')->count();
        $pkh = DB::table('keluargas AS a')->where('a.peserta_pkh', '=', '1')->count();
        $pkhx = DB::table('keluargas AS a')->where('a.peserta_pkh', '=', '0')->count();

        $airrrr = DB::table('sumberairs')->get('sumber_air');
        $air = DB::table('keluargas AS a')->where('a.sumber_air', '=', $airrrr[0]->sumber_air)->count();
        $airx = DB::table('keluargas AS a')->where('a.sumber_air', '=', $airrrr[1]->sumber_air)->count();
        $airz = DB::table('keluargas AS a')->where('a.sumber_air', '=', $airrrr[2]->sumber_air)->count();

        $mckkkk = DB::table('fasilitasmcks')->get('fasilitas');
        $mck = DB::table('keluargas AS a')->where('a.fasilitas_mck', '=', $mckkkk[0]->fasilitas)->count();
        $mckx = DB::table('keluargas AS a')->where('a.fasilitas_mck', '=', $mckkkk[1]->fasilitas)->count();
        $mckz = DB::table('keluargas AS a')->where('a.fasilitas_mck', '=', $mckkkk[2]->fasilitas)->count();
        
        $asetttt = DB::table('asets')->get('nilai_aset'); 
        $aset = DB::table('keluargas AS a')->where('a.nilai_aset', '=', $asetttt[0]->nilai_aset)->count();
        $asetx = DB::table('keluargas AS a')->where('a.nilai_aset', '=', $asetttt[1]->nilai_aset)->count();
        $asetz = DB::table('keluargas AS a')->where('a.nilai_aset', '=', $asetttt[2]->nilai_aset)->count();

        $pdpt = DB::table('pendapatans')->get('pendapatan');
        $pendapatan = DB::table('keluargas AS a')->where('a.pendapatan', '=', $pdpt[0]->pendapatan)->count();
        $pendapatanx = DB::table('keluargas AS a')->where('a.pendapatan', '=', $pdpt[1]->pendapatan)->count();
        $pendapatanz = DB::table('keluargas AS a')->where('a.pendapatan', '=', $pdpt[2]->pendapatan)->count();

        $tmpt = DB::table('statustempattinggals')->get('status');
        $tempattinggal = DB::table('keluargas AS a')->where('a.tempat_tinggal', '=', $tmpt[0]->status)->count();
        $tempattinggalx = DB::table('keluargas AS a')->where('a.tempat_tinggal', '=', $tmpt[1]->status)->count();
        $tempattinggalz = DB::table('keluargas AS a')->where('a.tempat_tinggal', '=', $tmpt[2]->status)->count();

        $listrikkkk = DB::table('listriks')->get('listrik');
        $listrik = DB::table('keluargas AS a')->where('a.listrik', '=', $listrikkkk[0]->listrik)->count();
        $listrikx = DB::table('keluargas AS a')->where('a.listrik', '=', $listrikkkk[1]->listrik)->count();
        $listrikz = DB::table('keluargas AS a')->where('a.listrik', '=', $listrikkkk[2]->listrik)->count();

        $bhn = DB::table('bahanbakars')->get('jenis');
        $bahan = DB::table('keluargas AS a')->where('a.bahan_bakar_memasak', '=', $bhn[0]->jenis)->count();
        $bahanx = DB::table('keluargas AS a')->where('a.bahan_bakar_memasak', '=', $bhn[1]->jenis)->count();
        $bahanz = DB::table('keluargas AS a')->where('a.bahan_bakar_memasak', '=', $bhn[2]->jenis)->count();
        
        //data Penduduk per dusun
        $d = DB::table('dusuns')->get('nama_dusun');
        $krajanlor = DB::table('datapenduduks AS a')->where('a.alamat_dusun', '=', $d[0]->nama_dusun)->count();
        $krajankidul = DB::table('datapenduduks AS a')->where('a.alamat_dusun', '=', $d[1]->nama_dusun)->count();
        $talangrejo = DB::table('datapenduduks AS a')->where('a.alamat_dusun', '=', $d[2]->nama_dusun)->count();
        $sukorejo = DB::table('datapenduduks AS a')->where('a.alamat_dusun', '=', $d[3]->nama_dusun)->count();
        $barurejo = DB::table('datapenduduks AS a')->where('a.alamat_dusun', '=', $d[4]->nama_dusun)->count();

        //Data Pekerjaan Penduduk
        $pekerjaans = DB::table('pekerjaans')->get('jenis_pekerjaan');
        $pns = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', $pekerjaans[0]->jenis_pekerjaan)->count();
        $wiraswasta = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', $pekerjaans[1]->jenis_pekerjaan)->count();
        $guru = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', $pekerjaans[2]->jenis_pekerjaan)->count();
        $petani = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', $pekerjaans[3]->jenis_pekerjaan)->count();
        $medis = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', $pekerjaans[4]->jenis_pekerjaan)->count();
        $karyawan = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', $pekerjaans[5]->jenis_pekerjaan)->count();
        $peternak = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', $pekerjaans[6]->jenis_pekerjaan)->count();
        $nelayan = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', $pekerjaans[7]->jenis_pekerjaan)->count();
        $sopir = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', $pekerjaans[8]->jenis_pekerjaan)->count();
        $bumn = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', $pekerjaans[9]->jenis_pekerjaan)->count();
        $pelajar = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', $pekerjaans[10]->jenis_pekerjaan)->count();
        $lain = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', $pekerjaans[11]->jenis_pekerjaan)->count();
        $belum = DB::table('datapenduduks AS a')->where('a.pekerjaan', '=', $pekerjaans[12]->jenis_pekerjaan)->count();

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