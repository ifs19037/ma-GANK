<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Akun extends Model
{
    protected $table = "akun";
 
    protected $fillable = ['nik_akun','password','nik_karyawan','level'];
}