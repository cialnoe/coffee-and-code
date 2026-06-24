<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee & Code - Welcome</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-stone-50 text-stone-800 antialiased font-sans">
    <nav class="bg-stone-900 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-amber-500">Coffee <span class="text-white">&</span> Code</a>
            <div>
                <a href="#menu" class="hover:text-amber-500 px-3">Menu</a>
                <a href="#reservasi" class="hover:text-amber-500 px-3">Reservasi</a>
                <a href="/login" class="bg-amber-500 text-stone-900 px-4 py-2 rounded font-bold ml-4">Login Admin</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-stone-900 text-center text-stone-400 p-4 mt-12">
        <p>&copy; 2026 Coffee & Code. Built for Programmers.</p>
    </footer>
</body>
</html>