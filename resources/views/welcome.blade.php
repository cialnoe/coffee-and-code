<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Code - Tempat Ngopi & Nugas Terbaik</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-stone-50 text-stone-800 font-sans scroll-smooth">

    @if(session('success'))
    <div id="toast" class="fixed top-6 left-1/2 -translate-x-1/2 z-[100] bg-emerald-600 text-white px-6 py-3 rounded-xl shadow-xl flex items-center gap-3 text-sm font-semibold transition-all">
        <i class="fa-solid fa-circle-check text-lg"></i>
        {{ session('success') }}
        <button onclick="document.getElementById('toast').remove()" class="ml-2 text-white/70 hover:text-white"><i class="fa-solid fa-xmark"></i></button>
    </div>
    @endif
    @if(session('error'))
    <div id="toast" class="fixed top-6 left-1/2 -translate-x-1/2 z-[100] bg-red-600 text-white px-6 py-3 rounded-xl shadow-xl flex items-center gap-3 text-sm font-semibold">
        <i class="fa-solid fa-circle-exclamation text-lg"></i>
        {{ session('error') }}
    </div>
    @endif

    <nav class="bg-stone-900/95 backdrop-blur-md text-white sticky top-0 z-50 shadow-lg">
        <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="#" class="text-xl font-bold tracking-wider text-amber-400 flex items-center gap-2">
                <i class="fa-solid fa-code text-amber-500"></i>COFFEE CODE
            </a>
            <div class="hidden md:flex space-x-6 items-center">
                <a href="#home" class="hover:text-amber-400 transition text-sm">Home</a>
                <a href="#features" class="hover:text-amber-400 transition text-sm">Fasilitas</a>
                <a href="#menu" class="hover:text-amber-400 transition text-sm">Menu</a>
                <a href="#testimonials" class="hover:text-amber-400 transition text-sm">Ulasan</a>
                <a href="#reservation" class="hover:text-amber-400 transition text-sm">Reservasi</a>
                <a href="/admin/dashboard" class="bg-amber-500 text-stone-900 px-4 py-2 rounded-lg font-semibold hover:bg-amber-400 transition shadow-md text-sm">
                    <i class="fa-solid fa-gauge-high mr-1"></i>Dashboard
                </a>
            </div>
            <button class="md:hidden text-white" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-stone-800 px-4 pb-4 space-y-2">
            <a href="#home" class="block py-2 text-stone-300 hover:text-amber-400 text-sm">Home</a>
            <a href="#features" class="block py-2 text-stone-300 hover:text-amber-400 text-sm">Fasilitas</a>
            <a href="#menu" class="block py-2 text-stone-300 hover:text-amber-400 text-sm">Menu</a>
            <a href="#reservation" class="block py-2 text-stone-300 hover:text-amber-400 text-sm">Reservasi</a>
            <a href="/admin/dashboard" class="block bg-amber-500 text-stone-900 px-4 py-2 rounded-lg font-semibold text-sm text-center">Dashboard Admin</a>
        </div>
    </nav>

    <header id="home" class="bg-cover bg-center h-[90vh] flex items-center justify-center relative"
        style="background-image: linear-gradient(rgba(28,25,23,0.75), rgba(28,25,23,0.75)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1470&auto=format&fit=crop');">
        <div class="text-center text-white px-4 max-w-3xl">
            <span class="bg-amber-500/20 text-amber-400 border border-amber-500/30 text-xs uppercase tracking-widest font-bold px-3 py-1 rounded-full">
                Sip Coffee, Fix Bugs
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold mt-4 mb-6 leading-tight">
                Nikmati Kopi Terbaik, Selesaikan <span class="text-amber-400">Codingan-mu</span>
            </h1>
            <p class="text-base md:text-lg mb-8 text-stone-300">
                Workspace ramah developer & mahasiswa dengan koneksi internet super cepat, colokan melimpah, dan racikan kopi murni penjaga fokus.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#reservation" class="bg-amber-500 hover:bg-amber-600 text-stone-900 font-bold px-8 py-3 rounded-xl shadow-lg transition-all transform hover:scale-105">
                    <i class="fa-solid fa-calendar-plus mr-2"></i>Booking Tempat
                </a>
                <a href="#menu" class="bg-transparent hover:bg-white/10 border border-white/30 text-white font-semibold px-8 py-3 rounded-xl transition">
                    <i class="fa-solid fa-mug-hot mr-2"></i>Lihat Menu
                </a>
            </div>
        </div>
    </header>

    <section class="bg-stone-900 text-white py-10 border-t border-stone-800">
        <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div>
                <h3 class="text-3xl font-bold text-amber-400">10k+</h3>
                <p class="text-stone-400 text-sm mt-1">Lines of Code Fixed</p>
            </div>
            <div>
                <h3 class="text-3xl font-bold text-amber-400">5k+</h3>
                <p class="text-stone-400 text-sm mt-1">Cups of Coffee Served</p>
            </div>
            <div>
                <h3 class="text-3xl font-bold text-amber-400">4.9</h3>
                <p class="text-stone-400 text-sm mt-1">Google Rating ★★★★★</p>
            </div>
            <div>
                <h3 class="text-3xl font-bold text-amber-400">500+</h3>
                <p class="text-stone-400 text-sm mt-1">Active Members</p>
            </div>
        </div>
    </section>

    <section id="features" class="py-20 max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <span class="text-amber-600 text-xs font-bold uppercase tracking-wider">Kenapa Kami?</span>
            <h2 class="text-3xl font-bold text-stone-900 mt-2">Kenapa Harus di Coffee Code?</h2>
            <p class="text-stone-600 mt-2">Fasilitas terbaik yang didesain khusus buat produktivitas maksimal.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-200/60 hover:shadow-md transition">
                <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center mb-6 text-xl">
                    <i class="fa-solid fa-wifi"></i>
                </div>
                <h3 class="font-bold text-xl mb-3">Giga-Speed Wi-Fi</h3>
                <p class="text-stone-600 text-sm leading-relaxed">Gak ada lagi drama koneksi putus pas nge-push ke GitHub atau nyari referensi di StackOverflow.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-200/60 hover:shadow-md transition">
                <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center mb-6 text-xl">
                    <i class="fa-solid fa-plug"></i>
                </div>
                <h3 class="font-bold text-xl mb-3">Colokan di Setiap Meja</h3>
                <p class="text-stone-600 text-sm leading-relaxed">Bebas panik baterai lowbat. Setiap sudut meja dilengkapi stopkontak standar internasional.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-200/60 hover:shadow-md transition">
                <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center mb-6 text-xl">
                    <i class="fa-solid fa-moon"></i>
                </div>
                <h3 class="font-bold text-xl mb-3">Suasana Tenang (Quiet Zone)</h3>
                <p class="text-stone-600 text-sm leading-relaxed">Tata ruang semi-coworking yang kondusif, pas banget buat deep-work atau ngerjain tugas kelompok.</p>
            </div>
        </div>
    </section>

    <section id="menu" class="py-20 bg-stone-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-amber-600 text-xs font-bold uppercase tracking-wider">Pilihan Minuman</span>
                <h2 class="text-3xl font-bold text-stone-900 mt-2">Varian Menu Booster</h2>
                <p class="text-stone-600 mt-2">Bahan bakar utama untuk menangkal ngantuk dan error.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-stone-200/60 group">
                    <div class="overflow-hidden h-52 relative">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                             src="https://images.unsplash.com/photo-1541167760496-1628856ab772?q=80&w=500" alt="Espresso">
                        <span class="absolute top-4 right-4 bg-stone-900/80 text-amber-400 text-xs font-bold px-2.5 py-1 rounded-full backdrop-blur-sm">Bestseller</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-1">Espresso Robust-Java</h3>
                        <div class="flex items-center text-amber-500 gap-1 mb-3 text-sm">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <span class="text-stone-500 text-xs ml-1">(48 ulasan)</span>
                        </div>
                        <p class="text-stone-600 text-sm mb-4">Ekstrak kopi murni pilihan untuk mendongkrak fokus debugging kode rumitmu.</p>
                        <div class="flex justify-between items-center border-t border-stone-100 pt-4">
                            <span class="text-amber-700 font-extrabold text-lg">Rp 22.000</span>
                            <a href="#reservation" class="text-xs bg-stone-900 text-white font-medium px-3 py-2 rounded-md hover:bg-amber-500 hover:text-stone-900 transition">Pesan</a>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-stone-200/60 group">
                    <div class="overflow-hidden h-52">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                             src="https://images.unsplash.com/photo-1497935586351-b67a49e012bf?q=80&w=500&auto=format&fit=crop" alt="Vanilla Latte Art">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-1">Vanilla Latte Art</h3>
                        <div class="flex items-center text-amber-500 gap-1 mb-3 text-sm">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                            <span class="text-stone-500 text-xs ml-1">(35 ulasan)</span>
                        </div>
                        <p class="text-stone-600 text-sm mb-4">Kombinasi espresso lembut dengan susu segar dan aroma vanilla yang menenangkan.</p>
                        <div class="flex justify-between items-center border-t border-stone-100 pt-4">
                            <span class="text-amber-700 font-extrabold text-lg">Rp 28.000</span>
                            <a href="#reservation" class="text-xs bg-stone-900 text-white font-medium px-3 py-2 rounded-md hover:bg-amber-500 hover:text-stone-900 transition">Pesan</a>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-stone-200/60 group">
                    <div class="overflow-hidden h-52">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                             src="https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?q=80&w=500" alt="Matcha">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-1">Matcha Green Tea</h3>
                        <div class="flex items-center text-amber-500 gap-1 mb-3 text-sm">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
                            <span class="text-stone-500 text-xs ml-1">(22 ulasan)</span>
                        </div>
                        <p class="text-stone-600 text-sm mb-4">Grounded pure green tea yang cocok untuk kamu yang ingin rileks tanpa kafein tinggi.</p>
                        <div class="flex justify-between items-center border-t border-stone-100 pt-4">
                            <span class="text-amber-700 font-extrabold text-lg">Rp 26.000</span>
                            <a href="#reservation" class="text-xs bg-stone-900 text-white font-medium px-3 py-2 rounded-md hover:bg-amber-500 hover:text-stone-900 transition">Pesan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-12">
                <a href="/menus" class="inline-flex items-center gap-2 border border-stone-400 text-stone-700 hover:bg-stone-900 hover:text-white font-semibold px-6 py-2.5 rounded-xl transition text-sm">
                    <i class="fa-solid fa-list"></i> Lihat Semua Menu
                </a>
            </div>
        </div>
    </section>

    <section id="testimonials" class="py-20 max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <span class="text-amber-600 text-sm font-bold uppercase tracking-wider">Kata Mereka</span>
            <h2 class="text-3xl font-bold text-stone-900 mt-1">Ulasan Pengunjung Setia</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-2xl shadow-xs border border-stone-200/60 flex flex-col justify-between">
                <div>
                    <div class="flex text-amber-400 gap-1 mb-4">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-stone-600 text-sm italic mb-6">"Tempat paling oke buat nugas kelar kuliahan. Wi-Fi nya kenceng parah, pas kemarin ngerjain project database gaada putus-putusnya. Kopinya juga mantap!"</p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-stone-100">
                    <img class="w-10 h-10 rounded-full border" src="https://ui-avatars.com/api/?name=Rian+Adi&background=7c2d12&color=fff" alt="">
                    <div>
                        <h4 class="font-bold text-sm text-stone-900">Rian Adi</h4>
                        <span class="text-xs text-stone-400">Mahasiswa Informatika</span>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-xs border border-stone-200/60 flex flex-col justify-between">
                <div>
                    <div class="flex text-amber-400 gap-1 mb-4">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-stone-600 text-sm italic mb-6">"Penyelamat pas dikejar deadline rilis aplikasi! Quiet zone nya beneran sunyi, ditambah Espresso Robust-nya juara banget bikin mata melek seharian."</p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-stone-100">
                    <img class="w-10 h-10 rounded-full border" src="https://ui-avatars.com/api/?name=Siti+R&background=b45309&color=fff" alt="">
                    <div>
                        <h4 class="font-bold text-sm text-stone-900">Siti Rahma</h4>
                        <span class="text-xs text-stone-400">Frontend Developer</span>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-xs border border-stone-200/60 flex flex-col justify-between">
                <div>
                    <div class="flex text-amber-400 gap-1 mb-4">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p class="text-stone-600 text-sm italic mb-6">"Suka banget sama konsepnya yang ramah developer. Setiap ke sini bawaannya produktif terus. Sangat direkomendasikan buat tempat meet up tim ormawa!"</p>
                </div>
                <div class="flex items-center gap-3 pt-4 border-t border-stone-100">
                    <img class="w-10 h-10 rounded-full border" src="https://ui-avatars.com/api/?name=Budi+S&background=1c1917&color=fff" alt="">
                    <div>
                        <h4 class="font-bold text-sm text-stone-900">Budi Setiawan</h4>
                        <span class="text-xs text-stone-400">Aktivis Kampus</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="reservation" class="py-20 bg-stone-900 text-white relative overflow-hidden">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl"></div>

        <div class="max-w-2xl mx-auto px-4 relative z-10">
            <div class="text-center mb-10">
                <span class="bg-amber-500/20 text-amber-400 border border-amber-500/30 text-xs uppercase tracking-widest font-bold px-3 py-1 rounded-full">Reservasi Online</span>
                <h2 class="text-3xl font-bold mt-4 text-white">Booking Meja Co-Working</h2>
                <p class="text-stone-400 mt-3 text-sm max-w-md mx-auto">Amankan spot terbaikmu sekarang. Kami siapkan meja dan kopi tepat waktu.</p>
            </div>

            <form action="{{ route('reservations.store') }}" method="POST"
                  class="bg-stone-800/80 p-8 rounded-2xl shadow-2xl border border-stone-700/60 backdrop-blur-sm">
                @csrf

                @if($errors->any())
                <div class="mb-6 bg-red-900/50 border border-red-700 text-red-300 px-4 py-3 rounded-xl text-sm">
                    <strong>Mohon periksa kembali:</strong>
                    <ul class="list-disc list-inside mt-1">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
                @endif

                <div class="space-y-5">
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider mb-2 text-stone-400">
                            <i class="fa-solid fa-user mr-1"></i> Nama Lengkap
                        </label>
                        <input type="text" name="nama_pengunjung" value="{{ old('nama_pengunjung') }}"
                               class="w-full px-4 py-2.5 bg-stone-700/50 border border-stone-600 rounded-xl text-white placeholder-stone-500 focus:outline-none focus:border-amber-400 transition"
                               placeholder="Contoh: Budi Santoso" required>
                    </div>

                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider mb-2 text-stone-400">
                                <i class="fa-solid fa-table-cells-large mr-1"></i> Nomor Meja
                            </label>
                            <input type="number" name="nomor_meja" value="{{ old('nomor_meja') }}"
                                   min="1" max="20"
                                   class="w-full px-4 py-2.5 bg-stone-700/50 border border-stone-600 rounded-xl text-white placeholder-stone-500 focus:outline-none focus:border-amber-400 transition"
                                   placeholder="Contoh: 5" required>
                            <p class="text-stone-500 text-xs mt-1">Tersedia meja 1–20</p>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider mb-2 text-stone-400">
                                <i class="fa-solid fa-clock mr-1"></i> Durasi (Jam)
                            </label>
                            <input type="number" name="durasi_jam" value="{{ old('durasi_jam') }}"
                                   min="1" max="8"
                                   class="w-full px-4 py-2.5 bg-stone-700/50 border border-stone-600 rounded-xl text-white placeholder-stone-500 focus:outline-none focus:border-amber-400 transition"
                                   placeholder="Contoh: 3" required>
                            <p class="text-stone-500 text-xs mt-1">Maks. 8 jam / sesi</p>
                        </div>
                    </div>
                </div>

                <button type="submit"
                        class="mt-8 w-full bg-amber-500 hover:bg-amber-600 text-stone-900 font-bold py-3 px-4 rounded-xl shadow-lg transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-paper-plane"></i> Kirim Reservasi
                </button>
            </form>
        </div>
    </section>

    <footer class="bg-stone-950 text-stone-600 py-8 text-center text-xs border-t border-stone-900">
        <p class="mb-2">&copy; 2026 Coffee Code. Dibuat dengan penuh kafein dan baris kode.</p>
        <p class="text-stone-700">Informatics Project Framework Collaboration</p>
    </footer>

</body>
</html>