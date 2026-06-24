<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // 1. Tampil Data (Read)
    public function index()
    {
        $reservations = Reservation::orderBy('id', 'desc')->get();
        return view('reservations.index', compact('reservations'));
    }

    // 2. Tambah Data Booking (Create)
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengunjung' => 'required|string|max:255',
            'nomor_meja' => 'required|integer|min:1',
            'durasi_jam' => 'required|integer|min:1',
        ]);

        Reservation::create([
            'nama_pengunjung' => $request->nama_pengunjung,
            'nomor_meja' => $request->nomor_meja,
            'durasi_jam' => $request->durasi_jam,
        ]);

        return redirect()->back()->with('success', 'Booking meja koding berhasil dibuat!');
    }

    // 3. Ubah Status Reservasi (Update oleh Admin)
    public function updateStatus($id, $status)
    {
        $reservation = Reservation::findOrFail($id);
        
        if (in_array($status, ['disetujui', 'selesai', 'dibatalkan'])) {
            $reservation->update(['status' => $status]);
            return redirect()->back()->with('success', 'Status reservasi berhasil diperbarui!');
        }

        return redirect()->back()->with('error', 'Status tidak valid.');
    }
}