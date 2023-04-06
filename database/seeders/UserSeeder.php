<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
        ])->assignRole('superadmin');

        $user->user_detail()->create([
            'address' => 'Jl. Raya Cibaduyut',
            'phone_number' => '08123456789',
        ]);

        $user = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
        ])->assignRole('admin');

        $user->user_detail()->create([
            'address' => 'Jl. Raya Cibaduyut',
            'phone_number' => '08123456789',
        ]);

        $user = User::create([
            'name' => 'Valet',
            'username' => 'valet',
            'email' => 'valet@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
        ])->assignRole('valet');

        $user->user_detail()->create([
            'address' => 'Jl. Raya Cibaduyut',
            'phone_number' => '08123456789',
        ]);

        $user = User::create([
            'name' => 'Hotel Indah',
            'username' => 'hotelindah',
            'email' => 'hotel@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
        ])->assignRole('hotel');

        $user->user_detail()->create([
            'address' => 'Jl. Raya Cibaduyut',
            'phone_number' => '08123456789',
        ]);

        $user = User::create([
            'name' => 'Pegawai',
            'username' => 'pegawai',
            'email' => 'pegawai@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
        ])->assignRole('pegawai');

        $user->user_detail()->create([
            'address' => 'Jl. Raya Cibaduyut',
            'phone_number' => '08123456789',
        ]);

    }
}
