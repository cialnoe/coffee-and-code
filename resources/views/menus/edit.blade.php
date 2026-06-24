@extends('layouts.app')

@section('title', 'Edit Menu')
@section('page-title', 'Edit Menu')
@section('page-subtitle', 'Perbarui informasi produk menu')

@section('content')
<div class="max-w-xl">
    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-stone-200 bg-stone-50 flex items-center gap-2">
            <i class="fa-solid fa-pen-to-square text-amber-500"></i>
            <h2 class="font-bold text-stone-800">Edit: {{ $menu->nama_menu }}</h2>
        </div>
        <form action="{{ route('menus.update', $menu->id) }}" method="POST" class="p-6 space-y-5">
            @csrf @method('PUT')
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-2">
                    Nama Menu <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}"
                       class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-stone-800 focus:outline-none focus:border-amber-400 focus:bg-white transition text-sm"
                       required>
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                          class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-stone-800 focus:outline-none focus:border-amber-400 focus:bg-white transition text-sm resize-none">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-2">
                        Harga (Rp) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="harga" value="{{ old('harga', $menu->harga) }}"
                           min="0" step="500"
                           class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-stone-800 focus:outline-none focus:border-amber-400 focus:bg-white transition text-sm"
                           required>
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-2">
                        Jenis <span class="text-red-500">*</span>
                    </label>
                    <select name="jenis"
                            class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-stone-800 focus:outline-none focus:border-amber-400 focus:bg-white transition text-sm" required>
                        <option value="minuman" {{ (old('jenis', $menu->jenis) === 'minuman') ? 'selected' : '' }}>☕ Minuman</option>
                        <option value="makanan" {{ (old('jenis', $menu->jenis) === 'makanan') ? 'selected' : '' }}>🍞 Makanan</option>
                    </select>
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-stone-900 font-bold px-6 py-2.5 rounded-xl text-sm transition shadow-sm flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
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
