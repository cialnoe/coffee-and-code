@extends('layouts.app')

@section('title', 'Edit Member')
@section('page-title', 'Edit Data Member')
@section('page-subtitle', 'Perbarui informasi anggota & poin loyalitas')

@section('content')
<div class="max-w-xl">
    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-stone-200 bg-stone-50 flex items-center gap-3">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($member->nama_lengkap) }}&background=f59e0b&color=1c1917&size=40"
                 class="w-10 h-10 rounded-full" alt="">
            <div>
                <h2 class="font-bold text-stone-800">{{ $member->nama_lengkap }}</h2>
                <p class="text-xs text-stone-400">ID Member #{{ $member->id }}</p>
            </div>
        </div>
        <form action="{{ route('members.update', $member->id) }}" method="POST" class="p-6 space-y-5">
            @csrf @method('PUT')
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-2">
                    Nomor Telepon <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $member->nomor_telepon) }}"
                       class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-stone-800 focus:outline-none focus:border-amber-400 focus:bg-white transition text-sm"
                       required>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-2">
                        Tier Level <span class="text-red-500">*</span>
                    </label>
                    <select name="tier_level"
                            class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-stone-800 focus:outline-none focus:border-amber-400 focus:bg-white transition text-sm" required>
                        @foreach(['Junior', 'Mid-Level', 'Senior Coder'] as $tier)
                        <option value="{{ $tier }}" {{ (old('tier_level', $member->tier_level) === $tier) ? 'selected' : '' }}>
                            {{ $tier }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-2">
                        Total Poin <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="total_poin" value="{{ old('total_poin', $member->total_poin) }}"
                           min="0"
                           class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-stone-800 focus:outline-none focus:border-amber-400 focus:bg-white transition text-sm"
                           required>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-stone-900 font-bold px-6 py-2.5 rounded-xl text-sm transition shadow-sm flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
                <a href="{{ route('members.index') }}"
                   class="bg-stone-100 hover:bg-stone-200 text-stone-700 font-semibold px-6 py-2.5 rounded-xl text-sm transition flex items-center gap-2">
                    <i class="fa-solid fa-arrow-left"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
