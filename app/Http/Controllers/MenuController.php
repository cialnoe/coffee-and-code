<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Tambahkan ini jika belum ada

class MenuController extends Controller // <-- PASTIKAN HURUF 'M' DAN 'C' KAPITAL!
{
    public function index()
    {
        return view('menus.index');
    }
    
    // ... method CRUD lainnya (create, store, edit, dll)
}