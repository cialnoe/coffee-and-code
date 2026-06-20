<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Member - Coffee & Code</title>
</head>
<body>
    <h2>Daftar Member Coworking Space</h2>
    
@if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('members.create') }}">
        <button style="margin-bottom: 15px;">+ Tambah Member Baru</button>
    </a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Nomor Telepon</th>
                <th>Tier Level</th>
                <th>Total Poin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->nama_lengkap }}</td>
                <td>{{ $member->nomor_telepon }}</td>
                <td>{{ $member->tier_level }}</td>
                <td>{{ $member->total_poin }}</td>
                <td>
                    <a href="{{ route('members.edit', $member->id) }}">
                        <button>Edit</button>
                    </a>

                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus member ini?');">
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