@extends('layouts.app')

@section('title', 'Menu Produk')
@section('page-title', 'Menu Produk')
@section('page-subtitle', 'Kelola daftar makanan & minuman Coffee Code')

@section('content')

<div class="flex flex-wrap items-center justify-between gap-3 mb-6">
    <div class="flex items-center gap-3 flex-wrap">
        <span class="bg-amber-100 text-amber-700 text-xs font-semibold px-3 py-1.5 rounded-full">
            <i class="fa-solid fa-mug-hot mr-1"></i> {{ $menus->where('jenis','minuman')->count() }} Minuman
        </span>
        <span class="bg-stone-100 text-stone-700 text-xs font-semibold px-3 py-1.5 rounded-full">
            <i class="fa-solid fa-utensils mr-1"></i> {{ $menus->where('jenis','makanan')->count() }} Makanan
        </span>
    </div>
    <a href="{{ route('menus.create') }}"
       class="bg-amber-500 hover:bg-amber-600 text-stone-900 font-bold px-5 py-2.5 rounded-xl text-sm transition shadow-sm flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> Tambah Menu
    </a>
</div>

<div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="bg-stone-50 border-b border-stone-200 text-stone-500 text-xs uppercase font-semibold">
                    <th class="px-6 py-3 w-12">#</th>
                    <th class="px-6 py-3">Nama Menu</th>
                    <th class="px-6 py-3">Deskripsi</th>
                    <th class="px-6 py-3">Jenis</th>
                    <th class="px-6 py-3 text-right">Harga</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100 text-stone-700">
                @forelse($menus as $menu)
                <tr class="hover:bg-stone-50 transition">
                    <td class="px-6 py-4 text-stone-400 text-xs font-mono">{{ $menu->id }}</td>
                    <td class="px-6 py-4 font-semibold text-stone-900">{{ $menu->nama_menu }}</td>
                    <td class="px-6 py-4 text-stone-500 text-xs max-w-xs truncate">
                        {{ $menu->deskripsi ?? '—' }}
                    </td>
                    <td class="px-6 py-4">
                        @if($menu->jenis === 'minuman')
                            <span class="bg-amber-100 text-amber-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                <i class="fa-solid fa-mug-hot mr-1"></i>Minuman
                            </span>
                        @else
                            <span class="bg-stone-100 text-stone-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                <i class="fa-solid fa-utensils mr-1"></i>Makanan
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right font-bold text-amber-700">
                        Rp {{ number_format($menu->harga, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('menus.edit', $menu->id) }}"
                               class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition text-xs"
                               title="Edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus menu {{ $menu->nama_menu }}?')">
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
                        <i class="fa-solid fa-mug-saucer text-4xl block mb-3 text-stone-300"></i>
                        <p class="font-medium">Belum ada menu yang ditambahkan.</p>
                        <a href="{{ route('menus.create') }}" class="mt-3 inline-block text-xs text-amber-600 hover:underline font-medium">
                            + Tambah Menu Pertama
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
