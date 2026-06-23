<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController; // Pindahkan ke atas agar rapi

Route::get('/', function () {
    // Kita arahkan langsung ke halaman index members
    return redirect()->route('members.index');
});

Route::resource('members', MemberController::class);
Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ReservationController;

// Route untuk Modul Reservasi Coworking Space
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::patch('/reservations/{id}/status/{status}', [ReservationController::class, 'updateStatus'])->name('reservations.updateStatus');