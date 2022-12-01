<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $dataKelas = DB::table('kelas')->orderBy('tingkat', 'ASC')->orderBy('paralel', 'ASC')->get();
        return view('kelas', [
            'title' => 'Daftar Kelas',
            'navactive' => 'kelas',
            'ai' => 1,
            'dataKelas' => $dataKelas
        ]);
    }
}
