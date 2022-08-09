<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', 'Admin\DashboardController@index');
    Route::get('/datakeluarga', 'Admin\DatakkController@tambah')->name('tambah');
    //Route::resource('/masyarakat', 'Admin\DataController');
    Route::resource('/pindah', 'Admin\PindahController');
    Route::resource('/datameninggal', 'Admin\DataMeninggalController');
    Route::resource('/datapindah', 'Admin\DataPindahController');
    Route::resource('/datapenduduk', 'Admin\DataPendudukController');
    Route::resource('/datakeluarga', 'Admin\DataKeluargaController');
    Route::resource('/views', 'Admin\WelcomeController');
    Route::resource('/alamat', 'Admin\AlamatController');
    Route::resource('/roles', 'Admin\RoleController');
    Route::resource('/users', 'Admin\UserController');
});


//mengambil API data lokasi
//Route::get('/kab', function() {
// Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value

//    $url = "https://twilight-frost-2680.fly.dev/kab";
 //   $curl = curl_init();

    // Optional Authentication:

//    curl_setopt($curl, CURLOPT_URL, $url);
 //   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

//    $result = curl_exec($curl);
//    $result = json_decode($result);

//    curl_close($curl);

    //dd($result->data);

    // foreach ($result->data as $data) {
    //     DB::table('kota_kabupaten')->insert(['nama_kab'=>$data->name]);
    // }

//    dd('sukses');
//});