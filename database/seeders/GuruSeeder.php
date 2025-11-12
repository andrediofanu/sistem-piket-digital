<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $guruData = [
            ['id' => 21, 'name' => 'Dr. H. Sutirjo, S.Pd, M.Pd', 'email' => 'sutirjo@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 22, 'name' => 'Drs. Nur Hidayatullah', 'email' => 'nurhidayatullah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 23, 'name' => 'Dra. Hj. Rida Ruhamawati', 'email' => 'ridaruhamawati@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 24, 'name' => 'Hj. Chusnul Chotimah, S.Pd, M.', 'email' => 'chusnuchotimah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 25, 'name' => 'Dra. Yayuk Khisbiyah W, M.Pd', 'email' => 'yayukkhisbiyahw@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 26, 'name' => 'Hj. Emi Rohanum, M.Pd', 'email' => 'emirohanum@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 27, 'name' => 'Dra. Hj. Ninik Rukayati, M.A', 'email' => 'ninikrukayati@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 28, 'name' => 'Dra. Dyah Istami Suharti, M.KPd', 'email' => 'dyahistamisuharti@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 29, 'name' => 'Drs. Imam Istamar', 'email' => 'imamistamar@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 30, 'name' => 'Hj. Nur Handayani, S.P, M.Pd', 'email' => 'nurhandayani@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 31, 'name' => 'Dra. Luluk Machsufah', 'email' => 'lulukmachsufah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 32, 'name' => 'R. Heru Lesmana, S.Pt', 'email' => 'herulesmana@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 33, 'name' => 'Robil Alamin, S.Pd', 'email' => 'robilalamin@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 34, 'name' => 'Rahmah Farida, S.Pd.I', 'email' => 'rahmahfarida@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 35, 'name' => 'Drs. Sabilal Rosyad', 'email' => 'sabilalrosyad@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 36, 'name' => 'Yasin, S.Pd', 'email' => 'yasin@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 37, 'name' => 'Endro Subagyo, M.Pd', 'email' => 'endrosubagyo@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 38, 'name' => 'Nurul Fitriah, S.Si, M.Si', 'email' => 'nurulfitriah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 39, 'name' => 'Hanik Ulfa, S.Ag. M.A', 'email' => 'hanikulfa@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 40, 'name' => 'Joko Sugiarto, S.Pd.', 'email' => 'jokosugiarto@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 41, 'name' => 'Dewi Nurjannah, S.Pd', 'email' => 'dewinurjannah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 42, 'name' => 'Chusnul Maulu’ah, S.Psi.', 'email' => 'chusnulmauluah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 43, 'name' => 'Hj. Farah Fuadati, S.Pd.', 'email' => 'farahfuadati@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 44, 'name' => 'Erlangga, S.Pd', 'email' => 'erlangga@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 45, 'name' => 'Siti Dwi Yuliastuti, S.Pd', 'email' => 'sitidwiyuliastuti@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 46, 'name' => 'Abdurrohim, S.Ag, M.A', 'email' => 'abdurrohim@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 47, 'name' => 'Reny Suswiyanti, S.Psi', 'email' => 'renysuswiyanti@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 48, 'name' => 'Aulia Rahmayanti, S.S', 'email' => 'auliarahmayanti@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 49, 'name' => 'Ririn Eva Hidayati, S.Pd, M.Si', 'email' => 'ririnevahidayati@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 50, 'name' => "Nurul Badi'ah, S.Psi", 'email' => 'nurulbadiah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 51, 'name' => 'Nanik Soedarsih, S.Pd', 'email' => 'naniksoedarsih@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 52, 'name' => 'Iwan Setiawan, S.Pd', 'email' => 'iwansetiawan@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 53, 'name' => "Hani'atul Khusniyah, S.Ag", 'email' => 'haniatulkhusniyah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 54, 'name' => 'Nisfuana, S.Pd, M.Pd', 'email' => 'nisfuana@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 55, 'name' => 'Endah Yulianti, M.Pd', 'email' => 'endahyulianti@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 56, 'name' => 'Reni Kartikasari, S.Pd', 'email' => 'renikartikasari@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 57, 'name' => 'Aris Yulianto, S.Pd', 'email' => 'arisyulianto@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 58, 'name' => 'Alwiyah, S.Ag, S.Pd, M.PdI', 'email' => 'alwiyah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 59, 'name' => 'Firdaus Muttaqi, S.Pd', 'email' => 'firdausmuttaqi@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 60, 'name' => 'Eka Wijayanti, S.S', 'email' => 'ekawijayanti@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 61, 'name' => 'Isma Latifah, S.S', 'email' => 'ismalatifah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 1, 'isWaliKelas' => 1, 'role_id' => 2],
            ['id' => 62, 'name' => 'Mariana Yogawati, S.Ag', 'email' => 'marianayogawati@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 63, 'name' => 'Andre Diofanu, S.Pd', 'email' => 'andrediofanu@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 64, 'name' => 'Balawara Andika, S.Pd', 'email' => 'balawaraandika@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 65, 'name' => 'Ayu Mahmudatul A, S.Pd', 'email' => 'ayumahmudatula@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 66, 'name' => 'Zakiah Alif Syakura, S.Pd', 'email' => 'zakiahalifsyakura@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 67, 'name' => 'Thoriq Muhammad, S.Pd', 'email' => 'thoriqmuhammad@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 68, 'name' => 'Ismiarni, S.Pd', 'email' => 'ismiarni@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 69, 'name' => 'Septian Adi Kurniawan, S.Pd', 'email' => 'septianadikurniawan@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 70, 'name' => 'Ahmad Faiq, S.Pd', 'email' => 'ahmadfaiq@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 71, 'name' => 'Lastri Winarsih, S.Pd', 'email' => 'lastriwinarsih@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 72, 'name' => 'Khumaidah Eka Lestari, S.Pd', 'email' => 'khumaidahekalestari@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 73, 'name' => 'Adi Wibowo, S.PdI', 'email' => 'adiwibowo@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 74, 'name' => 'Siti Aisyah, S.Si, S.Pd', 'email' => 'sitiaisyah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 75, 'name' => 'Mega Leo, S.Pd', 'email' => 'megaleo@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 76, 'name' => 'Luthfi Hakim, S.S, M.PdI', 'email' => 'luthfihakim@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 77, 'name' => 'Syarifuddin, M.TSOL', 'email' => 'syarifuddin@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 78, 'name' => 'Siti Nurul Syarifah, S.Pd', 'email' => 'sitinurulsyarifah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 79, 'name' => 'Ahmad Amin, S.PdI', 'email' => 'ahmadamin@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 80, 'name' => 'Elsa Putri Anggraeni, S.Pd', 'email' => 'elsaputrianggraeni@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 81, 'name' => 'Muhammad Fadhil, M.Pd', 'email' => 'muhammadfadhil@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 82, 'name' => 'Ahmad Zaqi Lutfi Mauliddin Safi\'', 'email' => 'ahmadzaqilutfimauliddinsafi@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 83, 'name' => 'Fitria Hanim, S.Pd', 'email' => 'fitriahanim@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 84, 'name' => 'Nurul Qibtiyah, S.S', 'email' => 'nurulqibtiyah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 85, 'name' => 'Bayu Eka Dermawan, S.Psi', 'email' => 'bayuekadermawan@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 86, 'name' => 'Kiki Purnomo, S.SI', 'email' => 'kikipurnomo@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 87, 'name' => 'Giemza Bagus Muji Utomo, S.SI', 'email' => 'giemzabagusmujiutomo@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 88, 'name' => 'Rahmat Anang, S.Pd', 'email' => 'rahmatanang@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 89, 'name' => 'Ahmad Farhan, S.Pd', 'email' => 'ahmadfarhan@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 90, 'name' => 'Fahrish Minna Al Hikam, S.Ag', 'email' => 'fahrishminnaalhikam@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 91, 'name' => 'Ida Maulana, S.Pd', 'email' => 'idamaulana@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 92, 'name' => 'M. Arif Zulkarnain, S.Pd', 'email' => 'marifzulkarnain@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 93, 'name' => 'Nur Hamidah, S.Pd', 'email' => 'nurhamidah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 94, 'name' => 'Ella Jayahuda P, S.Pd', 'email' => 'ellajayahuda@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 95, 'name' => 'Dina Nur Kamila, S.Pd', 'email' => 'dinanurkamila@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 96, 'name' => 'Imah Normasfila, M.Pd', 'email' => 'imahnormasfila@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 97, 'name' => 'Prima Cahyo Nugroho, S.E', 'email' => 'primacahyonugroho@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 98, 'name' => 'Mohamad Asny Birru Zawali, S.P', 'email' => 'mohamadasnybirruzawali@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 99, 'name' => 'Moch. Raharjo Wicaksono, S.', 'email' => 'mochraharjowicaksono@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
            ['id' => 100, 'name' => 'Khasanatul Barikah, S.Pd', 'email' => 'khasanatulbarikah@gmail.com', 'password' => bcrypt('12345678'), 'isAdminPiket' => 0, 'isWaliKelas' => 0, 'role_id' => 2],
        ];
        foreach ($guruData as $data) {
            User::factory()->create([
                'id' => $data['id'],
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'isAdminPiket' => $data['isAdminPiket'],
                'isWaliKelas' => $data['isWaliKelas'],
                'role_id' => $data['role_id'],
            ]);
        }

    }
}
