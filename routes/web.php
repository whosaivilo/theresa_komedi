<?php

use App\Models\Pelanggan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControler;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!'; //tidak kemana-mana, hanya menampilkan teks
});


Route::get('/nama/{param1}', function ($param1) {
    //{param1} adalah parameter, harus diisi
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    //disini {param1?} adalah parameter opsional, boleh diisi boleh tidak
    //$param1 = '' defaultnya adalah string kosong
    return 'NIM saya: '.$param1;
});

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/pegawai', [PegawaiController::class, 'index']);


Route::post('question/store', [QuestionController::class, 'store'])
	->name('question.store');


// Route::get('/auth',[AuthControler::class, 'index']);
// Route::post('/auth/login', [AuthControler::class, 'login']);


//Menampilkan form login
Route::get('/auth', [AuthControler::class, 'index'])->name('auth');
//Memproses form login (POST)
Route::post('/auth/login', [AuthControler::class, 'login'])->name('auth.login');
//Menampilkan form register (GET)
Route::get('/auth/register', [AuthControler::class, 'daftar'])->name('auth.register');
//Memproses form register (POST)
Route::post('/auth/register', [AuthControler::class, 'register'])->name('auth.register.post');

//Dashboard untuk admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

//Dashboard untuk guest
Route::get('/guest', [GuestController::class, 'index'])->name('guest.dashboard');


Route::resource('pelanggan', PelangganController::class);
