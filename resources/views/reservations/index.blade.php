@extends('layouts.app')

@section('title', 'Kelola Reservasi')
@section('page-title', 'Manajemen Reservasi')
@section('page-subtitle', 'Pantau & ubah status pemesanan meja co-working')

@section('content')

<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-stone-200 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h2 class="font-bold text-stone-800">Semua Reservasi</h2>
            <p class="text-xs text-stone-400 mt-0.5">Total {{ $reservations->count() }} reservasi tercatat</p>
        </div>
        <div class="flex items-center gap-2 text-xs">
            <span class="bg-amber-100 text-amber-700 px-2.5 py-1 rounded-full font-semibold">
                {{ $reservations->where('status', 'pending')->count() }} Pending
            </span>
            <span class="bg-blue-100 text-blue-700 px-2.5 py-1 rounded-full font-semibold">
                {{ $reservations->where('status', 'disetujui')->count() }} Disetujui
            </span>
            <span class="bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-full font-semibold">
                {{ $reservations->where('status', 'selesai')->count() }} Selesai
            </span>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="bg-stone-50 border-b border-stone-200 text-stone-500 text-xs uppercase font-semibold">
                    <th class="px-6 py-3 w-12">#</th>
                    <th class="px-6 py-3">Nama Pengunjung</th>
                    <th class="px-6 py-3">Nomor Meja</th>
                    <th class="px-6 py-3">Durasi</th>
                    <th class="px-6 py-3">Waktu Booking</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-center min-w-[200px]">Ubah Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100 text-stone-700">
                @forelse($reservations as $res)
                <tr class="hover:bg-stone-50 transition">
                    <td class="px-6 py-4 text-stone-400 text-xs font-mono">{{ $res->id }}</td>
                    <td class="px-6 py-4 font-semibold text-stone-900">{{ $res->nama_pengunjung }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-stone-100 text-stone-700 text-xs font-bold px-2.5 py-1 rounded-full">
                            <i class="fa-solid fa-table-cells-large mr-1"></i>Meja {{ $res->nomor_meja }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-stone-800 font-medium">{{ $res->durasi_jam }}</span>
                        <span class="text-stone-400 text-xs ml-0.5">jam</span>
                    </td>
                    <td class="px-6 py-4 text-stone-500 text-xs">
                        {{ $res->created_at->format('d M Y, H:i') }} WIB
                    </td>
                    <td class="px-6 py-4">
                        @if($res->status === 'pending')
                            <span class="inline-flex items-center gap-1.5 bg-amber-100 text-amber-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                <i class="fa-solid fa-circle-dot animate-pulse"></i> Pending
                            </span>
                        @elseif($res->status === 'disetujui')
                            <span class="inline-flex items-center gap-1.5 bg-blue-100 text-blue-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                <i class="fa-solid fa-check-circle"></i> Disetujui
                            </span>
                        @elseif($res->status === 'selesai')
                            <span class="inline-flex items-center gap-1.5 bg-emerald-100 text-emerald-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                <i class="fa-solid fa-circle-check"></i> Selesai
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 bg-red-100 text-red-600 text-xs font-semibold px-2.5 py-1 rounded-full">
                                <i class="fa-solid fa-circle-xmark"></i> Dibatalkan
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2 flex-wrap">
                            <form action="{{ route('reservations.updateStatus', [$res->id, 'disetujui']) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <button type="submit"
                                    {{ $res->status !== 'pending' ? 'disabled' : '' }}
                                    class="px-3 py-1.5 rounded-lg text-xs font-semibold transition
                                    {{ $res->status !== 'pending' ? 'bg-stone-100 text-stone-300 cursor-not-allowed' : 'bg-blue-100 text-blue-700 hover:bg-blue-600 hover:text-white' }}">
                                    <i class="fa-solid fa-check mr-1"></i>Setuju
                                </button>
                            </form>
                            <form action="{{ route('reservations.updateStatus', [$res->id, 'selesai']) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <button type="submit"
                                    {{ in_array($res->status, ['selesai', 'dibatalkan']) ? 'disabled' : '' }}
                                    class="px-3 py-1.5 rounded-lg text-xs font-semibold transition
                                    {{ in_array($res->status, ['selesai', 'dibatalkan']) ? 'bg-stone-100 text-stone-300 cursor-not-allowed' : 'bg-emerald-100 text-emerald-700 hover:bg-emerald-600 hover:text-white' }}">
                                    <i class="fa-solid fa-flag-checkered mr-1"></i>Selesai
                                </button>
                            </form>
                            <form action="{{ route('reservations.updateStatus', [$res->id, 'dibatalkan']) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <button type="submit"
                                    {{ in_array($res->status, ['selesai', 'dibatalkan']) ? 'disabled' : '' }}
                                    class="px-3 py-1.5 rounded-lg text-xs font-semibold transition
                                    {{ in_array($res->status, ['selesai', 'dibatalkan']) ? 'bg-stone-100 text-stone-300 cursor-not-allowed' : 'bg-red-50 text-red-600 hover:bg-red-500 hover:text-white' }}">
                                    <i class="fa-solid fa-ban mr-1"></i>Batal
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-16 text-center text-stone-400">
                        <i class="fa-solid fa-calendar-xmark text-4xl block mb-3 text-stone-300"></i>
                        <p class="font-medium">Belum ada data reservasi.</p>
                        <p class="text-xs mt-1">Reservasi akan muncul setelah pengunjung melakukan booking di landing page.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
