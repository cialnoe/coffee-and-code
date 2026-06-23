<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Menu - Coffee & Code</title>
</head>
<body>
    <h2>Tambah Menu Baru</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        <label for="nama_menu">Nama Menu:</label><br>
        <input type="text" id="nama_menu" name="nama_menu" required><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi"></textarea><br><br>

        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga" step="0.01" required><br><br>

        <label for="jenis">Jenis:</label><br>
        <select id="jenis" name="jenis" required>
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>
        </select><br><br>

        <button type="submit">Simpan Menu</button>
        <a href="{{ route('menus.index') }}">Batal</a>
    </form>
</body>
</html>