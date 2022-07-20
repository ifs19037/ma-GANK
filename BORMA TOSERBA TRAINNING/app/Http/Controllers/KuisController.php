<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
 
use App\Models\SoalIsian;
use App\Models\SoalPilihanBerganda;

use Maatwebsite\Excel\Facades\Excel;

use App\Http\Imports\SoalIsianImport;
use App\Http\Imports\SoalPilihanBergandaImport;

use Illuminate\Support\Carbon;

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
    
    public function HapusKuisIsian(Request $request)
    {
        $id_kuis = $request -> id_kuis;

        DB::table('kuis')->where('id_kuis', $id_kuis)->delete();
        DB::table('soal_isian')->where('id_kuis', $id_kuis)->delete();
        
        return redirect('./manajemen_kuis');
    }

    public function HapusKuisPilihanBerganda(Request $request)
    {
        $id_kuis = $request -> id_kuis;

        DB::table('kuis')->where('id_kuis', $id_kuis)->delete();
        DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->delete();
        
        return redirect('./manajemen_kuis');
    }

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

    public function HapusSoalIsian(Request $request)
    {
        $id_kuis = $request -> id_kuis;
        $id_soal_isian = $request -> id_soal_isian;

        DB::table('soal_isian')->where('id_soal_isian', $id_soal_isian)->delete();
        
        return redirect("./detail_kuis/$id_kuis");
    }

    public function HapusSoalPilihanBerganda(Request $request)
    {
        $id_kuis = $request -> id_kuis;
        $id_soal_pilihan_berganda = $request -> id_soal_pilihan_berganda;

        DB::table('soal_pilihan_berganda')->where('id_soal_pilihan_berganda', $id_soal_pilihan_berganda)->delete();
        
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

        $nik_akun = Session::get('nik_akun');

        $id_mulai_kuis = DB::table('mulai_kuis')->select('id_mulai_kuis')->where('nik_akun', $nik_akun)->where('id_kuis', $id_kuis)->orderBy('id_mulai_kuis', 'desc')->limit(1)->first();

        $hasil_kuis = DB::table('hasil_kuis')->where('nik_akun',$nik_akun)->where('id_kuis', $id_kuis)->get();

        return view('lihat_kuis')->with('kuis', $kuis)->with('id_mulai_kuis', $id_mulai_kuis)->with('hasil_kuis', $hasil_kuis);
    }

    public function MemulaiKuis($id_kuis)
    {
        date_default_timezone_set('Asia/Jakarta');
        
        $nik_akun = Session::get('nik_akun');

        $now = date("Y-m-d H:i:s");
        $detik = date("s");
        $menit = date("i");
        $jam = date("H");
        $hari = date("d");
        $bulan = date("m");
        $tahun = date("Y");
        $durasi_pengerjaan = DB::table('kuis')->select('durasi_pengerjaan')->where('id_kuis', $id_kuis)->first();
        $jam_durasi_pengerjaan = round($durasi_pengerjaan->durasi_pengerjaan,0);
        $menit_durasi_pengerjaan = 60 * ($durasi_pengerjaan->durasi_pengerjaan - $jam_durasi_pengerjaan);
        $jam_selesai = $jam + $jam_durasi_pengerjaan;
        $menit_selesai = $menit + $menit_durasi_pengerjaan;

        // if($jam_selesai = 24){            
        //     if($menit = 00){
        //         if($detik > 00){
        //             $hari = date("d") + 1;
        //         }
        //     }

        //     elseif($menit > 00){
        //         $hari = date("d") + 1;
        //     }
        // }

        // else if($jam_selesai > 24){
        //     $hari = date("d") + 1;
        // }

        // else if($hari = date("t")){
        //     $bulan = date("m") + 1;
        // }

        // else if($bulan > 12){
        //     $tahun = date("Y") + 1;
        // }

        $waktu_selesai = date("$tahun-$bulan-$hari $jam_selesai:$menit_selesai:$detik");
        
        DB::table('mulai_kuis')->insert([
            'nik_akun' => $nik_akun,
            'id_kuis' => $id_kuis,
            'waktu_mulai' => $now,
            'waktu_selesai' => $waktu_selesai,
        ]);
        return redirect("./mulai_kuis/$id_kuis");
    }

    public function MulaiKuis($id_kuis)
    {
        $nik_akun = Session::get('nik_akun');

        $kuis = DB::table('kuis')->where('id_kuis', $id_kuis)->get();
        $id_mulai_kuis = DB::table('mulai_kuis')->select('id_mulai_kuis')->where('nik_akun', $nik_akun)->where('id_kuis', $id_kuis)->orderBy('id_mulai_kuis', 'desc')->limit(1)->first();
        $mulai_kuis = DB::table('mulai_kuis')->where('nik_akun', $nik_akun)->where('id_kuis', $id_kuis)->orderBy('id_mulai_kuis', 'desc')->limit(1)->get();
        $divisi = DB::table('divisi')->orderBy('nama_divisi', 'asc')->get();

        // $soal_isian = DB::table('soal_isian')->where('id_kuis', $id_kuis)->inRandomOrder()->simplePaginate(1);
        $soal_isian = DB::table('soal_isian')->where('id_kuis', $id_kuis)->orderBy(DB::raw('RAND()'))->get();
        // $semua_soal_isian = DB::table('soal_isian')->where('id_kuis', $id_kuis)->orderBy('id_soal_isian', 'desc')->get();
        $jumlah_soal_isian = DB::table('soal_isian')->where('id_kuis', $id_kuis)->select(DB::raw('count(*) as jumlah_soal'))->get();

        // $soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->orderBy('id_soal_pilihan_berganda', 'desc')->simplePaginate(1);
        $soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->orderBy(DB::raw('RAND()'))->get();
        // $semua_soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->orderBy('id_soal_pilihan_berganda', 'desc')->get();
        $jumlah_soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->select(DB::raw('count(*) as jumlah_soal'))->get();
        
        return view('mulai_kuis')->with('kuis', $kuis)->with('mulai_kuis', $mulai_kuis)->with('divisi', $divisi)
        ->with('soal_isian', $soal_isian)->with('jumlah_soal_isian', $jumlah_soal_isian)->with('jumlah_soal_pilihan_berganda', $jumlah_soal_pilihan_berganda)
        ->with('soal_pilihan_berganda', $soal_pilihan_berganda);
    }

    // public function MulaiKuis($id_kuis)
    // {
    //     $nik_akun = Session::get('nik_akun');

    //     $kuis = DB::table('kuis')->where('id_kuis', $id_kuis)->get();
    //     $id_mulai_kuis = DB::table('mulai_kuis')->select('id_mulai_kuis')->where('nik_akun', $nik_akun)->where('id_kuis', $id_kuis)->orderBy('id_mulai_kuis', 'desc')->limit(1)->first();
    //     $mulai_kuis = DB::table('mulai_kuis')->where('nik_akun', $nik_akun)->where('id_kuis', $id_kuis)->orderBy('id_mulai_kuis', 'desc')->limit(1)->get();
    //     $divisi = DB::table('divisi')->orderBy('nama_divisi', 'asc')->get();
    //     $soal_isian = DB::table('soal_isian')->where('id_kuis', $id_kuis)->inRandomOrder()->simplePaginate(1);
    //     $semua_soal_isian = DB::table('soal_isian')->where('id_kuis', $id_kuis)->orderBy('id_soal_isian', 'desc')->get();
    //     $jumlah_soal_isian = DB::table('soal_isian')->where('id_kuis', $id_kuis)->select(DB::raw('count(*) as jumlah_soal'))->get();

    //     // $soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->orderBy('id_soal_pilihan_berganda', 'desc')->simplePaginate(1);
    //     $soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->orderBy('id_soal_pilihan_berganda', 'desc')->get();
    //     $semua_soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->orderBy('id_soal_pilihan_berganda', 'desc')->get();
    //     $jumlah_soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->select(DB::raw('count(*) as jumlah_soal'))->get();
        
    //     // $id_soal_pilihan_berganda = $soal_pilihan_berganda->id_soal_pilihan_berganda;
    //     $jawab_id_soal_pilihan_berganda = DB::table('jawaban_kuis_pilihan_berganda')->select('id_soal_pilihan_berganda')->where('nik_akun',$nik_akun)->where('id_kuis', $id_kuis)->get();
    //     $jawaban = DB::table('jawaban_kuis_pilihan_berganda')->select('jawaban')->where('nik_akun',$nik_akun)->where('id_mulai_kuis',$id_mulai_kuis->id_mulai_kuis)->where('id_kuis', $id_kuis)->get();
    //     // $jawaban = $jawaban->jawaban;
    //     $jawab_kuis_pilihan_berganda = DB::table('jawaban_kuis_pilihan_berganda')->where('nik_akun',$nik_akun)->where('id_mulai_kuis',$id_mulai_kuis->id_mulai_kuis)->where('id_kuis',$id_kuis)->first();

    //     return view('mulai_kuis')->with('kuis', $kuis)->with('mulai_kuis', $mulai_kuis)->with('divisi', $divisi)
    //     ->with('soal_isian', $soal_isian)->with('semua_soal_isian', $semua_soal_isian)->with('jumlah_soal_isian', $jumlah_soal_isian)
    //     ->with('semua_soal_pilihan_berganda', $semua_soal_pilihan_berganda)->with('jumlah_soal_pilihan_berganda', $jumlah_soal_pilihan_berganda)
    //     ->with('soal_pilihan_berganda', $soal_pilihan_berganda)->with('jawab_id_soal_pilihan_berganda', $jawab_id_soal_pilihan_berganda)->with('jawaban', $jawaban)
    //     ->with('jawab_kuis_pilihan_berganda', $jawab_kuis_pilihan_berganda);
    // }

    public function JawabPilihanBerganda(Request $request, $id_kuis)
    {
        $nik_akun = Session::get('nik_akun');
        $id_mulai_kuis = $request -> id_mulai_kuis;
        // $id_soal_pilihan_berganda = $request -> id_soal_pilihan_berganda;
        // $id_kuis = DB::table('soal_pilihan_berganda')->select('id_kuis')->where('id_soal_pilihan_berganda', $id_soal_pilihan_berganda)->first();
        
        $soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->orderBy(DB::raw('RAND()'))->get();

        foreach($soal_pilihan_berganda as $soal){
            $id_soal_pilihan_berganda = $soal->id_soal_pilihan_berganda;
            $jawaban = $request -> pilihan[$soal->id_soal_pilihan_berganda];
            $jawaban_soal_pilihan_berganda = $soal->jawaban_soal_pilihan_berganda;
            
            if($jawaban==$jawaban_soal_pilihan_berganda){
                $poin=1;
            }

            elseif($jawaban!=$jawaban_soal_pilihan_berganda){
                $poin=0;
            }

            DB::table('jawaban_kuis_pilihan_berganda')->insert([
                'nik_akun' => $nik_akun,
                'id_mulai_kuis' => $id_mulai_kuis,
                'id_kuis' => $id_kuis,
                'id_soal_pilihan_berganda' => $id_soal_pilihan_berganda,
                'jawaban' => $jawaban,
                'poin' => $poin,
            ]);
        }

        // $total = count($id_soal_pilihan_berganda);

        // for($i=0; $i<$total; $i++){ 
        //     $jawaban_kuis_pilihan_berganda = new JawabanKuisPilihanBerganda;
        //     $jawaban_kuis_pilihan_berganda->nik_akun = $nik_akun;
        //     $jawaban_kuis_pilihan_berganda->id_mulai_kuis = $id_mulai_kuis[$i];
        //     $jawaban_kuis_pilihan_berganda->id_kuis = $id_kuis[$i];
        //     $jawaban_kuis_pilihan_berganda->id_soal_pilihan_berganda = $id_soal_pilihan_berganda[$i];
        //     $jawaban_kuis_pilihan_berganda->jawaban = $jawaban[$i];
        //     $jawaban_kuis_pilihan_berganda->save();
        // }

        return redirect("./nilai_kuis_pilihan_berganda/$id_kuis");
    }

    public function NilaiKuisPilihanBerganda(Request $request, $id_kuis)
    {
        $nik_akun = Session::get('nik_akun');

        $kuis = DB::table('kuis')->where('id_kuis', $id_kuis)->get();

        $id_mulai_kuis = DB::table('mulai_kuis')->select('id_mulai_kuis')->where('nik_akun', $nik_akun)->where('id_kuis', $id_kuis)->orderBy('id_mulai_kuis', 'desc')->limit(1)->first();

        // $id_soal_pilihan_berganda = DB::table('jawaban_kuis_pilihan_berganda')->select('id_soal_pilihan_berganda')
        // ->where('id_mulai_kuis',$id_mulai_kuis->id_mulai_kuis)->where('nik_akun',$nik_akun)->where('id_kuis', $id_kuis)->first();

        $jumlah_soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->select(DB::raw('count(*) as jumlah_soal_pilihan_berganda'))
        ->where('id_kuis', $id_kuis)->first();

        $soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->orderBy('id_soal_pilihan_berganda', 'desc')->get();
        
        $jumlah_benar = DB::table('jawaban_kuis_pilihan_berganda')->select(DB::raw('count(*) as jumlah_benar'))->where('nik_akun',$nik_akun)
        ->where('id_mulai_kuis',$id_mulai_kuis->id_mulai_kuis)->where('id_kuis', $id_kuis)->where('poin', 1)->first();

        $nilai = (100/$jumlah_soal_pilihan_berganda->jumlah_soal_pilihan_berganda)*$jumlah_benar->jumlah_benar;
        
        $nilai_fix = round($nilai,2);

        DB::table('hasil_kuis')->insert([
            'nik_akun' => $nik_akun,
            'id_kuis' => $id_kuis,
            'nilai' => $nilai_fix,
        ]);

        return redirect("./lihat_kuis/$id_kuis");
    }
    
    // public function JawabPilihanBerganda(Request $request, $id_soal)
    // {
    //     $nik_akun = Session::get('nik_akun');
    //     $id_mulai_kuis = $request -> id_mulai_kuis;
    //     $id_kuis = DB::table('soal_pilihan_berganda')->select('id_kuis')->where('id_soal_pilihan_berganda', $id_soal)->first();
    //     $id_jawaban_kuis_pilihan_berganda = DB::table('jawaban_kuis_pilihan_berganda')->select('id_jawaban_kuis_pilihan_berganda')
    //     ->where('nik_akun',$nik_akun)->where('id_mulai_kuis',$id_mulai_kuis)->where('id_kuis',$id_kuis->id_kuis)->where('id_soal_pilihan_berganda',$id_soal)->first();
    //     $jawaban = $request -> pilihan;
    //     $jawab_kuis_pilihan_berganda = DB::table('jawaban_kuis_pilihan_berganda')->where('nik_akun',$nik_akun)->where('id_mulai_kuis',$id_mulai_kuis)
    //     ->where('id_kuis',$id_kuis->id_kuis)->where('id_soal_pilihan_berganda',$id_soal)->first();

    //     // if(empty($jawaban)){
            
    //     // }
    //     // $page = $request->page;
        
    //     if(!$jawab_kuis_pilihan_berganda){
    //         DB::table('jawaban_kuis_pilihan_berganda')->insert([
    //             'nik_akun' => $nik_akun,
    //             'id_mulai_kuis' => $id_mulai_kuis,
    //             'id_kuis' => $id_kuis->id_kuis,
    //             'id_soal_pilihan_berganda' => $id_soal,
    //             'jawaban' => $jawaban,
    //         ]);
    //     }

    //     elseif($jawab_kuis_pilihan_berganda){
    //         DB::table('jawaban_kuis_pilihan_berganda')->where('id_jawaban_kuis_pilihan_berganda', $id_jawaban_kuis_pilihan_berganda->id_jawaban_kuis_pilihan_berganda)->update([
    //             'jawaban' => $jawaban,
    //         ]);
    //     }
       
    //     if(Session::get('halaman')=="sebelumnya"){
    //         return redirect("./mulai_kuis/$id_kuis->id_kuis?page=".($request->page-1));
    //     }

    //     if(Session::get('halaman')=="selanjutnya"){
    //         return redirect("./mulai_kuis/$id_kuis->id_kuis?page=".($request->page+1));
    //     }

    //     // return redirect("./mulai_kuis/$id_kuis->id_kuis");
    // }

    // public function simpanJawabanKuis(Request $request, $id_kuis)
    // {
    //     return response()->json([
    //         'success'=>true,

    //         'url'=>"../mulai_kuis/$id_kuis?page=".($request->page+1),
    //     ]);
    // }

    public function JawabIsian(Request $request, $id_kuis)
    {
        $nik_akun = Session::get('nik_akun');
        $id_mulai_kuis = $request -> id_mulai_kuis;
        // $id_soal_pilihan_berganda = $request -> id_soal_pilihan_berganda;
        // $id_kuis = DB::table('soal_pilihan_berganda')->select('id_kuis')->where('id_soal_pilihan_berganda', $id_soal_pilihan_berganda)->first();
        
        $soal_isian = DB::table('soal_isian')->where('id_kuis', $id_kuis)->orderBy(DB::raw('RAND()'))->get();

        foreach($soal_isian as $soal){
            $id_soal_isian = $soal->id_soal_isian;
            $jawaban = $request -> jawaban_soal_isian[$soal->id_soal_isian];
            DB::table('jawaban_kuis_isian')->insert([
                'nik_akun' => $nik_akun,
                'id_mulai_kuis' => $id_mulai_kuis,
                'id_kuis' => $id_kuis,
                'id_soal_isian' => $id_soal_isian,
                'jawaban' => $jawaban,
            ]);
        }
        
        return redirect("./lihat_kuis/$id_kuis");
    }

    public function Review($id_kuis)
    {
        $nik_akun = Session::get('nik_akun');

        $kuis = DB::table('kuis')->where('id_kuis', $id_kuis)->get();
        $id_mulai_kuis = DB::table('mulai_kuis')->select('id_mulai_kuis')->where('nik_akun', $nik_akun)->where('id_kuis', $id_kuis)->orderBy('id_mulai_kuis', 'desc')->limit(1)->first();

        // $soal_isian = DB::table('soal_isian')->where('id_kuis', $id_kuis)->inRandomOrder()->simplePaginate(1);
        $soal_isian = DB::table('soal_isian')->where('id_kuis', $id_kuis)->orderBy(DB::raw('RAND()'))->get();

        $id_soal_isian = DB::table('jawaban_kuis_isian')->select('id_soal_isian')
        ->where('id_mulai_kuis',$id_mulai_kuis->id_mulai_kuis)->where('nik_akun',$nik_akun)->where('id_kuis', $id_kuis)->first();
        
        $jawaban_kuis_isian = DB::table('jawaban_kuis_isian')->where('nik_akun',$nik_akun)
        ->where('id_mulai_kuis',$id_mulai_kuis->id_mulai_kuis)->where('jawaban_kuis_isian.id_kuis', $id_kuis)
        ->join('soal_isian', 'jawaban_kuis_isian.id_soal_isian', '=', 'soal_isian.id_soal_isian')->get();

        $soal_pilihan_berganda = DB::table('soal_pilihan_berganda')->where('id_kuis', $id_kuis)->orderBy(DB::raw('RAND()'))->get();
        
        $id_soal_pilihan_berganda = DB::table('jawaban_kuis_pilihan_berganda')->select('id_soal_pilihan_berganda')
        ->where('id_mulai_kuis',$id_mulai_kuis->id_mulai_kuis)->where('nik_akun',$nik_akun)->where('id_kuis', $id_kuis)->first();
        
        $jawaban_kuis_pilihan_berganda = DB::table('jawaban_kuis_pilihan_berganda')->where('nik_akun',$nik_akun)
        ->where('id_mulai_kuis',$id_mulai_kuis->id_mulai_kuis)->where('jawaban_kuis_pilihan_berganda.id_kuis', $id_kuis)
        ->join('soal_pilihan_berganda', 'jawaban_kuis_pilihan_berganda.id_soal_pilihan_berganda', '=', 'soal_pilihan_berganda.id_soal_pilihan_berganda')->get();

        $hasil_kuis = DB::table('hasil_kuis')->where('nik_akun',$nik_akun)->where('id_kuis', $id_kuis)->get();

        return view('review')->with('kuis', $kuis)->with('soal_isian', $soal_isian)->with('soal_pilihan_berganda', $soal_pilihan_berganda)
        ->with('jawaban_kuis_pilihan_berganda', $jawaban_kuis_pilihan_berganda)->with('jawaban_kuis_isian', $jawaban_kuis_isian)->with('hasil_kuis', $hasil_kuis);     
    }
}