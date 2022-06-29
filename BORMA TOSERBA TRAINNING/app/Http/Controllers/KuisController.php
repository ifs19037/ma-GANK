<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
 
use App\Models\SoalIsian;
use App\Models\SoalPilihanBerganda;

use Maatwebsite\Excel\Facades\Excel;

use App\Http\Imports\SoalIsianImport;
use App\Http\Imports\SoalPilihanBergandaImport;

use DB;

class KuisController extends Controller
{
    public function ManajemenKuis()
    {
        $kuis = DB::table('kuis')->orderBy('id_kuis', 'desc')->get();
        $divisi = DB::table('divisi')->orderBy('nama_divisi', 'asc')->get();

        return view('manajemen_kuis')->with('kuis', $kuis)->with('divisi', $divisi);
    }

    public function ManajemenKuisCari(Request $request)
    {
		$cari = $request->cari;
        
        $kuis = DB::table('kuis')->where('judul_kuis','like',"%".$cari."%")->orderBy('id_kuis', 'desc')->get();
        $divisi = DB::table('divisi')->orderBy('nama_divisi', 'asc')->get();
        
        return view('manajemen_kuis')->with('kuis', $kuis)->with('divisi', $divisi);
    }

    public function PostTambahKuis(Request $request)
    {
        $judul_kuis = $request -> judul_kuis;
        $keterangan_singkat = $request -> keterangan_singkat;
        $tipe_kuis = $request -> tipe_kuis;
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
            'tipe_kuis' => $tipe_kuis,
            'foto_kuis' => $nama_file,
            'tanggal_kuis' => $tanggal_kuis,
            'durasi_pengerjaan' => $durasi_pengerjaan,
            'divisi' => $divisi,
            'status' => "tampil",
        ]);

        return redirect('./manajemen_kuis');
    }

    public function DetailKuis($id_kuis)
    {
        $kuis = DB::table('kuis')->where('id_kuis', $id_kuis)->get();
        $divisi = DB::table('divisi')->orderBy('nama_divisi', 'asc')->get();
        $soal_isian = DB::table('soal_isian')->where('id_kuis', $id_kuis)->orderBy('id_soal_isian', 'desc')->get();
        $soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->orderBy('id_soal_pilihan_berganda', 'desc')->get();

        return view('detail_kuis')->with('kuis', $kuis)->with('divisi', $divisi)
        ->with('soal_isian', $soal_isian)->with('soal_pilihan_berganda', $soal_pilihan_berganda);
    }

    public function PostEditKuis(Request $request){
        $id_kuis = $request -> id_kuis;
        $judul_kuis = $request -> judul_kuis;
        $keterangan_singkat = $request -> keterangan_singkat;
        $tipe_kuis = $request -> tipe_kuis;
        $foto_kuis = $request -> file('foto_kuis');
        $foto_kuis_lama= $request -> foto_kuis_lama;
        $tanggal_kuis = $request -> tanggal_kuis;
        $durasi_pengerjaan = $request -> durasi_pengerjaan;
        $divisi = $request -> divisi;
        $status = $request -> status;

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
            'tipe_kuis' => $tipe_kuis,
            'foto_kuis' => $nama_file,
            'tanggal_kuis' => $tanggal_kuis,
            'durasi_pengerjaan' => $durasi_pengerjaan,
            'divisi' => $divisi,
            'status' => $status,
        ]);

        return redirect('./manajemen_kuis');
    }

    // public function HapusKuis(Request $request)
    // {
    //     $id = $request -> id;

    //     DB::table('akun')->where('id', $id)->delete();
        
    //     return redirect('./manajemen_akun');
    // }

    public function PostTambahSoalIsian(Request $request)
    {
        $id_kuis = $request -> id_kuis;
        $soal_isian = $request -> soal_isian;

        DB::table('soal_isian')->insert([
            'id_kuis' => $id_kuis,
            'soal_isian' => $soal_isian,
        ]);

        return redirect("./detail_kuis/$id_kuis");
    }
    
    public function PostTambahSoalPilihanBerganda(Request $request)
    {
        $id_kuis = $request -> id_kuis;
        $soal_pilihan_berganda = $request -> soal_pilihan_berganda;
        $pilihan_a = $request -> pilihan_a;
        $pilihan_b = $request -> pilihan_b;
        $pilihan_c = $request -> pilihan_c;
        $pilihan_d = $request -> pilihan_d;
        $pilihan_e = $request -> pilihan_e;
        $jawaban_soal_pilihan_berganda = $request -> jawaban_soal_pilihan_berganda;

        DB::table('soal_pilihan_berganda')->insert([
            'id_kuis' => $id_kuis,
            'soal_pilihan_berganda' => $soal_pilihan_berganda,
            'pilihan_a' => $pilihan_a,
            'pilihan_b' => $pilihan_b,
            'pilihan_c' => $pilihan_c,
            'pilihan_d' => $pilihan_d,
            'pilihan_e' => $pilihan_e,
            'jawaban_soal_pilihan_berganda' => $jawaban_soal_pilihan_berganda,
        ]);

        return redirect("./detail_kuis/$id_kuis");
    }

    public function EditSoalIsian($id_soal)
    {
        $id_kuis_isian = DB::table('soal_isian')->select('id_kuis')->where('id_soal_isian', $id_soal)->get();
        $kuis_isian = DB::table('soal_isian')->where('id_soal_isian', $id_soal)->join('kuis', 'soal_isian.id_kuis', '=', 'kuis.id_kuis')->get();
        $soal_isian = DB::table('soal_isian')->where('id_soal_isian', $id_soal)->get();

        return view('edit_soal_isian')->with('id_kuis_isian', $id_kuis_isian)->with('kuis_isian', $kuis_isian)->with('soal_isian', $soal_isian);
    }

    public function EditSoalPilihanBerganda($id_soal)
    {
        $id_kuis_pilihan_berganda = DB::table('soal_pilihan_berganda')->select('id_kuis')->where('id_soal_pilihan_berganda', $id_soal)->get();
        $kuis_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_soal_pilihan_berganda', $id_soal)
        ->join('kuis', 'soal_pilihan_berganda.id_kuis', '=', 'kuis.id_kuis')->get();
        $soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_soal_pilihan_berganda', $id_soal)->get();

        return view('edit_soal_pilihan_berganda')->with('id_kuis_pilihan_berganda', $id_kuis_pilihan_berganda)->with('kuis_pilihan_berganda', $kuis_pilihan_berganda)
        ->with('soal_pilihan_berganda', $soal_pilihan_berganda);
    }

    public function PostEditSoalIsian(Request $request)
    {
        $id_soal = $request -> id_soal;
        $soal_isian = $request -> soal_isian;

        DB::table('soal_isian')->where('id_soal_isian', $id_soal)->update([
            'soal_isian' => $soal_isian,
        ]);

        return redirect("./edit_soal_isian/$id_soal");
    }

    public function PostEditSoalPilihanBerganda(Request $request)
    {
        $id_soal = $request -> id_soal;
        $soal_pilihan_berganda = $request -> soal_pilihan_berganda;
        $pilihan_a = $request -> pilihan_a;
        $pilihan_b = $request -> pilihan_b;
        $pilihan_c = $request -> pilihan_c;
        $pilihan_d = $request -> pilihan_d;
        $pilihan_e = $request -> pilihan_e;
        $jawaban_soal_pilihan_berganda = $request -> jawaban_soal_pilihan_berganda;

        DB::table('soal_pilihan_berganda')->where('id_soal_pilihan_berganda', $id_soal)->update([
            'soal_pilihan_berganda' => $soal_pilihan_berganda,
            'pilihan_a' => $pilihan_a,
            'pilihan_b' => $pilihan_b,
            'pilihan_c' => $pilihan_c,
            'pilihan_d' => $pilihan_d,
            'pilihan_e' => $pilihan_e,
            'jawaban_soal_pilihan_berganda' => $jawaban_soal_pilihan_berganda,
        ]);

        return redirect("./edit_soal_pilihan_berganda/$id_soal");
    }

    public function TambahSoalIsianImportExcel(Request $request, $id_kuis) 
	{ 
        Session::put('id_kuis', $id_kuis);

        Excel::import(new SoalIsianImport, $request->file('file_excel_soal_isian'), null, \Maatwebsite\Excel\Excel::XLSX);

		return redirect("./detail_kuis/$id_kuis");
	}

    public function TambahSoalPilihanBergandaImportExcel(Request $request, $id_kuis) 
	{ 
        Session::put('id_kuis', $id_kuis);

        Excel::import(new SoalPilihanBergandaImport, $request->file('file_excel_soal_pilihan_berganda'), null, \Maatwebsite\Excel\Excel::XLSX);

		return redirect("./detail_kuis/$id_kuis");
	}

    // public function DeleteAkun(Request $request)
    // {
    //     $id = $request -> id;

    //     DB::table('akun')->where('id', $id)->delete();
        
    //     return redirect('./manajemen_akun');
    // }

    
    // dd($request->file('file_excel_soal_isian'));

    // $array = Excel::toArray(new SoalIsianImport, $request->file('file_excel_soal_isian'));

    // dd($array);

    public function Kuis()
    {
        $divisi = Session::get('divisi');

        $kuis = DB::table('kuis')->where('divisi', $divisi)->where('status', 'tampil')->orderBy('id_kuis', 'desc')->get();

        return view('kuis')->with('kuis', $kuis);
    }
    
    public function KuisCari(Request $request)
    {
        $divisi = Session::get('divisi');
        
		$cari = $request->cari;

        $kuis = DB::table('kuis')->where('divisi', $divisi)->where('status', 'tampil')->where('judul_kuis','like',"%".$cari."%")->orderBy('id_kuis', 'desc')->get();

        return view('kuis')->with('kuis', $kuis);
    }

    public function LihatKuis($id_kuis)
    {
        $kuis = DB::table('kuis')->where('id_kuis', $id_kuis)->get();

        return view('lihat_kuis')->with('kuis', $kuis);
    }

    public function MulaiKuis($id_kuis)
    {
        $kuis = DB::table('kuis')->where('id_kuis', $id_kuis)->get();
        $divisi = DB::table('divisi')->orderBy('nama_divisi', 'asc')->get();
        $soal_isian = DB::table('soal_isian')->where('id_kuis', $id_kuis)->orderBy('id_soal_isian', 'desc')->simplePaginate(1);
        $semua_soal_isian = DB::table('soal_isian')->where('id_kuis', $id_kuis)->orderBy('id_soal_isian', 'desc')->get();
        $jumlah_soal_isian = DB::table('soal_isian')->where('id_kuis', $id_kuis)->select(DB::raw('count(*) as jumlah_soal'))->get();
        $soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->orderBy('id_soal_pilihan_berganda', 'desc')->simplePaginate(1);
        $semua_soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->orderBy('id_soal_pilihan_berganda', 'desc')->get();
        $jumlah_soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->select(DB::raw('count(*) as jumlah_soal'))->get();

        return view('mulai_kuis')->with('kuis', $kuis)->with('divisi', $divisi)
        ->with('soal_isian', $soal_isian)->with('semua_soal_isian', $semua_soal_isian)->with('jumlah_soal_isian', $jumlah_soal_isian)
        ->with('semua_soal_pilihan_berganda', $semua_soal_pilihan_berganda)->with('jumlah_soal_pilihan_berganda', $jumlah_soal_pilihan_berganda)
        ->with('soal_pilihan_berganda', $soal_pilihan_berganda);
    }

}