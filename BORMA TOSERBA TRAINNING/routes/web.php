<?php

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
    return view('index');
});

Route::post('/PostLogin', 'App\Http\Controllers\LoginController@PostLogin');

Route::get('/logout', 'App\Http\Controllers\LogoutController@logout');

Route::get('/manajemen_data', 'App\Http\Controllers\KaryawanController@ManajemenData');

Route::get('/tambah_data', function () {
    return view('tambah_data');
});
Route::post('/PostTambahDataKaryawan', 'App\Http\Controllers\KaryawanController@PostTambahDataKaryawan');
Route::post('/manajamen_data/import_excel', 'App\Http\Controllers\KaryawanController@DataKaryawanImportExcel');
Route::get('/manajamen_data/export_excel','App\Http\Controllers\KaryawanController@DataKaryawanExportExcel');
