<?php

namespace Database\Seeders;

use App\Models\ManageEkstrakulikulerModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        // 1. DATA ADMIN
        User::create([
            'fullName' => 'Admin Utama NelitaSync',
            'id_identity' => 'ADMIN001',
            'class' => null,
            'email' => 'admin@itcnelita.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
            'status' => 'aktif',
        ]);

        ManageEkstrakulikulerModel::create(
            [
                'name'      => 'IT Community',
                'category'  => 'Teknologi & Sains',
                'pembina'   => 'Pak Efendy',
                'day'       => 'Minggu',
                'time'      => '10:00 - 14:00',
                'location'  => 'Lab Komputer 2',
                'is_active' => 1,
            ]
        );
        ManageEkstrakulikulerModel::create(
            [
                'name'      => 'Broadcast',
                'category'  => 'Teknologi & Sains',
                'pembina'   => 'Pak Ibnu Hibban',
                'day'       => 'Sabtu',
                'time'      => '10:00 - 14:00',
                'location'  => 'Perpustakaan',
                'is_active' => 1,
            ],
        );

        // 2. DATA GURU (10 Orang)
        $namaGuru = [
            'Pak Budi Pratama',
            'Bu Siti Aminah',
            'Pak Ahmad Fauzi',
            'Bu Rina Wijaya',
            'Pak Bambang Hermawan',
            'Bu Dewi Lestari',
            'Pak Eko Prasetyo',
            'Bu Maya Indah',
            'Pak Hendra Gunawan',
            'Bu Sari Rahayu'
        ];

        foreach ($namaGuru as $index => $nama) {
            User::create([
                'fullName' => $nama,
                'id_identity' => '19850312' . str_pad($index + 1, 4, '0', STR_PAD_LEFT),
                'class' => null,
                'email' => strtolower(str_replace(' ', '', $nama)) . '@guru.id',
                'password' => Hash::make('password123'),
                'role' => 'guru',
                'status' => 'aktif',
            ]);
        }

        // 3. DATA SISWA (20 Orang)
        $namaSiswa = [
            'Rizky Syahputra',
            'Siti Maryam',
            'Andi Wijaya',
            'Bagas Saputra',
            'Citra Kirana',
            'Dendi Rahman',
            'Eka Putri',
            'Fajar Sidik',
            'Gita Gutawa',
            'Hadi Sucipto',
            'Indah Permata',
            'Jaka Tarub',
            'Kiki Amelia',
            'Lutfi Hakim',
            'Maulana Malik',
            'Nadia Safira',
            'Oki Setiana',
            'Putra Perkasa',
            'Qori Antika',
            'Ratih Purwasih'
        ];

        $kelas = ['X RPL 1', 'XI RPL 2', 'XII RPL 1', 'X TKJ 1', 'XI TKJ 2'];

        foreach ($namaSiswa as $index => $nama) {
            User::create([
                'fullName' => $nama,
                'id_identity' => null,
                'class' => $kelas[array_rand($kelas)], // Random kelas dari array
                'email' => strtolower(str_replace(' ', '', $nama)) . '@siswa.id',
                'password' => Hash::make('password123'),
                'role' => 'siswa',
                'status' => ($index % 5 == 0) ? 'non-aktif' : 'aktif', // Variasi status
            ]);
        }
    }
}
