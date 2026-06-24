<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        Member::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_telepon' => $request->nomor_telepon,
            'tier_level' => 'Junior', // Memastikan default database terisi
            'total_poin' => 0
        ]);

        return redirect()->route('members.index')->with('success', 'Member berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        $member = Member::findOrFail($id);
        $member->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        return redirect()->route('members.index')->with('success', 'Data Member berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Member::findOrFail($id)->delete();
        return redirect()->route('members.index')->with('success', 'Member berhasil dihapus!');
    }
}