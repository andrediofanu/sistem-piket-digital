<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use App\Models\StatusIzinSiswa;
use App\Models\StatusIzinGuru;
use App\Models\User;
use App\Models\Role;
use App\Models\Kelas;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::create([
            'id' => 1,
            'name' => 'Superadmin',
        ]);
        Role::create([
            'id' => 2,
            'name' => 'Guru',
        ]);
        Role::create([
            'id' => 3,
            'name' => 'Siswa',
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Kelas::create([
        //     'id' => 99,
        //     'name' => 'X-A',
        //     'wali_kelas_id' => 4
        // ]);
        // Kelas::create([
        //     'id' => 1,
        //     'name' => 'XI-J',
        //     'wali_kelas_id' => 3
        // ]);
        $kelasData = [
            ['id' => 1, 'name' => 'X-A', 'wali_kelas_id' => null],
            ['id' => 2, 'name' => 'X-B', 'wali_kelas_id' => null],
            ['id' => 3, 'name' => 'X-C', 'wali_kelas_id' => null],
            ['id' => 4, 'name' => 'X-D', 'wali_kelas_id' => null],
            ['id' => 5, 'name' => 'X-E', 'wali_kelas_id' => null],
            ['id' => 6, 'name' => 'X-F', 'wali_kelas_id' => null],
            ['id' => 7, 'name' => 'X-G', 'wali_kelas_id' => null],
            ['id' => 8, 'name' => 'X-H', 'wali_kelas_id' => null],
            ['id' => 9, 'name' => 'X-I', 'wali_kelas_id' => null],
            ['id' => 10, 'name' => 'X-J', 'wali_kelas_id' => null],
            ['id' => 11, 'name' => 'X-K', 'wali_kelas_id' => null],
            ['id' => 12, 'name' => 'XI-A', 'wali_kelas_id' => null],
            ['id' => 13, 'name' => 'XI-B', 'wali_kelas_id' => null],
            ['id' => 14, 'name' => 'XI-C', 'wali_kelas_id' => null],
            ['id' => 15, 'name' => 'XI-D', 'wali_kelas_id' => null],
            ['id' => 16, 'name' => 'XI-E', 'wali_kelas_id' => null],
            ['id' => 17, 'name' => 'XI-F', 'wali_kelas_id' => null],
            ['id' => 18, 'name' => 'XI-G', 'wali_kelas_id' => null],
            ['id' => 19, 'name' => 'XI-H', 'wali_kelas_id' => null],
            ['id' => 20, 'name' => 'XI-I', 'wali_kelas_id' => null],
            ['id' => 21, 'name' => 'XI-J', 'wali_kelas_id' => null],
            ['id' => 22, 'name' => 'XI-K', 'wali_kelas_id' => null],
            ['id' => 23, 'name' => 'XI-L', 'wali_kelas_id' => null],
            ['id' => 24, 'name' => 'XI-M', 'wali_kelas_id' => null],
            ['id' => 25, 'name' => 'XI-N', 'wali_kelas_id' => null],
            ['id' => 26, 'name' => 'XII-A', 'wali_kelas_id' => null],
            ['id' => 27, 'name' => 'XII-B', 'wali_kelas_id' => null],
            ['id' => 28, 'name' => 'XII-C', 'wali_kelas_id' => null],
            ['id' => 29, 'name' => 'XII-D', 'wali_kelas_id' => null],
            ['id' => 30, 'name' => 'XII-E', 'wali_kelas_id' => null],
            ['id' => 31, 'name' => 'XII-F', 'wali_kelas_id' => null],
            ['id' => 32, 'name' => 'XII-G', 'wali_kelas_id' => null],
            ['id' => 33, 'name' => 'XII-H', 'wali_kelas_id' => null],
            ['id' => 34, 'name' => 'XII-I', 'wali_kelas_id' => null],
            ['id' => 35, 'name' => 'XII-J', 'wali_kelas_id' => null],
            ['id' => 36, 'name' => 'XII-K', 'wali_kelas_id' => null],
        ];
        foreach ($kelasData as $data) {
            Kelas::create([
                'id' => $data['id'],
                'name' => $data['name'],
                'wali_kelas_id' => $data['wali_kelas_id'],
            ]);
        }
        $mapelData = [
            ['id' => 1, 'name' => "Al Qur'an Hadits"],
            ['id' => 2, 'name' => 'Antropologi'],
            ['id' => 3, 'name' => 'Aqidah Akhlak'],
            ['id' => 4, 'name' => 'Bahasa Arab'],
            ['id' => 5, 'name' => 'Bahasa Indonesia'],
            ['id' => 6, 'name' => 'Bahasa Inggris'],
            ['id' => 7, 'name' => 'Bahasa Inggris (TOEFL)'],
            ['id' => 8, 'name' => 'Biologi'],
            ['id' => 9, 'name' => 'BP/BK/Peng. Diri'],
            ['id' => 10, 'name' => 'Ekonomi'],
            ['id' => 11, 'name' => 'Fiqih'],
            ['id' => 12, 'name' => 'Fisika'],
            ['id' => 13, 'name' => 'Geografi'],
            ['id' => 14, 'name' => 'Informatika'],
            ['id' => 15, 'name' => 'Kimia'],
            ['id' => 16, 'name' => 'Matematika'],
            ['id' => 17, 'name' => 'Penjasorkes'],
            ['id' => 18, 'name' => 'PKn/PPKn'],
            ['id' => 19, 'name' => 'PKWU'],
            ['id' => 20, 'name' => 'Sejarah'],
            ['id' => 21, 'name' => 'Sejarah Indonesia'],
            ['id' => 22, 'name' => 'Seni Budaya'],
            ['id' => 23, 'name' => 'SKI'],
            ['id' => 24, 'name' => 'Sosiologi'],
            ['id' => 25, 'name' => 'Tafsir'],
            ['id' => 26, 'name' => 'Ushul Fiqih'],
        ];
        foreach ($mapelData as $data) {
            MataPelajaran::create([
                'id' => $data['id'],
                'name' => $data['name'],
            ]);
        }
        // MataPelajaran::create([
        //     'id' => 1,
        //     'name' => 'Matematika',
        // ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        StatusIzinSiswa::create([
            'id' => 1,
            'name' => 'Menunggu Persetujuan Wali Kelas',
        ]);
        StatusIzinSiswa::create([
            'id' => 2,
            'name' => 'Menunggu Persetujuan Admin Piket',
        ]);
        StatusIzinSiswa::create([
            'id' => 3,
            'name' => 'Pengajuan Disetujui',
        ]);
        StatusIzinSiswa::create([
            'id' => 4,
            'name' => 'Pengajuan Ditolak',
        ]);
        StatusIzinGuru::create([
            'id' => 1,
            'name' => 'Menunggu Persetujuan Admin Piket',
        ]);
        StatusIzinGuru::create([
            'id' => 2,
            'name' => 'Pengajuan Disetujui',
        ]);
        StatusIzinGuru::create([
            'id' => 3,
            'name' => 'Pengajuan Ditolak',
        ]);
        User::factory()->create([
            'id' => 1,
            'name' => 'Super Admin 1',
            'email' => 'superadmin1@gmail.com',
            'password' => bcrypt('123123123'),
            'role_id' => 1,
        ]);
        User::factory()->create([
            'id' => 2,
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('123123123'),
            'isAdminPiket' => 1,
            'isWaliKelas' => 1,
            'role_id' => 2,
        ]);
        // User::factory()->create([
        //     'id' => 3,
        //     'name' => 'Isma Latifah, S.Pd.',
        //     'email' => 'ismalatifah@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'isAdminPiket' => 1,
        //     'isWaliKelas' => 1,
        //     'role_id' => 2,
        // ]);
        User::factory()->create([
            'id' => 4,
            'name' => 'Guru 1',
            'email' => 'guru1@gmail.com',
            'password' => bcrypt('123123123'),
            'isAdminPiket' => 1,
            'role_id' => 2,
        ]);
        User::factory()->create([
            'id' => 5,
            'name' => 'Guru 2',
            'email' => 'guru2@gmail.com',
            'password' => bcrypt('123123123'),
            'isWaliKelas' => 1,
            'role_id' => 2,
        ]);
        // User::factory()->create([
        //     'name' => 'Siswa 1',
        //     'email' => 'siswa1@gmail.com',
        //     'password' => bcrypt('123123123'),
        //     'role_id' => 3,
        //     'kelas_id' => 99,
        // ]);

    }
}
