@extends('layouts.app')

@section('title', 'Tambah Member')
@section('page-title', 'Tambah Member Baru')
@section('page-subtitle', 'Daftarkan anggota loyalitas baru')

@section('content')
<div class="max-w-xl">
    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-stone-200 bg-stone-50">
            <h2 class="font-bold text-stone-800 flex items-center gap-2">
                <i class="fa-solid fa-user-plus text-amber-500"></i> Formulir Registrasi Member
            </h2>
        </div>
        <form action="{{ route('members.store') }}" method="POST" class="p-6 space-y-5">
            @csrf
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
                <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}"
                       class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-stone-800 placeholder-stone-400 focus:outline-none focus:border-amber-400 focus:bg-white transition text-sm"
                       placeholder="Contoh: 081234567890" required>
                <p class="text-xs text-stone-400 mt-1">Nomor telepon harus unik (tidak boleh ganda).</p>
            </div>
            <p class="text-xs text-stone-400 border border-stone-200 bg-stone-50 rounded-xl px-4 py-3">
                <i class="fa-solid fa-circle-info text-amber-500 mr-1"></i>
                Member baru akan otomatis mendapatkan tier <strong>Junior</strong> dengan <strong>0 poin</strong>. Tier dan poin dapat diubah melalui menu edit.
            </p>
            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-stone-900 font-bold px-6 py-2.5 rounded-xl text-sm transition shadow-sm flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Member
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
