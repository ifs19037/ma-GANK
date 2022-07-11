<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use DB;

class IndexController extends Controller
{
    public function Index()
    {
        $pengumuman = DB::table('pengumuman')->orderBy('id_pengumuman', 'desc')->get();

        return view('index')->with('pengumuman', $pengumuman);
    }

}