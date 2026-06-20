<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua data dari tabel members
        $members = Member::all(); 
        
        // Mengirim data tersebut ke file tampilan bernama 'index' di folder 'members'
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Menampilkan halaman form tambah member
        return view('members.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. Validasi input agar tidak ada data kosong atau nomor telepon ganda
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|unique:members,nomor_telepon',
        ]);

        // 2. Simpan data ke database
        Member::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_telepon' => $request->nomor_telepon,
            // tier_level dan total_poin akan otomatis menggunakan nilai default dari database
        ]);

        // 3. Kembalikan halaman ke daftar member dengan pesan sukses
        return redirect()->route('members.index')->with('success', 'Member baru berhasil didaftarkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Mencari data member berdasarkan ID
        $member = Member::findOrFail($id);
        
        // Menampilkan halaman form edit beserta datanya
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 1. Validasi input (Pengecualian nomor telepon untuk ID yang sedang diedit)
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|unique:members,nomor_telepon,' . $id,
            'tier_level' => 'required|in:Junior,Mid-Level,Senior Coder',
            'total_poin' => 'required|integer|min:0'
        ]);

        // 2. Ambil data dan lakukan pembaruan
        $member = Member::findOrFail($id);
        $member->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_telepon' => $request->nomor_telepon,
            'tier_level' => $request->tier_level,
            'total_poin' => $request->total_poin
        ]);

        // 3. Kembalikan ke halaman index
        return redirect()->route('members.index')->with('success', 'Data member berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cari data lalu hapus dari database
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Data member berhasil dihapus!');
    }
}
