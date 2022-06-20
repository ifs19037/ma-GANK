<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
 
// use App\Models\Akun;

// use Maatwebsite\Excel\Facades\Excel;

// use App\Http\Imports\AkunImport;

use DB;

class KuisController extends Controller
{
    public function ManajemenKuis()
    {
        $kuis = DB::table('kuis')->orderBy('id_kuis', 'desc')->get();
        $divisi = DB::table('divisi')->orderBy('nama_divisi', 'asc')->get();

        return view('manajemen_kuis')->with('kuis', $kuis)->with('divisi', $divisi);
    }

    public function PostTambahKuis(Request $request)
    {
        $judul_kuis = $request -> judul_kuis;
        $keterangan_singkat = $request -> keterangan_singkat;
        $foto_kuis = $request -> file('foto_kuis');
        $foto_kosong = $request -> foto_kosong;
        $tanggal_kuis = $request -> tanggal_kuis;
        $durasi_pengerjaan = $request -> durasi_pengerjaan;
        $divisi = $request -> divisi;
        
        if(empty($foto_kuis)){
            $nama_file = $foto_kosong;
        }

        else{
            $nama_file = time().'_'.$foto_kuis->getClientOriginalName();
            $tujuan_upload = './asset/u_file/foto_kuis';
            $foto_kuis->move($tujuan_upload,$nama_file);
        }

        DB::table('kuis')->insert([
            'judul_kuis' => $judul_kuis,
            'keterangan_singkat' => $keterangan_singkat,
            'foto_kuis' => $nama_file,
            'tanggal_kuis' => $tanggal_kuis,
            'durasi_pengerjaan' => $durasi_pengerjaan,
            'divisi' => $divisi,
        ]);

        return redirect('./manajemen_kuis');
    }

    public function DetailKuis($id_kuis)
    {
        $kuis = DB::table('kuis')->where('id_kuis', $id_kuis)->get();
        $divisi = DB::table('divisi')->orderBy('nama_divisi', 'asc')->get();

        return view('detail_kuis')->with('kuis', $kuis)->with('divisi', $divisi);
    }

    public function PostEditKuis(Request $request){
        $id_kuis = $request -> id_kuis;
        $judul_kuis = $request -> judul_kuis;
        $keterangan_singkat = $request -> keterangan_singkat;
        $foto_kuis = $request -> file('foto_kuis');
        $foto_kuis_lama= $request -> foto_kuis_lama;
        $tanggal_kuis = $request -> tanggal_kuis;
        $durasi_pengerjaan = $request -> durasi_pengerjaan;
        $divisi = $request -> divisi;

        if(empty($foto_kuis)){
            $nama_file = $foto_kuis_lama;
        }

        else{
            $nama_file = time().'_'.$foto_kuis->getClientOriginalName();
            $tujuan_upload = './asset/u_file/foto_kuis';
            $foto_kuis->move($tujuan_upload,$nama_file);
        }

        DB::table('kuis')->where('id_kuis', $id_kuis)->update([
            'judul_kuis' => $judul_kuis,
            'keterangan_singkat' => $keterangan_singkat,
            'foto_kuis' => $nama_file,
            'tanggal_kuis' => $tanggal_kuis,
            'durasi_pengerjaan' => $durasi_pengerjaan,
            'divisi' => $divisi,
        ]);

        return redirect('./manajemen_kuis');
    }

    // public function AkunExportExcel(Request $request) 
    // {
    //     return Excel::download(new AkunExportExcel($request->nik, $request->password, $request->id_data_karyawan, $request->level)
    //     , 'Akun.xlsx');
    // }

    // public function AkunImportExcel(Request $request) 
	// { 
	// 	Excel::import(new AkunImport, $request->file('file_excel_akun'), null, \Maatwebsite\Excel\Excel::XLSX);

	// 	return redirect('./manajemen_akun');
	// }

    // public function DeleteAkun(Request $request)
    // {
    //     $id = $request -> id;

    //     DB::table('akun')->where('id', $id)->delete();
        
    //     return redirect('./manajemen_akun');
    // }

}