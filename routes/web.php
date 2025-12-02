<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
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

Route::get('/', function (Request $request) {
    if ($request->session()->has('user')) {
        return redirect('/dashboard');
    }
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->middleware(['auth', 'iframe.header']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/home', function () {
    return redirect('/dashboard');
})->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::get('/user/template', [UserController::class, 'download'])->middleware('auth');
Route::post('/user/upload', [UserController::class, 'upload'])->middleware('auth');
Route::post('/store/user', [UserController::class, 'store'])->middleware('auth');
Route::post('/update/user/{username}', [UserController::class, 'update'])->middleware('auth');
Route::post('/update/user', [UserController::class, 'hit'])->middleware('auth');
Route::post('/import', [UserController::class, 'importExcel'])->middleware('auth');

Route::get('/kelas', [KelasController::class, 'index'])->middleware('auth');
Route::post('/kelas/store', [KelasController::class, 'store'])->middleware('auth');
Route::post('/kelas/update', [KelasController::class, 'update'])->middleware('auth');
Route::post('/kelas/delete', [KelasController::class, 'delete'])->middleware('auth');

Route::get('/soal', [SoalController::class, 'index'])->middleware('auth');
Route::get('/soal/{id}', [SoalController::class, 'detail'])->middleware('iframe.header');
Route::post('/store/soal', [SoalController::class, 'store'])->middleware('auth');
Route::post('/update/soal', [SoalController::class, 'update'])->middleware('auth');
Route::post('/delete/soal', [SoalController::class, 'delete'])->middleware('auth');
Route::get('/json', function () {
    $data = json_decode(file_get_contents(storage_path() . "/upload/peserta.json"), true);
    foreach ($data as $key) {
        DB::table('users')
            ->insert([
                'username' => $key['username'],
                'password' => bcrypt($key['password']),
                'nama' => $key['nama_siswa'],
                'status' => $key['status'],
                'kelas' => $key['kelas'],
                'ruang' => $key['ruang'],
                'log' => NULL,
            ]);
    }
    return redirect('/user');
});

Route::get('/cheat', [SoalController::class, 'cheat']);
Route::get('/resetlog', [UserController::class, 'resetLogin']);
Route::get('/resetuser', [UserController::class, 'resetUser']);

Route::get('/pramuka', function() {
    return view('pramuka');
});