<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Coffee & Code</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex h-screen">

    <aside class="w-64 bg-stone-900 text-white flex flex-col">
        <div class="p-6 text-center border-b border-stone-700">
            <h2 class="text-2xl font-bold text-amber-500">Admin<span class="text-white">Panel</span></h2>
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="/dashboard" class="block py-2 px-4 rounded bg-stone-800 text-amber-500">🏠 Dashboard</a>
            
            <a href="/menus" class="block py-2 px-4 rounded hover:bg-stone-700 transition">☕ Kelola Menu Kopi</a>
            
            <a href="/reservations" class="block py-2 px-4 rounded hover:bg-stone-700 transition">💻 Kelola Reservasi</a>
        </nav>
        <div class="p-4 border-t border-stone-700">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded transition">Logout</button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-hidden">
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">Selamat Datang, Admin</h1>
        </header>
        
        <div class="p-6 overflow-y-auto flex-1">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <p class="text-gray-600">Silakan pilih menu di sidebar untuk mengelola sistem Loyalitas, Menu, dan Reservasi Coworking.</p>
            </div>
        </div>
    </main>

</body>
</html>