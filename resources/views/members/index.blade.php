@extends('layouts.app')

@section('title', 'Data Members')
@section('page-title', 'Data Members')
@section('page-subtitle', 'Kelola anggota loyalitas Coffee Code')

@section('content')

<div class="flex flex-wrap items-center justify-between gap-3 mb-6">
    <div class="flex items-center gap-3">
        <div class="bg-amber-100 text-amber-700 text-xs font-semibold px-3 py-1.5 rounded-full">
            <i class="fa-solid fa-users mr-1"></i> {{ $members->count() }} Member
        </div>
    </div>
    <a href="{{ route('members.create') }}"
       class="bg-amber-500 hover:bg-amber-600 text-stone-900 font-bold px-5 py-2.5 rounded-xl text-sm transition shadow-sm flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> Tambah Member
    </a>
</div>

<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="bg-stone-50 border-b border-stone-200 text-stone-500 text-xs uppercase font-semibold">
                    <th class="px-6 py-3 w-12">#</th>
                    <th class="px-6 py-3">Nama Lengkap</th>
                    <th class="px-6 py-3">Nomor Telepon</th>
                    <th class="px-6 py-3">Tier Level</th>
                    <th class="px-6 py-3 text-center">Total Poin</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100 text-stone-700">
                @forelse($members as $member)
                <tr class="hover:bg-stone-50 transition">
                    <td class="px-6 py-4 text-stone-400 text-xs font-mono">{{ $member->id }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($member->nama_lengkap) }}&background=f59e0b&color=1c1917&size=36"
                                 class="w-9 h-9 rounded-full flex-shrink-0" alt="">
                            <span class="font-semibold text-stone-900">{{ $member->nama_lengkap }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-stone-600 font-mono text-xs">{{ $member->nomor_telepon }}</td>
                    <td class="px-6 py-4">
                        @if($member->tier_level === 'Senior Coder')
                            <span class="bg-amber-100 text-amber-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                <i class="fa-solid fa-crown mr-1"></i>Senior Coder
                            </span>
                        @elseif($member->tier_level === 'Mid-Level')
                            <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                <i class="fa-solid fa-code mr-1"></i>Mid-Level
                            </span>
                        @else
                            <span class="bg-stone-100 text-stone-600 text-xs font-semibold px-2.5 py-1 rounded-full">
                                <i class="fa-solid fa-seedling mr-1"></i>Junior
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="font-bold text-stone-800">{{ number_format($member->total_poin) }}</span>
                        <span class="text-stone-400 text-xs ml-0.5">poin</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('members.edit', $member->id) }}"
                               class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition text-xs"
                               title="Edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form action="{{ route('members.destroy', $member->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus member {{ $member->nama_lengkap }}?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition text-xs"
                                        title="Hapus">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-16 text-center text-stone-400">
                        <i class="fa-solid fa-users-slash text-4xl block mb-3 text-stone-300"></i>
                        <p class="font-medium">Belum ada member terdaftar.</p>
                        <a href="{{ route('members.create') }}" class="mt-3 inline-block text-xs text-amber-600 hover:underline font-medium">
                            + Tambah Member Pertama
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
