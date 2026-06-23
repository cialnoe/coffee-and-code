<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController; // Pindahkan ke atas agar rapi

Route::get('/', function () {
    // Kita arahkan langsung ke halaman index members
    return redirect()->route('members.index');
});

Route::resource('members', MemberController::class);