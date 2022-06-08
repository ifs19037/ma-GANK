<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\DataKaryawan;
 
// use App\Exports\DataKaryawanExport;
use Maatwebsite\Excel\Facades\Excel;

use App\View\Components\DataKaryawanExportExcel;

use App\Imports\DataKaryawanImport;

use DB;

class KaryawanController extends Controller
{
    public function ManajemenData()
    {
        $data_karyawan = DB::table('data_karyawan')->orderBy('nama_karyawan', 'asc')->get();

        return view('manajemen_data', ['data_karyawan' => $data_karyawan]);
    }

    public function PostTambahDataKaryawan(Request $request)
    {
        $nama_karyawan = $request -> nama_karyawan;
        $nik = $request -> nik;
        $jenis_kelamin = $request -> jenis_kelamin;
        $jabatan = $request -> jabatan;
        $divisi = $request -> divisi;
        $lokasi = $request -> lokasi;
        $tanggal_lahir = $request -> tanggal_lahir;
        $tanggal_masuk = $request -> tanggal_masuk;
        $email = $request -> email;
        $no_telepon = $request -> no_telepon;
        $alamat_ktp = $request -> alamat_ktp;

        DB::table('data_karyawan')->insert([
            'nama_karyawan' => $nama_karyawan,
            'nik' => $nik,
            'jenis_kelamin' => $jenis_kelamin,
            'jabatan' => $jabatan,
            'divisi' => $divisi,
            'lokasi' => $lokasi,
            'tanggal_lahir' => $tanggal_lahir,
            'tanggal_masuk' => $tanggal_masuk,
            'email' => $email,
            'no_telepon' => $no_telepon,
            'alamat_ktp' => $alamat_ktp,
            'foto_karyawan' => "user.png",
        ]);

        return redirect('./manajemen_data');
    }

    // public function DataKaryawanExportExcel(Request $request) 
    // {
    //     return Excel::download(new DataUmatExportExcel($request->username, $request->nama, $request->alamat, $request->nik
    //     , $request->jenis_kelamin, $request->no_hp, $request->lingkungan, $request->no_baptis, $request->paroki, $request->keuskupan)
    //     , 'Data Umat.xlsx');
    // }

    public function DataKaryawanImportExcel(Request $request) 
	{
		$file = $request->file('file_excel_data_karyawan');
 
		$nama_file = time().'_'.$file->getClientOriginalName();
 
        $tujuan_upload = './asset/u_file/excel_data_karyawan';
        $file->move($tujuan_upload,$nama_file);
 
		Excel::import(new DataKaryawanImport, ('./asset/u_file/excel_data_karyawan/'.$nama_file));

		return redirect('./manajemen_data');
	}

}