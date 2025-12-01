<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!'; //tidak kemana-mana, hanya menampilkan teks
});

Route::get('/nama/{param1}', function ($param1) {
    //{param1} adalah parameter, harus diisi
    return 'Nama saya: ' . $param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    //disini {param1?} adalah parameter opsional, boleh diisi boleh tidak
    //$param1 = '' defaultnya adalah string kosong
    return 'NIM saya: ' . $param1;
});

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/pegawai', [PegawaiController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

// Auth
Route::get('/', [AuthController::class, 'index'])->name('auth');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout');

Route::get('/auth/register', [AuthController::class, 'daftar'])->name('auth.register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register.post');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

Route::resource('pelanggan', PelangganController::class);

Route::prefix('admin')->group(function () {
    Route::resource('user', UserController::class)->names('admin.user');
});

Route::post('/pelanggan/upload-file', [PelangganController::class, 'uploadFile'])
    ->name('pelanggan.uploadFile');

Route::delete('/pelanggan/file/{id}', [PelangganController::class, 'deleteFile'])
    ->name('pelanggan.deleteFile');

Route::group(['middleware' => ['checkrole:Super Admin']], function () {

    Route::get('user', [UserController::class, 'index'])
        ->name('users.list');
    // // Logout

    // tambah route lainnya di sini
});

