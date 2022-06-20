<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use DB;

class SOPController extends Controller
{
    public function ManajemenSOP()
    {
        $sop = DB::table('sop')->orderBy('id_sop', 'desc')->get();
        return view('manajemen_sop')->with('sop', $sop);
    }

    public function PostTambahSOP(Request $request)
    {
        $judul_sop = $request -> judul_sop;
        $keterangan_singkat = $request -> keterangan_singkat;
        $foto_sop = $request -> file('foto_sop');
        $foto_kosong = $request -> foto_kosong;
        $file_sop = $request -> file('file_sop');
        
        if(empty($foto_sop)){
            $nama_foto = $foto_kosong;
        }

        else{
            $nama_foto = time().'_'.$foto_sop->getClientOriginalName();
            $tujuan_upload = './asset/u_file/foto_sop';
            $foto_sop->move($tujuan_upload,$nama_foto);
        }

        $nama_file = time().'_'.$file_sop->getClientOriginalName();
        $tujuan_upload = './asset/u_file/file_sop';
        $file_sop->move($tujuan_upload,$nama_file);

        DB::table('sop')->insert([
            'judul_sop' => $judul_sop,
            'keterangan_singkat' => $keterangan_singkat,
            'foto_sop' => $nama_foto,
            'file_sop' => $nama_file,
        ]);

        return redirect('./manajemen_sop');
    }

    public function DetailSOP($id_sop)
    {
        $sop = DB::table('sop')->where('id_sop', $id_sop)->get();

        return view('detail_sop')->with('sop', $sop);
    }

    public function PostEditSOP(Request $request){
        $id_sop = $request -> id_sop;
        $judul_sop = $request -> judul_sop;
        $keterangan_singkat = $request -> keterangan_singkat;
        $foto_sop = $request -> file('foto_sop');
        $foto_sop_lama = $request -> foto_sop_lama;

        if(empty($foto_sop)){
            $nama_foto = $foto_sop_lama;
        }

        else{
            $nama_foto = time().'_'.$foto_sop->getClientOriginalName();
            $tujuan_upload = './asset/u_file/foto_sop';
            $foto_sop->move($tujuan_upload,$nama_foto);
        }

        DB::table('sop')->where('id_sop', $id_sop)->update([
            'judul_sop' => $judul_sop,
            'keterangan_singkat' => $keterangan_singkat,
            'foto_sop' => $nama_foto,
        ]);

        return redirect('./manajemen_sop');
    }


    public function HapusSOP(Request $request)
    {
        $id_sop = $request -> id_sop;

        DB::table('sop')->where('id_sop', $id_sop)->delete();
        
        return redirect('./manajemen_sop');
    }

    public function SOP()
    {
        $sop = DB::table('sop')->orderBy('id_sop', 'desc')->get();
        return view('sop')->with('sop', $sop);
    }

    public function LihatSOP($id_sop)
    {
        $sop = DB::table('sop')->where('id_sop', $id_sop)->get();

        return view('lihat_sop')->with('sop', $sop);
    }

}