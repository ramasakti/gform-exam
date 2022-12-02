<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $detailUser = DB::table('users')->where('username', $request->username)->get();
            $request->session()->put('detailUser', $detailUser[0]);
            DB::table('users')
                ->where('username', $request->username)
                ->update([
                    'log' => date('Y-m-d H:i:s')
                ]);
            if ($detailUser[0]->status === 'Pengawas') {
                $rdrct = '/dashboard?ruang=' . $detailUser[0]->ruang;
                return redirect()->intended($rdrct);
            }
            return redirect()->intended('/dashboard');
        }else{
            return back()->with('fail', 'Username atau Password salah!');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->forget('detailUser');
        return redirect()->intended('/');
    }

    public function dashboard(Request $request)
    {
        $kelas = '%'. $request->session()->get('detailUser')->kelas .'%';
        $dataSoal = DB::table('soal')
                        ->where('tgl', date('Y-m-d'))
                        ->where('kelas_id', 'like', $kelas)
                        ->orderBy('mulai', 'ASC')
                        ->get();
        $dataSiswa = DB::table('users')->where('status', 'Siswa')->where('ruang', request('ruang'))->get();
        return view('dashboard', [
            'title' => 'Portal Ujian',
            'navactive' => 'dashboard',
            'ai' => 1,
            'dataSoal' => $dataSoal,
            'dataSiswa' => $dataSiswa
        ]);
    }
}
