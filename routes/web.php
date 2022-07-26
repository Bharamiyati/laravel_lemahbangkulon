<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    
    Route::resource('/alamat', 'Admin\AlamatController');
    Route::resource('/roles', 'Admin\RoleController');
    Route::resource('/users', 'Admin\UserController');
});
