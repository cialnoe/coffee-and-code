<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;

// Halaman utama langsung menampilkan welcome.blade.php
Route::get('/', function () {
    return view('welcome');
});


// Route Resource untuk Fitur Kelompok
Route::resource('members', MemberController::class); 
Route::resource('menus', MenuController::class);

// Route untuk Modul Reservasi Coworking Space (Kerjaan Teman)
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::patch('/reservations/{id}/status/{status}', [ReservationController::class, 'updateStatus'])->name('reservations.updateStatus');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

// Route khusus untuk melihat landing page
Route::get('/home', function () {
    return view('welcome');
});