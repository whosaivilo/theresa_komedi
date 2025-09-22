<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;




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
