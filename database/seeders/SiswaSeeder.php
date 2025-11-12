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
            ['nis/nip' => '131135730001240015', 'name' => 'Afaf Kemala Nararrya', 'email' => 'afafkemalanararrya@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240028', 'name' => 'Ahmad Naufal Shofiyullah', 'email' => 'ahmadnaufalshofiyullah@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240032', 'name' => 'Ahnaf Fayyadh Ataya Firdaus', 'email' => 'ahnaffayyadhatayafirdaus@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240037', 'name' => 'Ainindi Rahmaniah', 'email' => 'ainindirahmaniah@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240040', 'name' => 'Aisya Khatami Sahira', 'email' => 'aisyakhatamisahira@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240041', 'name' => 'Aisya Rahma Tsania', 'email' => 'aisyarahmatsania@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240049', 'name' => 'Al Mirah Sakhi Fajrina', 'email' => 'almirahsakhifajrina@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240050', 'name' => 'Aleyna Nirwasita', 'email' => 'aleynanairwasita@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240069', 'name' => 'Andari Aulia Firda', 'email' => 'andariauliafirda@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240095', 'name' => 'Aufa Nabila Aisy', 'email' => 'aufanabilaaisy@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240103', 'name' => 'Avrillya Rana Zahabiyya', 'email' => 'avrillyaranazahabiyya@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240108', 'name' => 'Azka Nafeesa Ayu', 'email' => 'azkanafeesaayu@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240115', 'name' => 'Berlianadia Syafa Kamila', 'email' => 'berlianadiasyafakamila@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240128', 'name' => 'Carissa Syahsiah Hadi', 'email' => 'carissasyahsiahhadi@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240134', 'name' => 'Chindo Nahdah Nabilah', 'email' => 'chindonahdahnabilah@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240139', 'name' => 'Dasha Calista Ramadhani', 'email' => 'dashacalistaramadhani@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240153', 'name' => 'Dwianti Amalia Ilmi', 'email' => 'dwiantiamaliailmi@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240160', 'name' => 'Elvira Cahya Mardlatillah', 'email' => 'elviracahyamardlatillah@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240162', 'name' => 'Erlinda Faustina', 'email' => 'erlindafaustina@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240164', 'name' => 'Evandy Naufallingga Abyansyah', 'email' => 'evandynaufallinggaabyansyah@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240260', 'name' => 'Lizza Aniqoh', 'email' => 'lizzaaniqoh@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240267', 'name' => 'Mahyana Diza Hayu Suprianto', 'email' => 'mahyanadizahayusuprianto@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240270', 'name' => 'Malika Yovina Marsya', 'email' => 'malikayovinamarsya@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240273', 'name' => 'Maulani Syarifatul Ghifa', 'email' => 'maulanisyarifatulghifa@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240292', 'name' => 'Muhammad Akmal Faiz', 'email' => 'muhammadakmalfaiz@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240302', 'name' => 'Muhammad Dafa Rifqi Alfano', 'email' => 'muhammaddafarifqialfano@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240332', 'name' => 'Muhammad Taqiyyudin Yusuf', 'email' => 'muhammadtaqiyyudinyusuf@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240340', 'name' => 'Nabila Fahrianisa Putri', 'email' => 'nabilafahrianisaputri@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240356', 'name' => 'Najah Paramitha Wiyasa', 'email' => 'najahparamithawiyasa@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240362', 'name' => 'Namira Talita Hasna', 'email' => 'namiratalitahasna@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240394', 'name' => 'Qureita Permata Indri', 'email' => 'qureitapermataindri@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240430', 'name' => 'Saskia Prisilia Nanda Huda', 'email' => 'saskiaprisilianandahuda@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240432', 'name' => 'Scientia Samara Ulya Tsabita', 'email' => 'scientiasamaraulyatsabita@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240455', 'name' => "Syifa'una Qolbina Putri Zalia", 'email' => 'syifaunaqolbinaputrizalia@gmail.com', 'kelas_id' => 21, 'gender' => 'P'],
            ['nis/nip' => '131135730001240457', 'name' => 'Tabriz Vanza Putra Ahmad', 'email' => 'tabrizvanzaputraahmad@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
            ['nis/nip' => '131135730001240458', 'name' => 'Tegar Aldiaksya Catur Agung', 'email' => 'tegaraldiaksyacaturagung@gmail.com', 'kelas_id' => 21, 'gender' => 'L'],
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
