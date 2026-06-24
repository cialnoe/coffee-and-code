<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Menu - Coffee & Code</title>
</head>
<body>
    <h2>Daftar Menu</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('menus.create') }}">
        <button style="margin-bottom: 15px;">+ Tambah Menu Baru</button>
    </a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Menu</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->id }}</td>
                <td>{{ $menu->nama_menu }}</td>
                <td>{{ $menu->deskripsi }}</td>
                <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                <td>{{ ucfirst($menu->jenis) }}</td>
                <td>
                    <a href="{{ route('menus.edit', $menu->id) }}">
                        <button>Edit</button>
                    </a>

                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red;">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>