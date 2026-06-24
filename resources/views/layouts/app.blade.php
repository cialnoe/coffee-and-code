<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Coffee Code</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-stone-100 font-sans flex h-screen overflow-hidden">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-stone-900 text-white flex flex-col justify-between flex-shrink-0">
        <div>
            <div class="p-5 bg-stone-950 flex items-center gap-3 border-b border-stone-800">
                <i class="fa-solid fa-mug-hot text-amber-400 text-xl"></i>
                <span class="text-base font-bold tracking-widest text-white">COFFEE CODE</span>
            </div>

            <nav class="mt-4 px-3 space-y-1">
                <a href="/admin/dashboard"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                   {{ request()->is('admin/dashboard') ? 'bg-amber-500 text-stone-900' : 'text-stone-400 hover:bg-stone-800 hover:text-white' }}">
                    <i class="fa-solid fa-chart-pie w-4 text-center"></i> Dashboard
                </a>
                <a href="/members"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                   {{ request()->is('members*') ? 'bg-amber-500 text-stone-900' : 'text-stone-400 hover:bg-stone-800 hover:text-white' }}">
                    <i class="fa-solid fa-users w-4 text-center"></i> Data Members
                </a>
                <a href="/reservations"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                   {{ request()->is('reservations*') ? 'bg-amber-500 text-stone-900' : 'text-stone-400 hover:bg-stone-800 hover:text-white' }}">
                    <i class="fa-solid fa-calendar-check w-4 text-center"></i> Reservasi
                </a>
                <a href="/menus"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                   {{ request()->is('menus*') ? 'bg-amber-500 text-stone-900' : 'text-stone-400 hover:bg-stone-800 hover:text-white' }}">
                    <i class="fa-solid fa-layer-group w-4 text-center"></i> Menu Produk
                </a>
            </nav>
        </div>

        <div class="p-3 border-t border-stone-800 space-y-1">
            <a href="/" class="flex items-center gap-3 px-4 py-2.5 text-stone-400 hover:bg-stone-800 hover:text-white rounded-lg text-sm transition">
                <i class="fa-solid fa-house w-4 text-center"></i> Landing Page
            </a>
            <a href="/" class="flex items-center gap-3 px-4 py-2.5 text-red-400 hover:bg-stone-800 rounded-lg text-sm transition">
                <i class="fa-solid fa-right-from-bracket w-4 text-center"></i> Keluar Aplikasi
            </a>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 flex flex-col overflow-hidden">
        <header class="bg-white shadow-sm px-8 py-4 flex justify-between items-center flex-shrink-0">
            <div>
                <h1 class="text-lg font-bold text-stone-800">@yield('page-title', 'Dashboard')</h1>
                <p class="text-xs text-stone-400 mt-0.5">@yield('page-subtitle', 'Kelola data Coffee Code')</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-sm text-stone-500 hidden md:block">Halo, <strong class="text-stone-700">Admin Coffee</strong></span>
                <img class="h-9 w-9 rounded-full border-2 border-amber-400"
                     src="https://ui-avatars.com/api/?name=Admin+Coffee&background=f59e0b&color=1c1917" alt="Avatar">
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            @if(session('success'))
                <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-3 rounded-xl flex items-center gap-3 text-sm font-medium">
                    <i class="fa-solid fa-circle-check text-emerald-500 text-base"></i>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-5 py-3 rounded-xl flex items-center gap-3 text-sm font-medium">
                    <i class="fa-solid fa-circle-exclamation text-red-500 text-base"></i>
                    {{ session('error') }}
                </div>
            @endif
            @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-5 py-3 rounded-xl text-sm">
                    <div class="flex items-center gap-2 font-semibold mb-2">
                        <i class="fa-solid fa-triangle-exclamation text-red-500"></i> Terdapat kesalahan:
                    </div>
                    <ul class="list-disc list-inside space-y-0.5 ml-5">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </main>
</body>
</html>
