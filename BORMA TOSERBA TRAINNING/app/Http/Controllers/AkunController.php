<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
 
use App\Models\Akun;

use Maatwebsite\Excel\Facades\Excel;

use App\Http\Imports\AkunImport;

use DB;

class AkunController extends Controller
{
    public function ManajemenAkun()
    {
        $akun = DB::table('akun')->where('level','2')->orderBy('nik_akun', 'asc')->get();
        // $nik_akun = DB::table('akun')->select('nik')->where('level','2')->get();
        $data_karyawan = DB::table('data_karyawan')->orderBy('nik_karyawan', 'asc')->get();
        // $data_karyawan = DB::table('data_karyawan')->join('akun', 'data_karyawan.nik', '=', 'akun.nik')->get();

        return view('manajemen_akun')->with('akun', $akun)->with('data_karyawan', $data_karyawan);
    }

    public function PostTambahAkun(Request $request)
    {
        $nik_akun = $request -> nik_akun;
        // $id_data_karyawan = DB::table('data_karyawan')->select('id_data_karyawan')->where('nik',$nik)->get();
        $level = $request -> level;

        DB::table('akun')->insert([
            'nik_akun' => $nik_akun,
            'password' => $nik_akun,
            'nik_karyawan' => $nik_akun,
            'level' => 2
        ]);

        return redirect('./manajemen_akun');
    }

    // public function AkunExportExcel(Request $request) 
    // {
    //     return Excel::download(new AkunExportExcel($request->nik, $request->password, $request->id_data_karyawan, $request->level)
    //     , 'Akun.xlsx');
    // }

    public function AkunImportExcel(Request $request) 
	{ 
		Excel::import(new AkunImport, $request->file('file_excel_akun'), null, \Maatwebsite\Excel\Excel::XLSX);

		return redirect('./manajemen_akun');
	}

    public function HapusAkun(Request $request)
    {
        $nik_akun = $request -> nik_akun;

        DB::table('akun')->where('nik_akun', $nik_akun)->delete();
        
        return redirect('./manajemen_akun');
    }

    public function EditProfil($nik_akun)
    {
        $profil = DB::table('akun')->where('nik_akun', $nik_akun)->join('data_karyawan', 'akun.nik_karyawan', '=', 'data_karyawan.nik_karyawan')->get();;

        return view('edit_profil')->with('profil', $profil);
    }

    public function PostEditFotoProfil(Request $request)
    {
        $nik_akun = Session::get('nik_akun');

        $foto_karyawan = $request -> file('foto_karyawan');
        $foto_karyawan_lama = $request -> foto_karyawan_lama;
        
        if(empty($foto_karyawan)){
            $nama_foto = $foto_karyawan_lama;
        }

        else{
            $nama_foto = time().'_'.$foto_karyawan->getClientOriginalName();
            $tujuan_upload = './asset/u_file/foto_profil';
            $foto_karyawan->move($tujuan_upload,$nama_foto);
        }

        DB::table('data_karyawan')->where('nik_karyawan', $nik_akun)->update([
            'foto_karyawan' => $nama_foto,
        ]);

        return redirect("./edit_profil/$nik_akun");
    }

    public function PostEditKataSandi(Request $request)
    {
        $nik_akun = Session::get('nik_akun');

        $kata_sandi_lama = $request -> kata_sandi_lama;
        $kata_sandi_baru = $request -> kata_sandi_baru;
        $konfirmasi_kata_sandi = $request -> konfirmasi_kata_sandi;

        if($konfirmasi_kata_sandi==$kata_sandi_baru){
            DB::table('akun')->where('nik_akun', $nik_akun)->update([
                'password' => $kata_sandi_baru,
            ]);
        }


        return redirect("./edit_profil/$nik_akun");
    }

}