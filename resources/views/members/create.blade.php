<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Member Baru - Coffee & Code</title>
</head>
<body>
    <h2>Registrasi Member Baru</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.store') }}" method="POST">
        @csrf <label for="nama_lengkap">Nama Lengkap:</label><br>
        <input type="text" id="nama_lengkap" name="nama_lengkap" required><br><br>

        <label for="nomor_telepon">Nomor Telepon:</label><br>
        <input type="text" id="nomor_telepon" name="nomor_telepon" required><br><br>

        <button type="submit">Simpan Member</button>
        <a href="{{ route('members.index') }}">Batal</a>
    </form>
</body>
</html>