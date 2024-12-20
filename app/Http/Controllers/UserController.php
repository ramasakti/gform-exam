<?php

namespace App\Http\Controllers;

use DB;
use File;
use Storage;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        if (request('ruang')) {
            $dataSiswa = DB::table('users')->join('kelas', 'kelas.id_kelas', '=', 'users.kelas')->where('status', 'Siswa')->where('ruang', request('ruang'))->get();
        }else{
            $dataSiswa = DB::table('users')->join('kelas', 'kelas.id_kelas', '=', 'users.kelas')->where('status', 'Siswa')->orderBy('kelas', 'ASC')->get();
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

    public function import(Request $request)
    {
        $request->validate([
            'user' => 'required|mimes:json'
        ]);
        $file = $request->file('user');
        $namaFile = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $file->move(storage_path() . '/upload/', 'peserta.json');

        return redirect('/json');
    }

    public function importExcel(Request $request)
    {
        Excel::import(new UsersImport, $request->file('user')->store('files'));
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

    public function update(Request $request, $username)
    {
        DB::table('users')
            ->where('username', $username)
            ->update([
                'hit' => $request->hit
            ]);

        return back()->with('success', 'Berhasil update login!'); 
    }

    public function hit(Request $request)
    {
        DB::table('users')
            ->where('status', 'Siswa')
            ->update([
                'hit' => $request->hit
            ]);

        return back()->with('success', 'Berhasil update login!'); 
    }

    public function resetUser()
    {
        DB::table('users')->where('status', '!=', 'Admin')->delete();
        return back()->with('success', 'Berhasil reset user!');
    }

    public function resetLogin()
    {
        DB::table('users')->update(['log' => NULL]);
        return back()->with('success', 'Berhasil membersihkan log user!');
    }
}
