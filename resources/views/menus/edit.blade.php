<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Menu - Coffee & Code</title>
</head>
<body>
    <h2>Edit Menu</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menus.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama_menu">Nama Menu:</label><br>
        <input type="text" id="nama_menu" name="nama_menu" value="{{ $menu->nama_menu }}" required><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi">{{ $menu->deskripsi }}</textarea><br><br>

        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga" step="0.01" value="{{ $menu->harga }}" required><br><br>

        <label for="jenis">Jenis:</label><br>
        <select id="jenis" name="jenis" required>
            <option value="makanan" {{ $menu->jenis == 'makanan' ? 'selected' : '' }}>Makanan</option>
            <option value="minuman" {{ $menu->jenis == 'minuman' ? 'selected' : '' }}>Minuman</option>
        </select><br><br>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('menus.index') }}">Batal</a>
    </form>
</body>
</html>