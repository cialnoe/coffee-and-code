<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Member - Coffee & Code</title>
</head>
<body>
    <h2>Edit Data Member</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT') <label>Nama Lengkap:</label><br>
        <input type="text" name="nama_lengkap" value="{{ $member->nama_lengkap }}" required><br><br>

        <label>Nomor Telepon:</label><br>
        <input type="text" name="nomor_telepon" value="{{ $member->nomor_telepon }}" required><br><br>

        <label>Tier Level:</label><br>
        <select name="tier_level">
            <option value="Junior" {{ $member->tier_level == 'Junior' ? 'selected' : '' }}>Junior</option>
            <option value="Mid-Level" {{ $member->tier_level == 'Mid-Level' ? 'selected' : '' }}>Mid-Level</option>
            <option value="Senior Coder" {{ $member->tier_level == 'Senior Coder' ? 'selected' : '' }}>Senior Coder</option>
        </select><br><br>

        <label>Total Poin:</label><br>
        <input type="number" name="total_poin" value="{{ $member->total_poin }}" required><br><br>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('members.index') }}">Batal</a>
    </form>
</body>
</html>