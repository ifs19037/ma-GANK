<?php

namespace App\Imports;

use App\DataKaryawan;
use Maatwebsite\Excel\Concerns\ToModel;

class DataKaryawanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataKaryawan([
            'nama_karyawan' => $row[1],
            'nik' => $row[2], 
            'jenis_kelamin' => $row[3], 
            'jabatan' => $row[4],
            'divisi' => $row[5], 
            'lokasi' => $row[6], 
            'tanggal_lahir' => $row[7],
            'tanggal_masuk' => $row[8], 
            'email' => $row[9], 
            'no_telepon' => $row[10], 
            'alamat_ktp' => $row[11], 
            'foto_karyawan' => "user.png", 
        ]);
    }
}
