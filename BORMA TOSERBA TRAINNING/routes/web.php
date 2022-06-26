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

Route::get('/keluar', 'App\Http\Controllers\LogoutController@keluar');

Route::get('/manajemen_data', 'App\Http\Controllers\KaryawanController@ManajemenData');
// Route::get('/tambah_data', function () {
//     return view('tambah_data');
// });
Route::get('/tambah_data', 'App\Http\Controllers\KaryawanController@TambahData');
Route::post('/PostTambahDataKaryawan', 'App\Http\Controllers\KaryawanController@PostTambahDataKaryawan');
Route::post('/manajemen_data/import_excel', 'App\Http\Controllers\KaryawanController@DataKaryawanImportExcel');
Route::get('/manajemen_data/export_excel','App\Http\Controllers\KaryawanController@DataKaryawanExportExcel');
Route::get('/detail_karyawan/{nik_karyawan}', 'App\Http\Controllers\KaryawanController@DetailDataKaryawan');
Route::post('/PostEditDataKaryawan', 'App\Http\Controllers\KaryawanController@PostEditDataKaryawan');
Route::get('/hapus_data_karyawan/{nik_karyawan}', 'App\Http\Controllers\KaryawanController@HapusDataKaryawan');

Route::get('/manajemen_akun', 'App\Http\Controllers\AkunController@ManajemenAkun');
Route::post('/manajemen_akun/tambah_akun', 'App\Http\Controllers\AkunController@PostTambahAkun');
Route::post('/manajemen_akun/import_excel', 'App\Http\Controllers\AkunController@AkunImportExcel');
Route::get('/hapus_akun/{nik_akun}', 'App\Http\Controllers\AkunController@HapusAkun');

Route::get('/manajemen_kuis', 'App\Http\Controllers\KuisController@ManajemenKuis');
Route::get('/manajemen_kuis', 'App\Http\Controllers\KuisController@ManajemenKuisCari');
Route::post('/manajemen_kuis/tambah_kuis', 'App\Http\Controllers\KuisController@PostTambahKuis');
Route::get('/detail_kuis/{id_kuis}', 'App\Http\Controllers\KuisController@DetailKuis');
Route::post('/PostEditKuis', 'App\Http\Controllers\KuisController@PostEditKuis');

Route::get('/kuis', 'App\Http\Controllers\KuisController@Kuis');
Route::get('/kuis', 'App\Http\Controllers\KuisController@KuisCari');
Route::get('/lihat_kuis/{id_kuis}', 'App\Http\Controllers\KuisController@LihatKuis');

Route::post('/tambah_soal/import_excel_soal_isian/{id_kuis}', 'App\Http\Controllers\KuisController@TambahSoalIsianImportExcel');
Route::post('/tambah_soal/import_excel_soal_pilihan_berganda/{id_kuis}', 'App\Http\Controllers\KuisController@TambahSoalPilihanBergandaImportExcel');

Route::post('/detail_kuis/tambah_soal_pilihan_berganda', 'App\Http\Controllers\KuisController@PostTambahSoalPilihanBerganda');
Route::post('/detail_kuis/tambah_soal_isian', 'App\Http\Controllers\KuisController@PostTambahSoalIsian');
Route::post('/edit_soal/PostEditSoalIsian', 'App\Http\Controllers\KuisController@PostEditSoalIsian');
Route::post('/edit_soal/PostEditSoalPilihanBerganda', 'App\Http\Controllers\KuisController@PostEditSoalPilihanBerganda');

Route::get('/edit_soal_isian/{id_soal}', 'App\Http\Controllers\KuisController@EditSoalIsian');
Route::get('/edit_soal_pilihan_berganda/{id_soal}', 'App\Http\Controllers\KuisController@EditSoalPilihanBerganda');

Route::get('/mulai_kuis/{id_kuis}', 'App\Http\Controllers\KuisController@MulaiKuis');

Route::get('/jabatan', 'App\Http\Controllers\InformasiController@ManajemenJabatan');
Route::post('/jabatan/tambah_jabatan', 'App\Http\Controllers\InformasiController@PostTambahJabatan');
Route::get('/hapus_jabatan/{id_jabatan}', 'App\Http\Controllers\InformasiController@HapusJabatan');

Route::get('/divisi', 'App\Http\Controllers\InformasiController@ManajemenDivisi');
Route::post('/divisi/tambah_divisi', 'App\Http\Controllers\InformasiController@PostTambahDivisi');
Route::get('/hapus_divisi/{id_divisi}', 'App\Http\Controllers\InformasiController@HapusDivisi');

Route::get('/lokasi', 'App\Http\Controllers\InformasiController@ManajemenLokasi');
Route::post('/lokasi/tambah_lokasi', 'App\Http\Controllers\InformasiController@PostTambahLokasi');
Route::get('/hapus_lokasi/{id_lokasi}', 'App\Http\Controllers\InformasiController@HapusLokasi');

Route::get('/manajemen_sop', 'App\Http\Controllers\SOPController@ManajemenSOP');
Route::get('/manajemen_sop', 'App\Http\Controllers\SOPController@ManajemenSOPCari');
Route::post('/manajemen_sop/tambah_sop', 'App\Http\Controllers\SOPController@PostTambahSOP');
Route::get('/detail_sop/{id_sop}', 'App\Http\Controllers\SOPController@DetailSOP');
Route::post('/PostEditSOP', 'App\Http\Controllers\SOPController@PostEditSOP');
Route::get('/hapus_sop/{id_sop}', 'App\Http\Controllers\SOPController@HapusSOP');

Route::get('/sop', 'App\Http\Controllers\SOPController@SOP');
Route::get('/sop', 'App\Http\Controllers\SOPController@SOPCari');
Route::get('/lihat_sop/{id_sop}', 'App\Http\Controllers\SOPController@LihatSOP');

Route::get('/manajemen_materi', 'App\Http\Controllers\MateriController@ManajemenMateri');
Route::get('/manajemen_materi', 'App\Http\Controllers\MateriController@ManajemenMateriCari');
Route::get('/tambah_materi', function () {
    return view('tambah_materi');
});
Route::get('/tambah_materi', 'App\Http\Controllers\MateriController@TambahMateri');
Route::post('/PostTambahMateri', 'App\Http\Controllers\MateriController@PostTambahMateri');
Route::get('/detail_materi/{id_materi}', 'App\Http\Controllers\MateriController@DetailMateri');
Route::post('/PostEditMateri', 'App\Http\Controllers\MateriController@PostEditMateri');
Route::get('/hapus_materi/{id_materi}', 'App\Http\Controllers\MateriController@HapusMateri');

Route::get('/materi', 'App\Http\Controllers\MateriController@Materi');
Route::get('/materi', 'App\Http\Controllers\MateriController@MateriCari');
Route::get('/lihat_materi/{id_materi}', 'App\Http\Controllers\MateriController@LihatMateri');

Route::get('/edit_profil/{nik_akun}', 'App\Http\Controllers\AkunController@EditProfil');
Route::post('/PostEditFotoProfil', 'App\Http\Controllers\AkunController@PostEditFotoProfil');
Route::post('/PostEditKataSandi', 'App\Http\Controllers\AkunController@PostEditKataSandi');
