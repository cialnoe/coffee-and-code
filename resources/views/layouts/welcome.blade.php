@extends('layouts.guest')

@section('content')
<div class="bg-stone-800 text-white py-20">
    <div class="container mx-auto text-center px-4">
        <h1 class="text-5xl font-bold mb-4">Kopi Terbaik Untuk Baris Kode Terbaikmu</h1>
        <p class="text-xl text-stone-300 mb-8">Kumpulkan poin, nikmati kopi, dan reservasi meja codingmu sekarang.</p>
        <a href="#reservasi" class="bg-amber-500 hover:bg-amber-600 text-stone-900 font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300">
            Booking Meja Sekarang
        </a>
    </div>
</div>

<div class="container mx-auto py-16 px-4 grid md:grid-cols-2 gap-8">
    <div class="p-6 bg-white rounded-lg shadow border border-stone-200">
        <h2 class="text-2xl font-bold mb-3 text-stone-800">☕ Eksplorasi Menu</h2>
        <p class="text-stone-600">Lihat ketersediaan espresso, latte, hingga camilan pendamping lembur nugas atau coding.</p>
    </div>
    <div class="p-6 bg-white rounded-lg shadow border border-stone-200">
        <h2 class="text-2xl font-bold mb-3 text-stone-800">💻 Reservasi Coworking</h2>
        <p class="text-stone-600">Pilih mejamu, tentukan durasi, dan pastikan tempatmu aman sebelum datang ke kafe.</p>
    </div>
</div>
@endsection