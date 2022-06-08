<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Session;

class LoginController extends Controller
{
    public function PostLogin(Request $request){

        $nik = $request->nik;
        $password = $request->password;

        $data = DB::table('akun')->where('nik',$nik)->where('password',$password)->first(); 
        if($data){
            if($data->level ==1){
                Session::put('nik',$data->nik);
                Session::put('password',$data->password);
                Session::put('level',$data->level);
                Session::put('login',TRUE);
                return redirect('./');
            }
            elseif ($data->level ==2) {
                Session::put('nik',$data->nik);
                Session::put('password',$data->password);
                Session::put('level',$data->level);
                Session::put('login',TRUE);
                return redirect('./'); 
            }
        }
        else if(empty($nik) && empty($password)){
            return redirect('./')->with('alert1','ID Karyawan tidak boleh kosong.')->with('alert2','Kata Sandi tidak boleh kosong.');
        }
        else if(empty($nik)){
            return redirect('./')->with('alert1','ID Karyawan tidak boleh kosong.');
        }
        else if(empty($password)){
            return redirect('./')->with('alert2','Kata Sandi tidak boleh kosong.');
        }
        else{
            return redirect('./')->with('alert3','ID Karyawan atau Kata Sandi salah !');
        }
    }
}