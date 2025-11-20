<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
            // Ambil data user
            $user = DB::table('users')
                ->leftJoin('kelas', 'kelas.id_kelas', '=', 'users.kelas')
                ->where('username', $request->username)
                ->first();

            // Masukkan ke session
            $request->session()->put('user', $user);

            // Update status login
            if ($user->status === 'Siswa') {
                DB::table('users')
                    ->where('username', $request->username)
                    ->update([
                        'hit' => $user->hit - 1,
                        'log' => date('Y-m-d H:i:s')
                    ]);
            }

            // Cek role
            if ($user->status === 'Pengawas') {
                $rdrct = '/dashboard?ruang=' . $user->ruang;
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
        $request->session()->forget('user');
        return redirect()->intended('/');
    }

    public function dashboard(Request $request)
    {
        if (session('user')->status === 'Siswa') {
            $hit = DB::table('users')->where('username', session('user')->username)->first();

            if ($hit->hit < 1) {
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                $request->session()->forget('user');
                return back()->with('fail', 'Anda sudah login lebih dari 3 kali!');
            }
        }

        $kelas = '%'. $request->session()->get('user')->kelas .'%';
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
