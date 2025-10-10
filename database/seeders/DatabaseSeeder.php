<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        User::factory()->create([
            'name' => 'Super Admin 1',
            'email' => 'superadmin1@gmail.com',
            'password' => bcrypt('123123123'),
            'role_id' => 1,
        ]);
        User::factory()->create([
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('123123123'),
            'role_id' => 2,
        ]);
        User::factory()->create([
            'name' => 'Guru 1',
            'email' => 'guru1@gmail.com',
            'password' => bcrypt('123123123'),
            'role_id' => 3,
        ]);
       
    }
}
