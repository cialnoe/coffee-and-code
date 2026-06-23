<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Coworking Space - Coffee & Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 900px;">
        
        <!-- Notifikasi Sukses/Gagal -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- SISI PENGUNJUNG: Form Booking Meja -->
        <h3 class="mb-4 text-dark font-weight-bold">Form Booking Meja Koding</h3>
        <form action="{{ route('reservations.store') }}" method="POST" class="mb-5">
            @csrf
            <div class="mb-3">
                <label class="form-label font-weight-bold">Nama Pengunjung</label>
                <input type="text" name="nama_pengunjung" class="form-control" required placeholder="Masukkan nama lengkap kamu">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor Meja</label>
                    <input type="number" name="nomor_meja" class="form-control" min="1" required placeholder="Contoh: 5">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Durasi Kerja (Jam)</label>
                    <input type="number" name="durasi_jam" class="form-control" min="1" required placeholder="Contoh: 3">
                </div>
            </div>
            <button type="submit" class="btn btn-primary px-4">Booking Sekarang</button>
        </form>

        <hr class="my-4">

        <!-- SISI ADMIN: Mengubah Status Reservasi -->
        <h3 class="mb-3 text-dark font-weight-bold">Daftar Reservasi Meja (Panel Admin)</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pengunjung</th>
                        <th>No Meja</th>
                        <th>Durasi</th>
                        <th>Status</th>
                        <th style="min-width: 220px;">Aksi Ubah Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if($reservations->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-muted py-3">Belum ada data reservasi saat ini.</td>
                        </tr>
                    @else
                        @foreach($reservations as $res)
                            <tr>
                                <td>{{ $res->id }}</td>
                                <td>{{ $res->nama_pengunjung }}</td>
                                <td><span class="badge bg-secondary">Meja {{ $res->nomor_meja }}</span></td>
                                <td>{{ $res->durasi_jam }} Jam</td>
                                <td>
                                    @if($res->status == 'pending')
                                        <span class="badge bg-warning text-dark">PENDING</span>
                                    @elseif($res->status == 'disetujui')
                                        <span class="badge bg-info text-white">DISETUJUI</span>
                                    @elseif($res->status == 'selesai')
                                        <span class="badge bg-success">SELESAI</span>
                                    @else
                                        <span class="badge bg-danger">DIBATALKAN</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Aksi Setujui -->
                                    <form action="{{ route('reservations.updateStatus', [$res->id, 'disetujui']) }}" method="POST" class="d-inline">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-info text-white py-1">Setuju</button>
                                    </form>
                                    
                                    <!-- Aksi Selesai -->
                                    <form action="{{ route('reservations.updateStatus', [$res->id, 'selesai']) }}" method="POST" class="d-inline">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-success py-1">Selesai</button>
                                    </form>
                                    
                                    <!-- Aksi Batalkan -->
                                    <form action="{{ route('reservations.updateStatus', [$res->id, 'dibatalkan']) }}" method="POST" class="d-inline">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-danger py-1">Batal</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>