<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use DB;

class MateriController extends Controller
{
    public function ManajemenMateri()
    {
        $materi = DB::table('materi')->orderBy('id_materi', 'desc')->get();
        
        return view('manajemen_materi')->with('materi', $materi);
    }

    public function ManajemenMateriCari(Request $request)
    {
		$cari = $request->cari;
        
        $materi = DB::table('materi')->where('judul_materi','like',"%".$cari."%")->orderBy('id_materi', 'desc')->get();

        return view('manajemen_materi')->with('materi', $materi);
    }

    public function TambahMateri()
    {
        $divisi = DB::table('divisi')->orderBy('nama_divisi', 'asc')->get();

        return view('tambah_materi')->with('divisi', $divisi);
    }

    public function PostTambahMateri(Request $request)
    {
        $judul_materi = $request -> judul_materi;
        $keterangan_singkat = $request -> keterangan_singkat;
        $foto_materi = $request -> file('foto_materi');
        $foto_kosong = $request -> foto_kosong;
        $divisi = $request -> divisi;
        $kode_link_video = $request -> kode_link_video;
        $isi_materi = $request -> isi_materi;

        if(empty($foto_materi)){
            $nama_foto = $foto_kosong;
        }

        else{
            $nama_foto = time().'_'.$foto_materi->getClientOriginalName();
            $tujuan_upload = './asset/u_file/foto_materi';
            $foto_materi->move($tujuan_upload,$nama_foto);
        }

        if(empty($kode_link_video)){
            $kode_link_video = "-";
        }

        DB::table('materi')->insert([
            'judul_materi' => $judul_materi,
            'keterangan_singkat' => $keterangan_singkat,
            'foto_materi' => $nama_foto,
            'divisi' => $divisi,
            'kode_link_video' => $kode_link_video,
            'isi_materi' => $isi_materi,
        ]);

        return redirect('./manajemen_materi');
    }

    public function DetailMateri($id_materi)
    {
        $materi = DB::table('materi')->where('id_materi', $id_materi)->get();
        $divisi = DB::table('divisi')->orderBy('nama_divisi', 'asc')->get();

        return view('detail_materi')->with('materi', $materi)->with('divisi', $divisi);
    }

    public function PostEditMateri(Request $request){
        $id_materi = $request -> id_materi;
        $judul_materi = $request -> judul_materi;
        $keterangan_singkat = $request -> keterangan_singkat;
        $foto_materi = $request -> file('foto_materi');
        $foto_materi_lama = $request -> foto_materi_lama;
        $divisi = $request -> divisi;
        $kode_link_video = $request -> kode_link_video;
        $isi_materi = $request -> isi_materi;

        if(empty($foto_materi)){
            $nama_foto = $foto_materi_lama;
        }

        else{
            $nama_foto = time().'_'.$foto_materi->getClientOriginalName();
            $tujuan_upload = './asset/u_file/foto_materi';
            $foto_materi->move($tujuan_upload,$nama_foto);
        }

        if(empty($kode_link_video)){
            $kode_link_video = "-";
        }

        DB::table('materi')->where('id_materi', $id_materi)->update([
            'judul_materi' => $judul_materi,
            'keterangan_singkat' => $keterangan_singkat,
            'foto_materi' => $nama_foto,
            'divisi' => $divisi,
            'kode_link_video' => $kode_link_video,
            'isi_materi' => $isi_materi,
        ]);

        return redirect('./manajemen_materi');
    }


    public function HapusMateri(Request $request)
    {
        $id_materi = $request -> id_materi;

        DB::table('materi')->where('id_materi', $id_materi)->delete();
        
        return redirect('./manajemen_materi');
    }

    public function Materi()
    {
        $divisi = Session::get('divisi');

        $materi = DB::table('materi')->where('divisi', $divisi)->orderBy('id_materi', 'desc')->get();

        return view('materi')->with('materi', $materi);
    }

    public function MateriCari(Request $request)
    {
        $divisi = Session::get('divisi');
        
		$cari = $request->cari;
        
        $materi = DB::table('materi')->where('divisi', $divisi)->where('judul_materi','like',"%".$cari."%")->orderBy('id_materi', 'desc')->get();

        return view('materi')->with('materi', $materi);
    }

    public function LihatMateri($id_materi)
    {
        $materi = DB::table('materi')->where('id_materi', $id_materi)->get();

        return view('lihat_materi')->with('materi', $materi);
    }

}