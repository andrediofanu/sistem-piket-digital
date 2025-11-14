<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $siswaData = [
            ['nis/nip' => '131135730001240020', 'name' => 'AFRIZA NURUL MILLAH', 'email' => 'afrizanurulmillah@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240033', 'name' => 'AHSAN RYUKEN', 'email' => 'ahsanryuken@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240039', 'name' => 'AIRLANGGA BIMASAKTI', 'email' => 'airlanggabimasakti@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240046', 'name' => "AKMAL 'ABDURRAHMAN QUSHOYYI", 'email' => 'akmalabdurrahmanqushoyyi@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240062', 'name' => 'ALYA RASHANTI MARDIANI', 'email' => 'alyarashantimardiani@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240119', 'name' => 'BILQIS ANNAFISA', 'email' => 'bilqisannafisa@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240124', 'name' => 'CALLISTA RAYNA ALLAILI', 'email' => 'callistaraynaallaili@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240144', 'name' => 'DELVINNO ASKHA YUMNA', 'email' => 'delvinnoaskhayumna@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240154', 'name' => 'DWY TRIYA ANGGRAINI', 'email' => 'dwytriyaanggraini@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240155', 'name' => 'DYNA ELVA RETTA', 'email' => 'dynaelvaretta@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240158', 'name' => 'ELMIRA FAYZA AQILLA', 'email' => 'elmirafayzaaqilla@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240170', 'name' => 'FACHRONI BAGUS ADIRANGGA', 'email' => 'fachronibagusadirangga@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240206', 'name' => 'HAIKAL FALIHAN ALKHALIFI RAHADIAN', 'email' => 'haikalflihanalkhalifirahadian@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240228', 'name' => 'KAIRAH SANIYANNINGRUM ISWAHYONO', 'email' => 'kairahsaniyanningrumiswahyono@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240258', 'name' => 'LANGIT BIRU', 'email' => 'langitbiru@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240268', 'name' => 'MALAKA RIZQ SETYAWAN', 'email' => 'malakarizqsetyawan@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240277', 'name' => 'MOCHAMMAD NADZIR ARRASYID', 'email' => 'mohammadnadzirarrasyid@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240280', 'name' => 'MOH. RAFI AL FARIDZI', 'email' => 'moh.rafialfaridzi@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240281', 'name' => 'MOHAMMAD DAFFA DHIYAUR RAHMAN', 'email' => 'mohammaddaffadhiyaurrahman@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240289', 'name' => 'MUHAMMAD AFIQ', 'email' => 'muhammadafiq@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240301', 'name' => 'MUHAMMAD CALVIN ALFARO', 'email' => 'muhammadcalvinalfaro@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240306', 'name' => 'MUHAMMAD FAHRI KAMIL', 'email' => 'muhammadfahrikamil@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240307', 'name' => 'MUHAMMAD FAIRUZ IZZUDDIN', 'email' => 'muhammadfairuzizzuddin@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240309', 'name' => 'MUHAMMAD FAKHRI IBADURRAHMAN', 'email' => 'muhammadfakhriibadurrahman@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240310', 'name' => 'MUHAMMAD FAKHRI NAWWAF FAUZAN', 'email' => 'muhammadfakhrinawwaffauzan@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240334', 'name' => 'MUHAMMAD WILDAN FIRDAUS', 'email' => 'muhammadwildanfirdaus@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240368', 'name' => 'NAURA DWI KHOSA PUTRI', 'email' => 'nauradwikhosaputri@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240423', 'name' => 'SALFAN GALIH PRATAMA', 'email' => 'salfangalihpratama@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240448', 'name' => 'SYAHIDA AZMI ROYYANURIZMA', 'email' => 'syahidaazmiroyyanurizma@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240450', 'name' => 'SYAKIRA YUSRIN AINI', 'email' => 'syakirayusrinaini@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240452', 'name' => 'SYARIFAH NUR SUWAIDAH. AS', 'email' => 'syarifahnursuwaidahas@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240472', 'name' => 'YUSRIYYAH NISFU NADAA', 'email' => 'yusriyyahnisfunadaa@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
        ];


        foreach ($siswaData as $data) {
            User::factory()->create([
                'nis/nip' => $data['nis/nip'],
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt('123123123'),
                'role_id' => 3,
                'kelas_id' => $data['kelas_id'],
                'gender' => $data['gender'],
            ]);
        }

    }
}
