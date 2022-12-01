<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Storage;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        if (request('ruang')) {
            $dataSiswa = DB::table('users')->where('status', 'Siswa')->where('ruang', request('ruang'))->get();
        }else{
            $dataSiswa = DB::table('users')->where('status', 'Siswa')->get();
        }
        $dataGuru = DB::table('users')->where('status', '!=', 'Siswa')->get();
        return view('user', [
            'title' => 'Daftar User',
            'navactive' => 'user',
            'ai' => 1,
            'dataSiswa' => $dataSiswa,
            'dataGuru' => $dataGuru,
            'dataKelas' => DB::table('kelas')->get()
        ]);
    }

    public function importJson()
    {
        $data = Storage::disk('local')->get('/peserta.json');
        $json = json_decode($data, TRUE);
        dd($json);
    }

    public function import(Request $request)
    {
        Excel::import(new UsersImport, $request->file('user'). '.xlsx')->store('temp');
        return back();
    }

    public function store(Request $request)
    {
        if (!$request->kelas) {
            $request->kelas = '';
        }
        if (!$request->ruang) {
            $request->ruang = '';
        }
        DB::table('users')
            ->insert([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'nama' => $request->nama,
                'status' => $request->status,
                'kelas' => $request->kelas,
                'ruang' => $request->ruang,
                'log' => NULL,
            ]);
        return back()->with('success', 'Berhasil tambah user!');
    }

    public function resetUser()
    {
        DB::table('users')->where('status', 'Siswa')->delete();
    }

    public function resetLogin()
    {
        DB::table('users')->where('status', 'Siswa')->delete();
    }
}
