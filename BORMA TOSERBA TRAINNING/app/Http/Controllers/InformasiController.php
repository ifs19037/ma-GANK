<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use DB;

class InformasiController extends Controller
{
    public function ManajemenJabatan()
    {
        $jabatan = DB::table('jabatan')->orderBy('nama_jabatan', 'asc')->get();
        return view('manajemen_jabatan')->with('jabatan', $jabatan);
    }

    public function PostTambahJabatan(Request $request)
    {
        $nama_jabatan = $request -> nama_jabatan;

        DB::table('jabatan')->insert([
            'nama_jabatan' => $nama_jabatan,
        ]);

        return redirect('./jabatan');
    }

    public function HapusJabatan(Request $request)
    {
        $id_jabatan = $request -> id_jabatan;

        DB::table('jabatan')->where('id_jabatan', $id_jabatan)->delete();
        
        return redirect('./jabatan');
    }

    public function ManajemenDivisi()
    {
        $divisi = DB::table('divisi')->orderBy('nama_divisi', 'asc')->get();
        return view('manajemen_divisi')->with('divisi', $divisi);
    }

    public function PostTambahDivisi(Request $request)
    {
        $nama_divisi = $request -> nama_divisi;

        DB::table('divisi')->insert([
            'nama_divisi' => $nama_divisi,
        ]);

        return redirect('./divisi');
    }

    public function HapusDivisi(Request $request)
    {
        $id_divisi = $request -> id_divisi;

        DB::table('divisi')->where('id_divisi', $id_divisi)->delete();
        
        return redirect('./divisi');
    }

    public function ManajemenLokasi()
    {
        $lokasi = DB::table('lokasi')->orderBy('nama_lokasi', 'asc')->get();
        return view('manajemen_lokasi')->with('lokasi', $lokasi);
    }

    public function PostTambahLokasi(Request $request)
    {
        $nama_lokasi = $request -> nama_lokasi;

        DB::table('lokasi')->insert([
            'nama_lokasi' => $nama_lokasi,
        ]);

        return redirect('./lokasi');
    }

    public function HapusLokasi(Request $request)
    {
        $id_lokasi = $request -> id_lokasi;

        DB::table('lokasi')->where('id_lokasi', $id_lokasi)->delete();
        
        return redirect('./lokasi');
    }

}