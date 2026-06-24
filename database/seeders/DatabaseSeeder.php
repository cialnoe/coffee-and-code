<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\Menu;
use App\Models\Reservation;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // =====================
        // SEED MEMBERS
        // =====================
        $members = [
            ['nama_lengkap' => 'Rian Adi Saputra',    'nomor_telepon' => '081234567801', 'tier_level' => 'Senior Coder', 'total_poin' => 1250],
            ['nama_lengkap' => 'Siti Rahma Dewi',      'nomor_telepon' => '081234567802', 'tier_level' => 'Mid-Level',    'total_poin' => 680],
            ['nama_lengkap' => 'Budi Setiawan',         'nomor_telepon' => '081234567803', 'tier_level' => 'Mid-Level',    'total_poin' => 540],
            ['nama_lengkap' => 'Dian Pratiwi',          'nomor_telepon' => '081234567804', 'tier_level' => 'Junior',       'total_poin' => 120],
            ['nama_lengkap' => 'Ahmad Fauzi',           'nomor_telepon' => '081234567805', 'tier_level' => 'Senior Coder', 'total_poin' => 2100],
            ['nama_lengkap' => 'Maya Kurnia',           'nomor_telepon' => '081234567806', 'tier_level' => 'Junior',       'total_poin' => 80],
            ['nama_lengkap' => 'Rizky Firmansyah',      'nomor_telepon' => '081234567807', 'tier_level' => 'Mid-Level',    'total_poin' => 430],
            ['nama_lengkap' => 'Nadia Permatasari',     'nomor_telepon' => '081234567808', 'tier_level' => 'Junior',       'total_poin' => 200],
        ];

        foreach ($members as $member) {
            Member::firstOrCreate(['nomor_telepon' => $member['nomor_telepon']], $member);
        }

        // =====================
        // SEED MENUS
        // =====================
        $menus = [
            ['nama_menu' => 'Espresso Robust-Java',  'deskripsi' => 'Ekstrak kopi murni pilihan untuk mendongkrak fokus debugging.',     'harga' => 22000, 'jenis' => 'minuman'],
            ['nama_menu' => 'Vanilla Latte Art',     'deskripsi' => 'Espresso lembut dengan susu segar dan aroma vanilla.',              'harga' => 28000, 'jenis' => 'minuman'],
            ['nama_menu' => 'Matcha Green Tea',      'deskripsi' => 'Pure green tea untuk rileks tanpa kafein tinggi.',                   'harga' => 26000, 'jenis' => 'minuman'],
            ['nama_menu' => 'Cold Brew Dark Mode',   'deskripsi' => 'Kopi dingin pekat, sempurna untuk sesi coding malam hari.',         'harga' => 32000, 'jenis' => 'minuman'],
            ['nama_menu' => 'Caramel Macchiato',     'deskripsi' => 'Espresso dengan susu berbusa dan drizzle karamel manis.',           'harga' => 30000, 'jenis' => 'minuman'],
            ['nama_menu' => 'Croissant Butter',      'deskripsi' => 'Croissant lembut dengan mentega premium, cocok sebagai snack.',     'harga' => 18000, 'jenis' => 'makanan'],
            ['nama_menu' => 'Roti Bakar Coklat',     'deskripsi' => 'Roti tawar panggang dengan selai coklat krim yang melimpah.',      'harga' => 20000, 'jenis' => 'makanan'],
            ['nama_menu' => 'Nasi Goreng Programmer', 'deskripsi' => 'Nasi goreng spesial penambah stamina, buat yang lembur coding.',  'harga' => 35000, 'jenis' => 'makanan'],
        ];

        foreach ($menus as $menu) {
            Menu::firstOrCreate(['nama_menu' => $menu['nama_menu']], $menu);
        }

        // =====================
        // SEED RESERVATIONS
        // =====================
        $reservations = [
            ['nama_pengunjung' => 'Rian Adi Saputra',  'nomor_meja' => 3,  'durasi_jam' => 4, 'status' => 'selesai'],
            ['nama_pengunjung' => 'Siti Rahma Dewi',    'nomor_meja' => 7,  'durasi_jam' => 3, 'status' => 'disetujui'],
            ['nama_pengunjung' => 'Budi Setiawan',       'nomor_meja' => 12, 'durasi_jam' => 2, 'status' => 'pending'],
            ['nama_pengunjung' => 'Ahmad Fauzi',         'nomor_meja' => 1,  'durasi_jam' => 5, 'status' => 'pending'],
            ['nama_pengunjung' => 'Maya Kurnia',         'nomor_meja' => 9,  'durasi_jam' => 2, 'status' => 'dibatalkan'],
            ['nama_pengunjung' => 'Rizky Firmansyah',    'nomor_meja' => 5,  'durasi_jam' => 3, 'status' => 'disetujui'],
        ];

        foreach ($reservations as $res) {
            Reservation::create($res);
        }
    }
}
