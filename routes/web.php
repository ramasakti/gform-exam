<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->middleware('auth');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/home', function () {
    return redirect('/dashboard');
})->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::post('/store/user', [UserController::class, 'store'])->middleware('auth');
Route::post('/import', [UserController::class, 'import'])->middleware('auth');

Route::get('/kelas', [KelasController::class, 'index'])->middleware('auth');

Route::get('/soal', [SoalController::class, 'index'])->middleware('auth');
Route::get('/soal/{id}', [SoalController::class, 'detail'])->middleware('auth');
Route::post('/store/soal', [SoalController::class, 'store'])->middleware('auth');
Route::post('/update/soal', [SoalController::class, 'update'])->middleware('auth');
Route::post('/delete/soal', [SoalController::class, 'delete'])->middleware('auth');
Route::get('/json', function () {
    $data = json_decode(file_get_contents(storage_path() . "/peserta.json"), true);
    foreach ($data as $key) {
        DB::table('users')
            ->insert([
                'username' => $key['username'],
                'password' => bcrypt($key['password']),
                'nama' => $key['nama_siswa'],
                'status' => 'Siswa',
                'kelas' => $key['kelas'],
                'ruang' => 'Hasan',
                'log' => NULL,
            ]);
    }
});