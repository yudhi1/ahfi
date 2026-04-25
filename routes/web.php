<?php

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/Pegawai', [PegawaiController::class,'index'])->name('pegawai.index');
Route::get('/Pegawai/create', [PegawaiController::class,'create'])->name('pegawai.create');
Route::post('/Pegawai', [PegawaiController::class,'store'])->name('pegawai.store');
Route::get('/Pegawai/{pegawai}/edit', [PegawaiController::class,'edit'])->name('pegawai.edit');
Route::put('/Pegawai/{pegawai}', [PegawaiController::class,'update'])->name('pegawai.update');
Route::delete('/Pegawai/{pegawai}', [PegawaiController::class,'destroy'])->name('pegawai.destroy');


Route::get('/truncate', function () {
    Pegawai::truncate();
});
