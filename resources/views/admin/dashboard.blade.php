<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Coffee Code</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-stone-100 font-sans flex h-screen overflow-hidden">

    <aside class="w-64 bg-stone-900 text-white flex flex-col justify-between hidden md:flex">
        <div>
            <div class="p-5 bg-stone-950 flex items-center space-x-3">
                <i class="fa-solid fa-mug-hot text-amber-400 text-2xl"></i>
                <span class="text-lg font-bold tracking-wider">COFFEE CODE</span>
            </div>
            
            <nav class="mt-6 px-4 space-y-2">
                <a href="#" class="flex items-center space-x-3 px-4 py-3 bg-amber-500 text-stone-900 rounded-lg font-semibold transition">
                    <i class="fa-solid fa-chart-pie w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-3 text-stone-400 hover:bg-stone-800 hover:text-white rounded-lg transition">
                    <i class="fa-solid fa-users w-5"></i>
                    <span>Data Members</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-3 text-stone-400 hover:bg-stone-800 hover:text-white rounded-lg transition">
                    <i class="fa-solid fa-calendar-check w-5"></i>
                    <span>Reservasi</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-4 py-3 text-stone-400 hover:bg-stone-800 hover:text-white rounded-lg transition">
                    <i class="fa-solid fa-layer-group w-5"></i>
                    <span>Menu Produk</span>
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-stone-800">
            <a href="/" class="flex items-center space-x-3 px-4 py-3 text-red-400 hover:bg-stone-800 rounded-lg transition">
                <i class="fa-solid fa-right-from-bracket w-5"></i>
                <span>Keluar Aplikasi</span>
            </a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-y-auto">
        <header class="bg-white shadow-sm px-8 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-stone-800">Ringkasan Data</h1>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-stone-600 font-medium">Halo, Admin Coffee</span>
                <img class="h-8 w-8 rounded-full border" src="https://ui-avatars.com/api/?name=Admin+Coffee&background=f59e0b&color=fff" alt="Avatar">
            </div>
        </header>

        <div class="p-8 max-w-7xl w-full mx-auto space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-stone-200 flex items-center justify-between">
                    <div>
                        <p class="text-stone-500 text-sm font-medium">Total Anggota</p>
                        <h3 class="text-3xl font-bold mt-1 text-stone-800">124</h3>
                    </div>
                    <div class="p-3 bg-amber-100 rounded-lg text-amber-600"><i class="fa-solid fa-users text-xl"></i></div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-stone-200 flex items-center justify-between">
                    <div>
                        <p class="text-stone-500 text-sm font-medium">Reservasi Hari Ini</p>
                        <h3 class="text-3xl font-bold mt-1 text-stone-800">12</h3>
                    </div>
                    <div class="p-3 bg-emerald-100 rounded-lg text-emerald-600"><i class="fa-solid fa-calendar-day text-xl"></i></div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-stone-200 flex items-center justify-between">
                    <div>
                        <p class="text-stone-500 text-sm font-medium">Total Pendapatan</p>
                        <h3 class="text-3xl font-bold mt-1 text-stone-800">Rp 4.2M</h3>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-lg text-blue-600"><i class="fa-solid fa-wallet text-xl"></i></div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-stone-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-stone-200 flex justify-between items-center">
                    <h2 class="font-bold text-stone-800">Daftar Reservasi Terbaru</h2>
                    <button class="bg-stone-900 text-white px-4 py-2 rounded-lg text-xs font-semibold hover:bg-stone-800 transition">Lihat Semua</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-stone-50 text-stone-500 text-xs uppercase font-semibold border-b border-stone-200">
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Tanggal & Jam</th>
                                <th class="px-6 py-3">Jumlah Orang</th>
                                <th class="px-6 py-3">Status</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-stone-700 divide-y divide-stone-100">
                            <tr>
                                <td class="px-6 py-4 font-medium text-stone-900">Rian Adi</td>
                                <td class="px-6 py-4">24 Juni 2026 - 15:00 WIB</td>
                                <td class="px-6 py-4">3 Orang</td>
                                <td class="px-6 py-4"><span class="px-2 py-1 bg-amber-100 text-amber-700 text-xs font-semibold rounded-full">Pending</span></td>
                                <td class="px-6 py-4 text-center space-x-2">
                                    <button class="text-emerald-600 hover:text-emerald-800"><i class="fa-solid fa-circle-check"></i></button>
                                    <button class="text-red-600 hover:text-red-800"><i class="fa-solid fa-circle-xmark"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-medium text-stone-900">Siti Rahma</td>
                                <td class="px-6 py-4">24 Juni 2026 - 19:30 WIB</td>
                                <td class="px-6 py-4">2 Orang</td>
                                <td class="px-6 py-4"><span class="px-2 py-1 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full">Disetujui</span></td>
                                <td class="px-6 py-4 text-center space-x-2">
                                    <button class="text-stone-400 cursor-not-allowed" disabled><i class="fa-solid fa-circle-check"></i></button>
                                    <button class="text-red-600 hover:text-red-800"><i class="fa-solid fa-circle-xmark"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

</body>
</html>