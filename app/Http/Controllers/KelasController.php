<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

    public function store(Request $request)
    {
        $character = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        DB::table('kelas')
            ->insert([
                'id_kelas' => substr(str_shuffle($character), 0, 5),
                'tingkat' => $request->tingkat,
                'paralel' => $request->paralel,
                'walas' => '-',
            ]);
        return back()->with('success', 'Berhasil menambah kelas baru!');
    }

    public function update(Request $request)
    {
        DB::table('kelas')
            ->where('id_kelas', $request->id_kelas)
            ->update([
                'tingkat' => $request->tingkat,
                'paralel' => $request->paralel,
                'walas' => '-', 
            ]);
        return back()->with('success', 'Berhasil mengedit kelas!');
    }

    public function delete(Request $request)
    {
        DB::table('kelas')
            ->where('id_kelas', $request->id_kelas)
            ->delete();
        return back()->with('success', 'Berhasil delete kelas!');
    }
}
