<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(7)->sequence(
            ['name' => 'Super Admin', 'username' => 'superadmin', 'email' => 'superadmin@gmail.com', 'password' => bcrypt('123')],
            ['name' => 'Owner', 'username' => 'owner', 'email' => 'owner@gmail.com', 'password' => bcrypt('123')],
            ['name' => 'Admin', 'username' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('123')],
            ['name' => 'Valet', 'username' => 'valet', 'email' => 'valet@gmail.com', 'password' => bcrypt('123')],
            ['name' => 'Ikhsan Valet', 'username' => 'ikhsanvalet2', 'email' => 'ikhsanheriyawan00100@gmail.com', 'password' => bcrypt('123')],
            ['name' => 'Pegawai', 'username' => 'pegawai', 'email' => 'pegawai@gmail.com', 'password' => bcrypt('123')],
            ['name' => 'Hotel Indah', 'username' => 'hotelindah', 'email' => 'hotelindah@gmail.com', 'password' => bcrypt('123')],
        )->create();
        User::factory()->count(10)->create();
    }
}
