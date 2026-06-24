<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Models\Member;
use App\Models\Menu;
use App\Models\Reservation;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

// Admin Dashboard — dengan data real dari database
Route::get('/admin/dashboard', function () {
    $totalMembers       = Member::count();
    $totalReservations  = Reservation::count();
    $pendingReservations = Reservation::where('status', 'pending')->count();
    $totalMenus         = Menu::count();
    $recentReservations = Reservation::orderBy('id', 'desc')->take(5)->get();

    return view('admin.dashboard', compact(
        'totalMembers',
        'totalReservations',
        'pendingReservations',
        'totalMenus',
        'recentReservations'
    ));
});

// Resource CRUD
Route::resource('members', MemberController::class);
Route::resource('menus', MenuController::class);

// Reservasi
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::patch('/reservations/{id}/status/{status}', [ReservationController::class, 'updateStatus'])->name('reservations.updateStatus');
