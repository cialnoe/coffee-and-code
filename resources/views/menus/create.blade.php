@extends('layouts.app')

@section('title', 'Tambah Menu')
@section('page-title', 'Tambah Menu Baru')
@section('page-subtitle', 'Tambahkan produk makanan atau minuman ke daftar menu')

@section('content')
<div class="max-w-xl">
    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-stone-200 bg-stone-50">
            <h2 class="font-bold text-stone-800 flex items-center gap-2">
                <i class="fa-solid fa-circle-plus text-amber-500"></i> Formulir Menu Baru
            </h2>
        </div>
        <form action="{{ route('menus.store') }}" method="POST" class="p-6 space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-2">
                    Nama Menu <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nama_menu" value="{{ old('nama_menu') }}"
                       class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-stone-800 placeholder-stone-400 focus:outline-none focus:border-amber-400 focus:bg-white transition text-sm"
                       placeholder="Contoh: Espresso Double Shot" required>
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-2">
                    Deskripsi
                </label>
                <textarea name="deskripsi" rows="3"
                          class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-stone-800 placeholder-stone-400 focus:outline-none focus:border-amber-400 focus:bg-white transition text-sm resize-none"
                          placeholder="Deskripsi singkat menu ini...">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-2">
                        Harga (Rp) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="harga" value="{{ old('harga') }}"
                           min="0" step="500"
                           class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-stone-800 placeholder-stone-400 focus:outline-none focus:border-amber-400 focus:bg-white transition text-sm"
                           placeholder="Contoh: 25000" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-2">
                        Jenis <span class="text-red-500">*</span>
                    </label>
                    <select name="jenis"
                            class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-stone-800 focus:outline-none focus:border-amber-400 focus:bg-white transition text-sm" required>
                        <option value="minuman" {{ old('jenis') === 'minuman' ? 'selected' : '' }}>☕ Minuman</option>
                        <option value="makanan" {{ old('jenis') === 'makanan' ? 'selected' : '' }}>🍞 Makanan</option>
                    </select>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-stone-900 font-bold px-6 py-2.5 rounded-xl text-sm transition shadow-sm flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Menu
                </button>
                <a href="{{ route('menus.index') }}"
                   class="bg-stone-100 hover:bg-stone-200 text-stone-700 font-semibold px-6 py-2.5 rounded-xl text-sm transition flex items-center gap-2">
                    <i class="fa-solid fa-arrow-left"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
