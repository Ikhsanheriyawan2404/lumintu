<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'valet']);
        Role::create(['name' => 'owner']);
        Role::create(['name' => 'hotel']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'pegawai']);
        Role::create(['name' => 'superadmin']);
    }
}
