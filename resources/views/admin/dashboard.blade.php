@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Ringkasan Data')
@section('page-subtitle', 'Pantau aktivitas Coffee Code secara real-time')

@section('content')

<!-- STAT CARDS -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-stone-500 text-sm font-medium">Total Members</p>
            <h3 class="text-3xl font-extrabold text-stone-800 mt-1">{{ $totalMembers }}</h3>
            <p class="text-xs text-stone-400 mt-1">terdaftar</p>
        </div>
        <div class="p-3 bg-amber-100 rounded-xl text-amber-600 text-xl"><i class="fa-solid fa-users"></i></div>
    </div>
    <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-stone-500 text-sm font-medium">Total Reservasi</p>
            <h3 class="text-3xl font-extrabold text-stone-800 mt-1">{{ $totalReservations }}</h3>
            <p class="text-xs text-stone-400 mt-1">semua waktu</p>
        </div>
        <div class="p-3 bg-emerald-100 rounded-xl text-emerald-600 text-xl"><i class="fa-solid fa-calendar-check"></i></div>
    </div>
    <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-stone-500 text-sm font-medium">Pending Reservasi</p>
            <h3 class="text-3xl font-extrabold text-stone-800 mt-1">{{ $pendingReservations }}</h3>
            <p class="text-xs text-amber-500 mt-1 font-medium">perlu ditindak</p>
        </div>
        <div class="p-3 bg-yellow-100 rounded-xl text-yellow-600 text-xl"><i class="fa-solid fa-clock"></i></div>
    </div>
    <div class="bg-white p-6 rounded-xl border border-stone-200 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-stone-500 text-sm font-medium">Item Menu</p>
            <h3 class="text-3xl font-extrabold text-stone-800 mt-1">{{ $totalMenus }}</h3>
            <p class="text-xs text-stone-400 mt-1">produk aktif</p>
        </div>
        <div class="p-3 bg-blue-100 rounded-xl text-blue-600 text-xl"><i class="fa-solid fa-mug-hot"></i></div>
    </div>
</div>

<!-- RECENT RESERVATIONS TABLE -->
<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden mb-8">
    <div class="px-6 py-4 border-b border-stone-200 flex items-center justify-between">
        <div>
            <h2 class="font-bold text-stone-800">Reservasi Terbaru</h2>
            <p class="text-xs text-stone-400 mt-0.5">5 reservasi terakhir masuk</p>
        </div>
        <a href="/reservations" class="bg-stone-900 hover:bg-amber-500 hover:text-stone-900 text-white px-4 py-2 rounded-lg text-xs font-semibold transition">
            Kelola Semua <i class="fa-solid fa-arrow-right ml-1"></i>
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="bg-stone-50 border-b border-stone-200 text-stone-500 text-xs uppercase font-semibold">
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">No. Meja</th>
                    <th class="px-6 py-3">Durasi</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-center">Aksi Cepat</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100 text-stone-700">
                @forelse($recentReservations as $res)
                <tr class="hover:bg-stone-50 transition">
                    <td class="px-6 py-4 font-medium text-stone-900">{{ $res->nama_pengunjung }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-stone-100 text-stone-700 text-xs font-semibold px-2.5 py-1 rounded-full">Meja {{ $res->nomor_meja }}</span>
                    </td>
                    <td class="px-6 py-4">{{ $res->durasi_jam }} Jam</td>
                    <td class="px-6 py-4">
                        @if($res->status === 'pending')
                            <span class="bg-amber-100 text-amber-700 text-xs font-semibold px-2.5 py-1 rounded-full">Pending</span>
                        @elseif($res->status === 'disetujui')
                            <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-2.5 py-1 rounded-full">Disetujui</span>
                        @elseif($res->status === 'selesai')
                            <span class="bg-emerald-100 text-emerald-700 text-xs font-semibold px-2.5 py-1 rounded-full">Selesai</span>
                        @else
                            <span class="bg-red-100 text-red-700 text-xs font-semibold px-2.5 py-1 rounded-full">Dibatalkan</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                            @if($res->status === 'pending')
                            <form action="{{ route('reservations.updateStatus', [$res->id, 'disetujui']) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit" title="Setujui" class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition text-xs">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            </form>
                            @endif
                            @if($res->status !== 'selesai' && $res->status !== 'dibatalkan')
                            <form action="{{ route('reservations.updateStatus', [$res->id, 'selesai']) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit" title="Tandai Selesai" class="w-8 h-8 flex items-center justify-center rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition text-xs">
                                    <i class="fa-solid fa-circle-check"></i>
                                </button>
                            </form>
                            <form action="{{ route('reservations.updateStatus', [$res->id, 'dibatalkan']) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit" title="Batalkan" class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition text-xs">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </form>
                            @else
                            <span class="text-xs text-stone-400 italic">—</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-stone-400 text-sm">
                        <i class="fa-solid fa-calendar-xmark text-3xl mb-3 block"></i>
                        Belum ada reservasi masuk.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- QUICK LINKS -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
    <a href="/members/create" class="bg-white border border-stone-200 hover:border-amber-400 hover:shadow-md rounded-xl p-5 flex items-center gap-4 transition group">
        <div class="w-10 h-10 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center text-lg group-hover:bg-amber-500 group-hover:text-stone-900 transition">
            <i class="fa-solid fa-user-plus"></i>
        </div>
        <div>
            <p class="font-semibold text-stone-800 text-sm">Tambah Member</p>
            <p class="text-xs text-stone-400">Daftarkan anggota baru</p>
        </div>
    </a>
    <a href="/menus/create" class="bg-white border border-stone-200 hover:border-amber-400 hover:shadow-md rounded-xl p-5 flex items-center gap-4 transition group">
        <div class="w-10 h-10 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center text-lg group-hover:bg-amber-500 group-hover:text-stone-900 transition">
            <i class="fa-solid fa-circle-plus"></i>
        </div>
        <div>
            <p class="font-semibold text-stone-800 text-sm">Tambah Menu</p>
            <p class="text-xs text-stone-400">Input produk baru</p>
        </div>
    </a>
    <a href="/" target="_blank" class="bg-white border border-stone-200 hover:border-amber-400 hover:shadow-md rounded-xl p-5 flex items-center gap-4 transition group">
        <div class="w-10 h-10 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center text-lg group-hover:bg-amber-500 group-hover:text-stone-900 transition">
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
        </div>
        <div>
            <p class="font-semibold text-stone-800 text-sm">Lihat Landing Page</p>
            <p class="text-xs text-stone-400">Tampilan publik website</p>
        </div>
    </a>
</div>

@endsection
