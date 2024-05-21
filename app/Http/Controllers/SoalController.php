<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function index()
    {
        $dataSoal = DB::table('soal')->orderBy('kelas_id', 'ASC')->orderBy('tgl', 'ASC')->orderBy('mulai', 'ASC')->get();
        $dataKelas = DB::table('kelas')->orderBy('tingkat', 'ASC')->orderBy('paralel', 'ASC')->get();

        $results = $dataSoal->map(function($soal) use ($dataKelas) {
            $kelasIds = explode('#', trim($soal->kelas_id, '#'));
            $kelasList = $dataKelas->whereIn('id_kelas', $kelasIds)->values();
        
            $soal->kelas = $kelasList;
            return $soal;
        });

        // dd($results);

        return view('soal', [
            'title' => 'Daftar Soal',
            'navactive' => 'soal',
            'ai' => 1,
            'dataKelas' => $dataKelas,
            'dataSoal' => $dataSoal
        ]);
    }

    public function store(Request $request)
    {
        $character = 'abcdefghijklmnopqrstuvwxyz';
        if ($request->isactive === 'true') {
            $isactive = TRUE;
        }else{
            $isactive = FALSE;
        }
        $kelas = '#'. implode('#', $request->kelas);
        DB::table('soal')
            ->insert([
                'id_soal' => substr(str_shuffle($character), 0, 16),
                'mapel' => $request->mapel,
                'url' => $request->url,
                'tgl' => $request->tgl,
                'mulai' => $request->mulai,
                'sampai' => $request->sampai,
                'isactive' => $isactive,
                'kelas_id' => $kelas
            ]);
        return back()->with('success', 'Berhasil menambahkan soal!');
    }
    
    public function update(Request $request)
    {
        if ($request->isactive === 'true') {
            $isactive = TRUE;
        }else{
            $isactive = FALSE;
        }
        $kelas = '#'. implode('#', $request->kelas);
        DB::table('soal')
            ->where('id_soal', $request->id_soal)
            ->update([
                'mapel' => $request->mapel,
                'url' => $request->url,
                'tgl' => $request->tgl,
                'mulai' => $request->mulai,
                'sampai' => $request->sampai,
                'isactive' => $isactive,
                'kelas_id' => $kelas,
            ]);
        return back()->with('success', 'Berhasil mengubah soal!');
    }

    public function delete(Request $request)
    {
        DB::table('soal')
            ->where('id_soal', $request->id_soal)
            ->delete();
        return back()->with('success', 'Berhasil menghapus soal!');
    }

    public function detail($id)
    {
        $detailSoal = DB::table('soal')->where('id_soal', $id)->get();
        return view('soal.detail-soal', [
            'url' => $detailSoal[0]->url
        ]);
    }
}
