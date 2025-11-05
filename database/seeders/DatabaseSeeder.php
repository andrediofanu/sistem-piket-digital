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
        Kelas::create([
            'id' => 99,
            'name' => 'X-A',
            'wali_kelas_id' => 4
        ]);
        Kelas::create([
            'id' => 1,
            'name' => 'XI-J',
            'wali_kelas_id' => 3
        ]);
        MataPelajaran::create([
            'id' => 1,
            'name' => 'Matematika',
        ]);
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
        User::factory()->create([
            'id' => 3,
            'name' => 'Isma Latifah, S.Pd.',
            'email' => 'ismalatifah@gmail.com',
            'password' => bcrypt('123123123'),
            'isAdminPiket' => 1,
            'isWaliKelas' => 1,
            'role_id' => 2,
        ]);
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
        User::factory()->create([
            'name' => 'Siswa 1',
            'email' => 'siswa1@gmail.com',
            'password' => bcrypt('123123123'),
            'role_id' => 3,
            'kelas_id' => 99,
        ]);
        
    }
}
