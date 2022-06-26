<?php

namespace App\Http\Imports;

use Session;

use App\Models\SoalIsian;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;

class SoalIsianImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(!isset($row['soal_isian'])){
                return NULL;
        }

        $id_kuis = Session::get('id_kuis');

        return new SoalIsian([
            'soal_isian' => $row['soal_isian'],
            'id_kuis' => $id_kuis,
        ]);

        Session::forget('id_kuis');
    }
}
